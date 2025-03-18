<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $loadAll = ProductCategory::all();
        return view('client.home.home', compact('loadAll'));
    }
}
