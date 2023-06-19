<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $events = Events::orderBy('done_at', 'DESC')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.add-event');

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'done_at' => 'required',
            'place' => 'required',
            'mainImage' => 'required',
            'pTitle' => 'required',
            'pPlace' => 'required',
        ]);
        $meta =
            '{"pTitle":"' . $request->pTitle .
            '","pPlace":"' . $request->pPlace .
            '"}';
        $event = new Events();
        $event->title = $request->title;
        $event->banner = $request->mainImage;
        $event->place = $request->place;
        $event->body = $request->ckeditor;
        $event->pBody = $request->pCkeditor;
        $event->done_at = $request->done_at;
        $event->meta = $meta;
        $event->save();
        $pm = 'رویداد شما با موفقیت ذخیره شد';

        return view('admin.events.add-event', compact('pm'));
    }

    public function edit($id)
    {
        $event = Events::findOrFail($id);
        return view('admin.events.edit-event', compact('event'));

    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'done_at' => 'required',
            'place' => 'required',
            'mainImage' => 'required',
            'pTitle' => 'required',
            'pPlace' => 'required',
        ]);
        $meta =
            '{"pTitle":"' . $request->pTitle .
            '","pPlace":"' . $request->pPlace .
            '"}';
        $event = Events::findOrFail($id);
        $event->title = $request->title;
        $event->banner = $request->mainImage;
        $event->place = $request->place;
        $event->body = $request->ckeditor;
        $event->pBody = $request->pCkeditor;
        $event->done_at = $request->done_at;
        $event->meta = $meta;
        $event->save();
        $pm = 'رویداد شما با موفقیت ویرایش شد';

        return view('admin.events.edit-event', compact('pm', 'event'));

    }

    public function destroy($id)
    {
        $event = Events::findOrFail($id)->delete();
        $events = Events::orderBy('done_at', 'DESC')->get();
        return view('admin.events.index', compact('events'));


    }
}
