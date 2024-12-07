@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css') }}" >
@endsection

@section('content')
<div class="content">
    <div class="link">
        <ol class="breadcrumb">
            <li><a href="/" class="products-list">商品一覧</a></li>
            <li><a href="/" class="products-name">{{$product->name}}</a></li>
        </ol>
    </div>
    <form action="{{ route('products.update', $product->id) }}" class="update-form" method="post"enctype="multipart/form-data">
        @method('PUT')
        @csrf
        
    <div class="products-card__item">
        <div class="products-card">
          
            <img src="{{asset('storage/images/' . $product->image)}}" alt="/" class="products-image">
            <input type="file" name="image">
          
            <p class="error">画像を選択してね！</p>
        </div>
        
        <div class="products-card__group">
            <div class="products-card__name">
                <label for="">商品名</label>
                <div class="">
                <input type="text" class="products-card__name-input"name="name" placeholder="商品名を入力" value="{{ old('name', $product->name )}}"style="color:gray;">
                </div>
                <p class="error">名前を入れてね！</p>
            </div>
            <div class="products-card__price">
                <label for="">値段</label>
                <div class="">
                <input type="text" class="products-card__price-input" name="price"placeholder="値段を入力" value="{{ old('price', $product->price) }}"style="color:gray;">
                </div>
                <p class="error">値段を入れてね！</p>
            </div>
            <div class="products-card__season">
                <label for="">季節</label>

                <!-- <div class="season__checkbox"> -->
                    <!-- <div class="season__checkbox-option"> -->
                

                        <label class="seasons__label">
                            @foreach($allSeasons as $season)
                            <input type="checkbox" name="seasons[]"class="season__input"value="{{ $season->id}}"{{ old('seasons', $product->seasons)->contains('id',$season->id) ? 'checked' : ''}}>
                            <span class="season__text">{{$season->name}}</span>
                            @endforeach
                        </label>

                    <!-- </div> -->
                <!-- </div> -->
                
            <p class="error">季節を入れてね！</p>
            </div>
        </div>
    </div>
        <div class="products-detail">
            <div class="">
            <label class="products-detail__label">商品説明</label>
            </div>
            <textarea name="description" id=""style="color:gray;"placeholder="商品の説明を入力">{{ old('description', $product->description )}}</textarea>
            <p class="error">説明文入れてね！</p>
        </div>
        <div class="button__item">
       <a href="/products" class="back__link">戻る</a>
        <input type="submit" class="store-button" value="変更を保存">
    </form>
    <form action="{{ route('products.delete',$product->id)}}" class="delete-form" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="delete__button"> <img src="/storage/images/trash_icon_128726.png" height ="32" width="32"style="filter: invert(27%) sepia(94%) saturate(5482%) hue-rotate(0deg) brightness(95%) contrast(104%);" />
        </button>
    </form>
</div>

        
        
    
        
    
    
<!-- </div> -->
@endsection