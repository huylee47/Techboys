<?php 
namespace App\Service;

use Illuminate\Support\Facades\Http;
use App\Models\Product;
class GeminiService
{
    protected $apiKey;
    protected $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent';

    public function __construct()
    {
        $this->apiKey = config('services.gemini.api_key');
    }

    public function chat(string $prompt)
    {
        $normalizedPrompt = strtolower($prompt);
        $keywords = explode(' ', $normalizedPrompt);
    
        $query = Product::query();
    
        foreach ($keywords as $keyword) {
            $query->orWhere('name', 'like', '%' . $keyword . '%');
        }
    
        $matchingProducts = $query->get();
    
        if ($matchingProducts->isNotEmpty()) {
            $productLines = $matchingProducts->map(function ($product) {
                return "<a href='http://127.0.0.1:8000/products/{$product->slug}'>{$product->name}</a>";
            })->implode(', ');
    
            $contextPrompt = "Cửa hàng Techboys hiện đang bán các sản phẩm liên quan như: {$productLines}. Bạn hãy viết một câu trả lời xác nhận cửa hàng có bán, gợi ý sản phẩm phù hợp nhất với prompt sau: '{$prompt}', và kết thúc bằng một câu hỏi mở cho khách.";
    
            $response = Http::post($this->baseUrl . '?key=' . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $contextPrompt]
                        ]
                    ]
                ]
            ]);
    
            if ($response->successful()) {
                return $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'Không có phản hồi.';
            }
        }
    
        $friendlyPrompt = "Khách hàng hỏi: '{$prompt}'. Hãy viết một câu trả lời tự nhiên, thân thiện như một Bot chat hỗ trợ chăm sóc khách hàng của cửa hàng Techboys, không cần liên hệ đến sản phẩm nếu không cần thiết.";
    
        $response = Http::post($this->baseUrl . '?key=' . $this->apiKey, [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $friendlyPrompt]
                    ]
                ]
            ]
        ]);
    
        if ($response->successful()) {
            return $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'Không có phản hồi.';
        }
    
        return 'Lỗi gọi Gemini: ' . $response->body();
    }
    
    
    
    
    
    
}
