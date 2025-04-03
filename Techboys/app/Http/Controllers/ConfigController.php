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
            'title' => 'required|string|max:100',
            'address' => 'required|string|max:500',
            'hotline' => 'required|string|max:10',
            'facebook' => 'required|url',
        ]);

        $config = Config::first();
        $config->update($request->all());

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
