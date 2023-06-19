<?php

namespace App\Http\Controllers;

use App\Models\Santoor;
use App\Models\SantoorGallery;
use Illuminate\Http\Request;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Model;

class SantoorController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminIndex()
    {
        return redirect('/arts-admin/products');
    }

    public function index()
    {
        $products = Santoor::orderBy('pOrder', 'ASC')->orderBy('id', 'DESC')->get();
        return view('admin.santoor.index', compact('products'));
    }

    public function create()
    {
        return view('admin.santoor.add-product');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'pName' => 'required',
            'buildDate' => 'required',
            'pBuildDate' => 'required',
            'santoorType' => 'required',
            'pSantoorType' => 'required',
            'woodType' => 'required',
            'pWoodType' => 'required',
            'price' => 'required',
            'mainImage' => 'required',
        ]);

        $meta =
            '{"pWoodType":"' . $request->pWoodType .
            '","pName":"' . $request->pName .
            '","pBuildDate":"' . $request->pBuildDate .
            '","pInstrumentType":"' . $request->pSantoorType .
            '"}';
        $product = new Santoor();
        $product->name = $request->name;
        $product->image = $request->mainImage;
        $product->description = $request->ckeditor;
        $product->instrumentType = $request->santoorType;
        $product->WoodType = $request->woodType;
        $product->buildDate = $request->buildDate;
        $product->price = $request->price;
        $product->video = $request->video;
        $product->pOrder = $request->pOrder;
        $product->selled = $request->selled;

        // $product->pDescription = $request->pCkeditor;
        $product->meta = $meta;
        $product->save();
        for ($gallery = 1; $gallery < 10; $gallery++) {
            $galleryName = 'gallery' . $gallery;
            if ($request->$galleryName != '') {
                //check gallery name extension 
                $ext = pathinfo($request->$galleryName, PATHINFO_EXTENSION);

                $productGallery = new SantoorGallery();
                $productGallery->image = $ext!='mp4' ? $request->$galleryName : '';
                $productGallery->video = $ext=='mp4' ? $request->$galleryName : '';

                $productGallery->santoor_id = Santoor::orderBy('id', 'DESC')->first()->id;
                $productGallery->save();
            }
        }
        $pm = 'سنتور شما با موفقیت ذخیره شد';

        return view('admin.santoor.add-product', compact('pm'));
    }

    public function edit($id)
    {
        $product = Santoor::findOrFail($id);
        return view('admin.santoor.edit-product', compact('product'));

    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'pName' => 'required',
            'buildDate' => 'required',
            'pBuildDate' => 'required',
            'santoorType' => 'required',
            'pSantoorType' => 'required',
            'woodType' => 'required',
            'pWoodType' => 'required',
            'price' => 'required',
            'mainImage' => 'required',
        ]);

        $meta =
            '{"pWoodType":"' . $request->pWoodType .
            '","pName":"' . $request->pName .
            '","pBuildDate":"' . $request->pBuildDate .
            '","pInstrumentType":"' . $request->pSantoorType .
            '"}';


        $product = Santoor::findOrFail($id);


        $product->name = $request->name;
        $product->image = $request->mainImage;
        $product->description = $request->ckeditor;
        $product->instrumentType = $request->santoorType;
        $product->WoodType = $request->woodType;
        $product->buildDate = $request->buildDate;
        $product->price = $request->price;
        $product->video = $request->video;
        $product->pOrder = $request->pOrder;
        $product->selled = $request->selled;

        // $product->pDescription = $request->pCkeditor;
        $product->meta = $meta;
        $product->save();


        $galleryDel = SantoorGallery::where('santoor_id', $id)->delete();
        for ($gal = 1; $gal < 10; $gal++) {
            $galleryName = 'gallery' . $gal;
            if ($request->$galleryName != '') {
                $ext = pathinfo($request->$galleryName, PATHINFO_EXTENSION);


                $productGallery = new SantoorGallery();
                $productGallery->image = $ext!='mp4' ? $request->$galleryName : '';
                $productGallery->video = $ext=='mp4' ? $request->$galleryName : '';
                $productGallery->santoor_id = $id;
                $productGallery->save();
            }
        }
        $pm = 'سنتور شما با موفقیت به روز شد';

        return view('admin.santoor.edit-product', compact('pm', 'product'));
    }

    public function destroy($id)
    {
        $product = Santoor::findOrFail($id)->delete();
        $products = Santoor::orderBy('pOrder', 'ASC')->orderBy('id', 'DESC')->get();
        return view('admin.santoor.index', compact('products'));
    }


}