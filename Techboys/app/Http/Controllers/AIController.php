<?php

namespace App\Http\Controllers;
use App\Service\GeminiService;
use Illuminate\Http\Request;

class AIController extends Controller
{
    public function askChatbot(){
        return view('client.gemini.chatbot');
    }
    public function askGemini(Request $request, GeminiService $gemini)
{
    $prompt = $request->input('prompt');
    $response = $gemini->chat($prompt);
    return response()->json(['response' => $response]);
}
}
