@extends('layouts.app')

@section('title', 'Thanks')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks">
    <div class="thanks__inner">

        <!-- 背景テキスト -->
        <div class="thanks__background-text">
            Thank you
        </div>

        <!-- メッセージ -->
        <p class="thanks__message">
            お問い合わせありがとうございました
        </p>

        <!-- ボタン -->
        <div class="thanks__button">
            <a href="/" class="thanks__button-home">HOME</a>
        </div>

    </div>
</div>
@endsection