<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(){
        $products = Product::all();
        return view('products', compact('products'));
      }

      public function show($id){
        // $products = Product::all();
        // return view('products', compact('products', 'id'));
        $product = Product::find($id);
        return view('product', compact('product'));
      }

      public function adminIndex(){
        $products = Product::all();
        return view('admin.products', compact('products'));
      }

      public function adminShow($id){
        $product = Product::find($id);
        return view('admin.product', compact('product'));
      }

    public function create(){
      return view('admin.productCreate');
    }

    public function store(Request $req){
        $data = $req->validate([
            'title' => 'required|string',
            'description' => 'string|max:4096',
            'properties' => 'string|max:4096',
            'priceUSD' => 'integer',
            'discountedPriceUSD' => 'integer',
            'available' => 'integer',
        ]);
        $product = Product::create($data);
        if ($req->has('images')) {
            foreach ($req->file('images') as $key=>$image){
                $imageName = $data['title'].'-image'.time().$key.'.'.$image->extension();
                //$imageName = preg_replace('/[^A-Za-z0-9\-]/', '_', $imageName);
                $imageName = preg_replace('/[^A-Za-z0-9\-](?=\.[^.]+$)/', '_', $imageName);
                $image->move(public_path('product_images'), $imageName);
                Image::create([
                    'product_id'=>$product->id,
                    'image'=>$imageName,
                ]);
            }
        }
    return back()->with('success','Added');
    }

    public function upload(Request $request)
    {
        request()->validate([
            'users' => 'required|mimes:xlx,xls|max:2048'
        ]);
        Excel::import(new ProductsImport, $request->file('products'));
        return back()->with('massage', 'User Imported Successfully');
    }

    public function destroy($id)
{
    $product = Product::find($id);

    if (!$product) {
        return back()->with('error', 'Product not found');
    }

    foreach ($product->images as $image) {
        if (Storage::disk('public')->exists('product_images/' . $image->image)) {
            Storage::disk('public')->delete('product_images/' . $image->image);
        }
        $image->delete();
    }
    $product->delete();

    return back()->with('success', 'Product deleted successfully');
}
}
