<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;



class ProductController extends Controller
{
     public function index()
     {
        $products = Product::select('id','name','price','image')->get();
        
        $products = Product::paginate(6);
        return view('index',compact('products'));
     }
    
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $products = Product::where('name', 'like', "%{$keyword}%")->get();
        } else {
            $products = Product::paginate(6);
        }
       
        return view('index',compact('products','keyword'));
    }
        public function show($productId)
{
    $product = Product::with('seasons')->findOrFail($productId); 
    $allSeasons = Season::all();
    return view('detail', compact('product','allSeasons'));
}

    public function update(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

         $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->seasons()->sync($request->input('seasons', []));

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
        
         if ($product->image) {
             $path = public_path('storage/images/' . $product->image);
            if (file_exists($path)) {
        unlink($path);
            }
        }
        
        $filename =uniqid() . '_' .  $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('images', $filename, 'public');
        $product->image = $filename; 
    }
        $product->save();

        return redirect()->route('products.show', $product->id);
    }
        public function destroy($productId) 
        {
            $product = Product::findOrFail($productId);
            $product->seasons()->detach();
            $product->delete();
            return redirect()->route('products.index');
            
        }
}