@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="content">
    <h2 class="products__register">
        商品登録
    </h2>
<form action="{{ route('products.store') }}" class="register-form" method="post" enctype="multipart/form-data">
    @csrf
    <div class="register-form__item">
        <div class="register__group">
            <div class="register__group-heading">
                <label class="register__label">商品名</label>
                <span class="register__label-required">必須</span>
            </div>

            <input type="text" class="register__input-text" name="name"  placeholder="商品を入力"style="color:gray;" value="{{old('name')}}">
            <div class="error">
                商品名を入れてね！
            </div>

        </div>
        <div class="register__group">
            <div class="register__group-heading">
                <label class="register__label">値段</label>
                <span class="register__label-required">必須</span>
            </div>

            <input type="text" class="register__input-text" name="price"  placeholder="値段を入力" style="color:gray;"value="{{old('price')}}">
            <div class="error">
                値段を入れてね！
            </div>
        </div>

       
            <div class="register__group-heading">
                <label class="register__label">商品画像</label>
                <span class="register__label-required">必須</span>
            </div>
            <div class="products-card">
          
            <img src="{{ old('image',$product->image ? asset('storage/images/' . $product->image) : '') }}" alt="/" class="products-image">
            <input type="file" name="image">
           
            
            <div class="error">
                画像を入れてね！
            </div>
        </div>    

        <div class="register__group">
            <div class="register__group-heading">
                <label class="register__label">季節</label>
                <span class="register__label-required">必須</span>
                <span class="register__label-option">複数選択可</span>
            </div>
            
             @foreach($allSeasons ?? [] as $season)
            <label class="seasons__label">
                           
            <input type="checkbox" name="seasons[]"class="season__input" value="{{$season->id}}"{{ old('seasons', $product->seasons ??  collect())->contains('id', $season->id) ? 'checked' : ''}}>
            <span class="season__text">{{$season->name}}</span>
                       
            </label>
            @endforeach  
            
            
            <div class="error">
                季節を入れてね！
            </div>
        </div>
        <div class="register__group">
            <div class="register__group-heading">
                <label class="register__label">商品説明</label>
                <span class="register__label-required">必須</span>
            </div>
            <textarea name="description" id=""style="color:gray;"placeholder="商品の説明を入力">{{old('description')}}</textarea>

            <div class="error">
                商品説明を入れてね！
            </div>
        
        </div>
    </div>
         <div class="button__item">
            <a href="/products" class="back__link">戻る</a>
            <input type="submit" class="register__button" value="登録">
        </div>
</form>
</div>
@endsection