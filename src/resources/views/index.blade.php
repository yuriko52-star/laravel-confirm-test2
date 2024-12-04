@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="content">
    <div class="heading">
        <!-- <div class="title"> -->
        <h2>
            @if(isset($keyword) && $keyword !== '')
             "{{$keyword}}"の商品一覧
             @else
              商品一覧
             @endif 
        </h2> 
        <!-- </div> -->
        <!-- <div class="link"> -->
            <a href="" class="add__link">
                ＋商品を追加
            </a>
        <!-- </div> -->
    </div>
   <div class="product__content">
    <form action="/products/search" class="search-form" method="get">
        @csrf
        <div class="search-form__input">
            <input type="text" name="keyword"class="search-form__input-text" placeholder="商品名で検索" value="{{old('keyword')}}">
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">
                検索
            </button>
        </div>
        <div class="products-show">
            <div class="products-show__label">
                 価格順で表示
            </div>
            <div class="products-show__select-inner">
                <select name="" id="" class="products-show__select">
                <option disabled selected>
                         価格で並び替え
                </option>
                </select>
            </div>
        </div>
    </form>
    
    <div class="products-card__group">
        @foreach($products as $product)
        <div class="products-card">
            <a href="" class="products-card__item">
                <img src="{{ asset('storage/images/' . $product->image)}}" alt="" class="products-image">
                <div class="products-card__content">
                    <label class="products-card__name">{{$product->name}}</label>
                    <label class="products-card__price">￥{{$product->price}}</label>
                </div>
            </a>
        </div>
         @endforeach
    </div>
   
    
  </div>
  @if(!isset($keyword)|| empty($keyword))
    <div class="pagination">
       {{ $products->links()}}
    </div>
  @endif
</div>
@endsection