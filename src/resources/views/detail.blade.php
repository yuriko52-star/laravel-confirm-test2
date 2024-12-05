@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css') }}" >
@endsection

@section('content')
<div class="content">
    <div class="link">
        <ol class="breadcrumb">
            <li><a href="/" class="products-list">商品一覧</a></li>
            <li><a href="/" class="products-name">キウイ</a></li>
        </ol>
    </div>
    <form action="" class="detail-form">
    <div class="products-card__item">
        <div class="products-card">
            <img src="" alt="/" class="products-image">
            <input type="file" name="image">
            <p class="error">画像を選択してね！</p>
        </div>
        
        <div class="products-card__group">
            <div class="products-card__name">
                <label for="">商品名</label>
                <div class="">
                <input type="text" class="products-card__name-input" placeholder="" value="">
                </div>
                <p class="error">名前を入れてね！</p>
            </div>
            <div class="products-card__price">
                <label for="">値段</label>
                <div class="">
                <input type="text" class="products-card__price-input" placeholder="" value="">
                </div>
                <p class="error">値段を入れてね！</p>
            </div>
            <div class="products-card__season">
                <label for="">季節</label>
                <div class="season__checkbox">
                    <div class="season__checkbox-option">
                        <label for="season__label">
                            <input type="checkbox" name=""class="season__input">
                            <span class="season__text">春</span>
                        </label>
                    </div>
                
                    <div class="season__checkbox-option">
                        <label for="season__label">
                            <input type="checkbox" name=""class="season__input">
                            <span class="season__text">夏</span>
                        </label>
                    </div>
                    <div class="season__checkbox-option">
                        <label for="season__label">
                            <input type="checkbox" name=""class="season__input">
                            <span class="season__text">秋</span>
                        </label>
                    </div>
                    <div class="season__checkbox-option">
                        <label for="season__label">
                            <input type="checkbox" name=""class="season__input">
                            <span class="season__text">冬</span>
                        </label>
                    </div>
                
                </div>
            <p class="error">季節を入れてね！</p>
            </div>
        </div>
    </div>
        <div class="products-detail">
            <div class="">
            <label class="products-detail__label">商品説明</label>
            </div>
            <textarea name="description" id="">説明文入ります</textarea>
            <p class="error">説明文入れてね！</p>
        </div>
        <div class="button__item">
       <a href="" class="back__link">戻る</a>
        <input type="submit" class="store-button" value="変更を保存">
        <button type="button" class="delete__button"> <img src="/storage/images/trash_icon_128726.png" height ="32" width="32"  /></button>
        </div>

        
        
    
        
    
    </form>
</div>
@endsection