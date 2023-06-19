<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function sitemap()
    {
        $events = Events::all();
        $galleries = Product::all();
        return response()
            ->view('sitemap',compact('events' , 'galleries'), 200)
            ->header('Content-Type', 'application/xml');

    }
}
