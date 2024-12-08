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
                @error('name')
                {{$message}}
                @enderror
            </div>

        </div>
        <div class="register__group">
            <div class="register__group-heading">
                <label class="register__label">値段</label>
                <span class="register__label-required">必須</span>
            </div>

            <input type="text" class="register__input-text" name="price"  placeholder="値段を入力" style="color:gray;"value="{{old('price')}}">
            <div class="error">
                @error('price')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="register__group-heading">
                <label class="register__label">商品画像</label>
                <span class="register__label-required">必須</span>
            </div>
            <div class="products-card">
          
            <img src="{{ isset($product) && $product->image ? asset('storage/images/' . $product->image) : '' }}" alt="/" class="products-image">
            <input type="file" name="image">
           
            @error('image')
            <div class="error">{{$message}} </div>
            @enderror
           
        </div>    

        <div class="register__group">
            <div class="register__group-heading">
                <label class="register__label">季節</label>
                <span class="register__label-required">必須</span>
                <span class="register__label-option">複数選択可</span>
            </div>
            
             @foreach($allSeasons ?? [] as $season)
            <label class="seasons__label">
                <input type="checkbox" name="season_id[]"class="season__input" value="{{$season->id}}"{{ in_array($season->id, old('season_id', $product->seasons->pluck('id')->toArray() ?? [])) ? 'checked' : ''}}>
                <span class="season__text">{{$season->name}}</span>
            </label>
            @endforeach  
            <div class="error">
                @error('season_id')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="register__group">
            <div class="register__group-heading">
                <label class="register__label">商品説明</label>
                <span class="register__label-required">必須</span>
            </div>
            <textarea name="description" id=""style="color:gray;"placeholder="商品の説明を入力">{{old('description')}}</textarea>
            <div class="error">
                @error('description')
                {{$message}}
                @enderror
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