<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
        $products = Product::orderBy('pOrder', 'ASC')->orderBy('id', 'DESC')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.add-product');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'performDate' => 'required',
            'technique' => 'required',
            'size' => 'required',
            'price' => 'required',
            'mainImage' => 'required',
            'pName' => 'required',
            'pPerformDate' => 'required',
            'pTechnique' => 'required',
        ]);

        $meta =
            '{"size":"' . $request->size .
            '","performDate":"' . $request->performDate .
            '","technique":"' . $request->technique .
            '","pName":"' . $request->pName .
            '","pPerformDate":"' . $request->pPerformDate .
            '","pTechnique":"' . $request->pTechnique .
            '"}';
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $request->mainImage;
        $product->description = $request->ckeditor;
        $product->pDescription = $request->pCkeditor;
        $product->pOrder = $request->order;
        $product->meta = $meta;
        $product->save();
        for ($gallery = 1; $gallery < 10; $gallery++) {
            $galleryName = 'gallery' . $gallery;
            if ($request->$galleryName != '') {
                $productGallery = new Gallery();
                $productGallery->address = $request->$galleryName;
                $productGallery->product_id = Product::orderBy('id', 'DESC')->first()->id;
                $productGallery->save();
            }
        }
        $pm = 'اثر شما با موفقیت ذخیره شد';

        return view('admin.products.add-product', compact('pm'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit-product', compact('product'));

    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'performDate' => 'required',
            'technique' => 'required',
            'size' => 'required',
            'price' => 'required',
            'mainImage' => 'required',
            'pName' => 'required',
            'pPerformDate' => 'required',
            'pTechnique' => 'required',
        ]);

        $meta =
            '{"size":"' . $request->size .
            '","performDate":"' . $request->performDate .
            '","technique":"' . $request->technique .
            '","pName":"' . $request->pName .
            '","pPerformDate":"' . $request->pPerformDate .
            '","pTechnique":"' . $request->pTechnique .
            '"}';
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $request->mainImage;
        $product->description = $request->ckeditor;
        $product->pDescription = $request->pCkeditor;
        $product->pOrder = $request->order;
        $product->meta = $meta;
        $product->save();
        $galleryDel = Gallery::where('product_id', $id)->delete();
        for ($gal = 1; $gal < 10; $gal++) {
            $galleryName = 'gallery' . $gal;
            if ($request->$galleryName != '') {
                $productGallery = new Gallery();
                $productGallery->address = $request->$galleryName;
                $productGallery->product_id = $id;
                $productGallery->save();
            }
        }
        $pm = 'اثر شما با موفقیت به روز شد';

        return view('admin.products.edit-product', compact('pm' , 'product'));
    }

    public function destroy($id)
    {
        $product=Product::findOrFail($id)->delete();
        $products = Product::orderBy('pOrder', 'ASC')->orderBy('id', 'DESC')->get();
        return view('admin.products.index',compact('products'));
    }

}
