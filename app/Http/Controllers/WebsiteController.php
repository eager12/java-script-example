<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Product;
use App\Models\Santoor;
use App\Models\TemplateSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Mail;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\SitemapGenerator;

class WebsiteController extends Controller
{
    public function index()
    {
        $events = Events::orderBy('done_at', 'DESC')->limit(3)->get();
        $template = TemplateSetting::all();

        return view('index', compact('events', 'template'));
    }

    public function biography()
    {
        $template = TemplateSetting::all();

        return view('biography', compact('template'));
    }

    public function contact(Request $request)
    {
        $template = TemplateSetting::all();

        return view('contact', compact('template'));

    }
    public function contactSend(Request $request)
    {

        if ($request->name && $request->email && $request->message) {
            if ($request->name != '' && $request->email != '' && $request->message != '') {

                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'mess' => $request->message
                ];

                Mail::send('mail', $data, function ($message) {
                    $message->to('ha.nasirzadeh@gmail.com', 'message from arts')->subject
                    ('message from arts');
                    $message->from('arts@nasirzadeh.com', 'arts nasirzadeh');
                });
            }
        }
        return redirect('/contact');
    }

    public function products()
    {
        $template = TemplateSetting::all();

        $products = Product::orderBy('pOrder', 'ASC')->orderBy('id', 'DESC')->get();
        return view('products', compact('products', 'template'));
    }

    public function events()
    {
        $template = TemplateSetting::all();

        $events = Events::orderBy('done_at', 'DESC')->get();
        return view('/events', compact('events', 'template'));

    }

    public function singleEvent($id, $slug)
    {
        $event = Events::findOrFail($id);
        return view('singleEvent', compact('event'));


    }

    public function singleProduct($id, $slug)
    {
        $product = Product::findOrFail($id);
        $gal = $product->galleries;
        return view('singleProduct', compact('product'));
    }

    public function sendReq($id, $slug, Request $request)
    {

        if ($request->name && $request->mobile) {
            if ($request->name != '' && $request->mobile != '') {
                $prod = Product::findOrFail($id);
                $data = [
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'productImg' => $prod->image
                ];
                Mail::send('Reqmail', $data, function ($message) {
                    $message->to('ha.nasirzadeh@gmail.com', 'message from arts')->subject
                    ('message from arts');
                    $message->from('arts@nasirzadeh.com', 'arts nasirzadeh');
                });
            }
        }
    }

    public function sitemap()
    {
        SitemapGenerator::create('https://arts.nasirzadeh.com')
            ->configureCrawler(function (Crawler $crawler) {
                $crawler->setMaximumDepth(300);
            })
            ->writeToFile('../public/sitemap2.xml');
    }

    public function santoor()
    {
        $template = TemplateSetting::all();

        $products = Santoor::orderBy('pOrder', 'ASC')->get();
        return view('santoor', compact('products', 'template'));
    }
    public function singleSantoor($id, $slug)
    {
        $product = Santoor::findOrFail($id);
        $gal = $product->galleries;
        return view('singleSantoor', compact('product'));
    }

}