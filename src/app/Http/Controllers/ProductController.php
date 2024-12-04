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
}
