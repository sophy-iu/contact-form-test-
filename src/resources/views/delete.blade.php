@extends('layouts.app')

@section('title', 'Delete')

@section('css')
<link rel="stylesheet" href="{{ asset('css/delete.css') }}">
@endsection

@section('content')
<div class="delete">
    <div class="delete__inner">
        <h2>削除しました</h2>

        @if(session('message'))
            <p>{{ session('message') }}</p>
        @endif

        <a href="/admin">一覧に戻る</a>
    </div>
</div>
@endsection