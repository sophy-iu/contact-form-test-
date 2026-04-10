@extends('layouts.app')

@section('title', 'Register')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register">
    <div class="register__inner">

        <div class="register__heading">
            <h2>Register</h2>
        </div>

        <form class="register-form" method="POST" action="/register">
            @csrf

            <!-- 名前 -->
            <div class="register-form__group">
                <label class="register-form__label">お名前</label>
                <input
                    class="register-form__input"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="例: 山田 太郎">
            </div>
            <div class="form__error">
                @error('name')
                    {{$message}}
                @enderror
            </div>

            <!-- メール -->
            <div class="register-form__group">
                <label class="register-form__label">メールアドレス</label>
                <input
                    class="register-form__input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="例: test@example.com">
            </div>
            <div class="form__error">
                @error('email')
                    {{$message}}
                @enderror
            </div>

            <!-- パスワード -->
            <div class="register-form__group">
                <label class="register-form__label">パスワード</label>
                <input
                    class="register-form__input"
                    type="password"
                    name="password"
                    placeholder="例: coachtech1106">
            </div>
            <div class="form__error">
                @error('password')
                    {{$message}}
                @enderror
            </div>

            <div class="register-form__button">
                <button type="submit" class="register-form__button-submit">
                    登録
                </button>
            </div>

        </form>

    </div>
</div>
@endsection