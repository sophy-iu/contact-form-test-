@extends('layouts.app')

@section('title', 'Confirm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>

    <table class="confirm-table__inner">
        <!-- 名前 -->
        <tr class="confirm-table__row">
            <th class="confirm-table__header">お名前</th>
            <td class="confirm-table__text">
                {{ $last_name }} {{ $first_name }}
            </td>
        </tr>

        <!-- 性別 -->
        <tr class="confirm-table__row">
            <th class="confirm-table__header">性別</th>
            <td class="confirm-table__text">
                @if($gender == 'male') 男性
                @elseif($gender == 'female') 女性
                @else その他
                @endif
            </td>
        </tr>

        <!-- メール -->
        <tr class="confirm-table__row">
            <th class="confirm-table__header">メールアドレス</th>
            <td class="confirm-table__text">
                {{ $email }}
            </td>
        </tr>

        <!-- 電話番号 -->
        <tr class="confirm-table__row">
            <th class="confirm-table__header">電話番号</th>
            <td class="confirm-table__text">
                {{ $tel1 }}-{{ $tel2 }}-{{ $tel3 }}
            </td>
        </tr>

        <!-- 住所 -->
        <tr class="confirm-table__row">
            <th class="confirm-table__header">住所</th>
            <td class="confirm-table__text">
                {{ $address }}
            </td>
        </tr>

        <!-- 建物名 -->
        <tr class="confirm-table__row">
            <th class="confirm-table__header">建物名</th>
            <td class="confirm-table__text">
                {{ $building }}
            </td>
        </tr>

        <!-- 種類 -->
        <tr class="confirm-table__row">
            <th class="confirm-table__header">お問い合わせの種類</th>
            <td class="confirm-table__text">
                @if($type == 'product') 商品について
                @elseif($type == 'service') サービスについて
                @else その他
                @endif
            </td>
        </tr>

        <!-- 内容 -->
        <tr class="confirm-table__row">
            <th class="confirm-table__header">お問い合わせ内容</th>
            <td class="confirm-table__text confirm-table__text--content">
                {{ $content }}
            </td>
        </tr>
    </table>

    <!-- ボタン -->
    <div class="confirm__button">
        <!-- 送信 -->
        <form method="POST" action="/thanks">
            @csrf

            <!-- hiddenで値引き継ぎ（重要） -->
            <input type="hidden" name="last_name" value="{{ $last_name }}">
            <input type="hidden" name="first_name" value="{{ $first_name }}">
            <input type="hidden" name="gender" value="{{ $gender }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="tel1" value="{{ $tel1 }}">
            <input type="hidden" name="tel2" value="{{ $tel2 }}">
            <input type="hidden" name="tel3" value="{{ $tel3 }}">
            <input type="hidden" name="address" value="{{ $address }}">
            <input type="hidden" name="building" value="{{ $building }}">
            <input type="hidden" name="type" value="{{ $type }}">
            <input type="hidden" name="content" value="{{ $content }}">

            <button class="confirm__button-submit">送信</button>
        </form>

        <!-- 修正 -->
        <form method="GET" action="/">
            <button type="submit" class="confirm__button-back">修正</button>
        </form>
    </div>
</div>
@endsection