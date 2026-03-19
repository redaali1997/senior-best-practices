<?php

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Cache::remember('home_products', 60 * 60, fn () => Product::latest()->limit(10)->get());

    return view('welcome', compact('products'));
});
