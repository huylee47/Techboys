<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $config = Config::first();
        return view('admin.config.index', compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Config $config)
    {
        $config = Config::first();
        return view('admin.config.edit', compact('config'));
    }

    public function update(Request $request, Config $config)
    {
        $request->validate([
            'title' => 'required|string|max:70',
            'address' => 'required|string|max:150',
            'map' => 'required|string|max:500',
            'hotline' => 'required|numeric|digits_between:8,10',
            'facebook' => 'required|url',
            'favicon' => 'nullable|image|mimes:ico,png|max:1024', 
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề website.',
            'title.max' => 'Tiêu đề không được dài quá 70 ký tự.',
    
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.max' => 'Địa chỉ không được dài quá 150 ký tự.',
    
            'map.required' => 'Vui lòng nhập mã nhúng Google Maps.',
            'map.max' => 'Mã nhúng Google Maps không quá 500 ký tự.',
    
            'hotline.required' => 'Vui lòng nhập số hotline.',
            'hotline.numeric' => 'Hotline chỉ được chứa số.',
            'hotline.digits_between' => 'Hotline phải có từ 8 đến 10 chữ số.',
    
            'facebook.required' => 'Vui lòng nhập link Facebook.',
            'facebook.url' => 'Link Facebook không hợp lệ.',
    
            'favicon.image' => 'Favicon phải là ảnh.',
            'favicon.mimes' => 'Favicon chỉ chấp nhận .ico hoặc .png.',
            'favicon.max' => 'Favicon tối đa 1MB.',
    
            'logo.image' => 'Logo phải là ảnh.',
            'logo.mimes' => 'Logo chỉ chấp nhận các định dạng: jpeg, png, jpg, gif.',
            'logo.max' => 'Logo tối đa 2MB.',
        ]);
    
        $config = Config::first();
    
        if ($request->hasFile('favicon')) {
            $faviconName = time() . '_favicon.' . $request->file('favicon')->getClientOriginalExtension();
            $request->file('favicon')->move(public_path('admin/assets/images/config'), $faviconName);
            $config->favicon = $faviconName; 
        }
        
        if ($request->hasFile('logo')) {
            $logoName = time() . '_logo.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('admin/assets/images/config'), $logoName);
            $config->logo = $logoName; 
        }
        
    
        $config->update([
            'title' => $request->title,
            'address' => $request->address,
            'map' => $request->map,
            'hotline' => $request->hotline,
            'facebook' => $request->facebook,
        ]);
    
        return redirect()->route('admin.config.index')->with('success', 'Cấu hình đã được cập nhật!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Config $config)
    {
        //
    }
}
