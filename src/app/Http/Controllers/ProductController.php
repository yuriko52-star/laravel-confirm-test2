<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

}