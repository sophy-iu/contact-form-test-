@extends('layouts.app')

@section('title', 'Search')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

    <form class="search-form" action="/search" method="GET">
        <div class="search-form__group search-form__group--wide">
            <input
                class="search-form__input"
                type="text"
                name="keyword"
                value="{{ request('keyword') }}"
                placeholder="名前を入力してください">
        </div>

        <div class="search-form__group search-form__group--wide">
            <input
                class="search-form__input"
                type="text"
                name="email"
                value="{{ request('email') }}"
                placeholder="メールアドレスを入力してください">
        </div>

        <div class="search-form__group">
            <select class="search-form__select" name="gender">
                <option value="">性別</option>
                <option value="all" {{ request('gender') == 'all' ? 'selected' : '' }}>全て</option>
                <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>男性</option>
                <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>女性</option>
                <option value="other" {{ request('gender') == 'other' ? 'selected' : '' }}>その他</option>
            </select>
        </div>

        <div class="search-form__group">
            <select class="search-form__select" name="type">
                <option value="">お問い合わせの種類</option>
                <option value="delivery" {{ request('type') == 'delivery' ? 'selected' : '' }}>商品のお届けについて</option>
                <option value="exchange" {{ request('type') == 'exchange' ? 'selected' : '' }}>商品の交換について</option>
                <option value="trouble" {{ request('type') == 'trouble' ? 'selected' : '' }}>商品トラブル</option>
                <option value="shop" {{ request('type') == 'shop' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                <option value="other" {{ request('type') == 'other' ? 'selected' : '' }}>その他</option>
            </select>
        </div>

        <div class="search-form__group">
            <input
                class="search-form__input"
                type="date"
                name="date"
                value="{{ request('date') }}">
        </div>

        <div class="search-form__button-group">
            <button type="submit" class="search-form__button search-form__button--search">検索</button>
            <a href="{{ route('admin.reset') }}" class="search-form__button search-form__button--reset">リセット</a>
        </div>
    </form>

    <div class="admin-table">
        <table class="admin-table__inner">
            <tr class="admin-table__row admin-table__row--header">
                <th class="admin-table__header">お名前</th>
                <th class="admin-table__header">性別</th>
                <th class="admin-table__header">メールアドレス</th>
                <th class="admin-table__header">お問い合わせの種類</th>
                <th class="admin-table__header"></th>
            </tr>

            @foreach ($contacts as $contact)
            <tr class="admin-table__row">
                <td class="admin-table__item">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td class="admin-table__item">
                    @if($contact->gender === 'male')
                        男性
                    @elseif($contact->gender === 'female')
                        女性
                    @else
                        その他
                    @endif
                </td>
                <td class="admin-table__item">{{ $contact->email }}</td>
                <td class="admin-table__item">{{ $contact->type }}</td>
                <td class="admin-table__item">
                    <button type="button" class="admin-table__detail-button">詳細</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="admin__pagination">
        {{ $contacts->links() }}
    </div>
</div>
@endsection