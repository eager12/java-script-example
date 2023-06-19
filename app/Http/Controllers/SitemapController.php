<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->first();
        $events = Events::orderBy('id', 'desc')->first();

        return response()->view('sitemap.index', [
            'products' => $products,
            'events' => $events,

        ])->header('Content-Type', 'text/xml');
    }

    public function products()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return response()->view('sitemap.products', [
            'products' => $products,
        ])->header('Content-Type', 'text/xml');
    }
    public function events()
    {
        $events = Events::orderBy('id', 'desc')->get();

        return response()->view('sitemap.events', [
            'events' => $events,
        ])->header('Content-Type', 'text/xml');
    }


}
