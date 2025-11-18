<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Product;   

class LandingController extends Controller
{
    public function indexLanding()
    {
        $products = Product::take(3)->get();
        $news = News::orderBy('date', 'DESC')->take(3)->get();
        $reviews = \App\Models\Review::all();

        // Fix: 'product' is now 'products'
        return view('landing', compact('products','news', 'reviews')); 
    }
}