@extends('layouts.app')

@section('title', 'Delete')

@section('css')
<link rel="stylesheet" href="{{ asset('css/logout.css') }}">
@endsection

@section('content')
<div class="logout">
    <div class="logout__inner">
        <h2>logoutしました</h2>

        @if(session('message'))
            <p>{{ session('message') }}</p>
        @endif

        <a href="/login">login画面に戻る</a>
    </div>
</div>
@endsection