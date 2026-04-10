@extends('layouts.app')

@section('title', 'Login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <div class="login__inner">

        <div class="login__heading">
            <h2>Login</h2>
        </div>

        <form class="login-form" method="POST" action="/login">
            @csrf

            <div class="login-form__group">
                <label class="login-form__label">メールアドレス</label>
                <input
                    class="login-form__input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="例: test@example.com">
            </div>

            <div class="login-form__group">
                <label class="login-form__label">パスワード</label>
                <input
                    class="login-form__input"
                    type="password"
                    name="password"
                    placeholder="例: coachtech1106">
            </div>

            <div class="login-form__button">
                <button type="submit" class="login-form__button-submit">
                    ログイン
                </button>
            </div>
        </form>

    </div>
</div>
@endsection