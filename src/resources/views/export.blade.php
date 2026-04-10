@extends('layouts.app')

@section('title', 'Delete')

@section('css')
<link rel="stylesheet" href="{{ asset('css/export.css') }}">
@endsection

@section('content')
<div class="export">
    <div class="export__inner">
        <h2>エクスポートしました</h2>

        @if(session('message'))
            <p>{{ session('message') }}</p>
        @endif

        <a href="/admin">一覧に戻る</a>
    </div>
</div>
@endsection