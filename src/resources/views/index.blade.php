@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<!--クラス名をあとで考える  -->
<div class="content">
    <div class="heading">
        <!-- <div class="title"> -->
          <h2>商品一覧</h2>  
        <!-- </div> -->
        <!-- <div class="link"> -->
            <a href="" class="add__link">
                ＋商品を追加
            </a>
        <!-- </div> -->
    </div>
    <div class="product__content">
    <form action="" class="search-form">
        <div class="search-form__input">
            <input type="text" class="search-form__input-text" placeholder="商品名で検索">
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">
                検索
            </button>
        </div>
        <div class="show">
            <div class="show__label">
                 価格順で表示
            </div>
            <div class="show__select-inner">
                <select name="" id="" class="show__select">
                    <option disabled selected>
                         価格で並び替え
                    </option>
                </select>
            </div>
        </div>
    </form>
    <div class="card__box">
        <div class="card">card1</div>
        <div class="card">card2</div>
        <div class="card">card3</div>
        <div class="card">card4</div>
        <div class="card">card5</div>
        <div class="card">card6</div>
        <div class="card">card7</div>
        <div class="card">card8</div>
        <div class="card">card9</div>
        <div class="card">card10</div>
    </div>
    </div>
    <p class="pagenation">
        ページネーション
    </p>
</div>
@endsection