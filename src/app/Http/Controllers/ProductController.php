<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductRequest;



class ProductController extends Controller
 {

    
    
      public function index()
     {
        $products = Product::select('id','name','price','image')->get();
        
        $products = Product::paginate(6);
        return view('index',compact('products'));
     }
    





     public function create()
     {
        $allSeasons = Season::all(); // 季節データを取得
        $product = new Product();
        return view('register', compact('product','allSeasons')); // Bladeにデータを渡す
    }
        
    /* public function store(Request $request)
     {
        \Log::info('Request data:', $request->all());
    return response()->json(['message' => 'Data logged'], 200);
     }
*/

      public function store(ProductRequest $request)
    {
        // $validated = $request->validated();

        // \Log::info('Validated Request Data:', $validated);

    $product = new Product();

    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $filename = uniqid() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('images', $filename, 'public');
        $product->image = $filename;
    } 
    // else {
        // アップロードされない場合は既存の画像をそのまま使う
        // $product->image = $request->input('current_image'); // hiddenフィールドから既存画像を取得
    

    $product->save();

    // 中間テーブル（seasons）の更新
     
    if ($request->has('season_id')) {
        $product->seasons()->sync($request->input('season_id', []));
    }

    return redirect()->route('products.index'); // 一覧画面にリダイレクト
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

    public function update(ProductRequest $request, $productId)
    {
        
        $product = Product::findOrFail($productId);

         $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        if($request->has('season_id')) {
            $product->seasons()->sync($request->input('season_id', []));
        }
        

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

        return redirect()->route('products.index', $product->id);
    }
        public function destroy($productId) 
        {
            $product = Product::findOrFail($productId);
            $product->seasons()->detach();
            $product->delete();
            return redirect()->route('products.index');
            
        }
       
}