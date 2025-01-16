<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('blog', function () {
    return view('admin.tag.edit');
}); 

