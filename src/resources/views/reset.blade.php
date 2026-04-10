@extends('layouts.app')

@section('title', 'Admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

    <form class="search-form" action="/search" method="GET">
        <div class="search-form__group--wide">
            <input
            class="search-form__input"
            type="text"
            name="name"
            value="{{ request('name') }}"
            placeholder="名前やメールアドレスを入力してください">
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
            <a href="/admin" class="search-form__button search-form__button--reset">リセット</a>
        </div>
    </form>

    <div class="admin__actions">
        <a href="{{ url('/export?' . http_build_query(request()->query())) }}" class="admin__export-button">
            エクスポート
        </a>
    </div>

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
                <td class="admin-table__item">
                    @if($contact->type === 'delivery')
                        商品のお届けについて
                    @elseif($contact->type === 'exchange')
                        商品の交換について
                    @elseif($contact->type === 'trouble')
                        商品トラブル
                    @elseif($contact->type === 'shop')
                        ショップへのお問い合わせ
                    @else
                        その他
                    @endif
                </td>
                <td class="admin-table__item">
                    <button type="button" class="admin-table__detail-button" onclick="openModal({{ $contact->id }})">
                        詳細
                    </button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="admin__pagination">
        {{ $contacts->links() }}
    </div>
</div>

<div id="modal" class="modal">
    <div class="modal__content">
        <span class="modal__close" onclick="closeModal()">&times;</span>
        <div id="modal-body"></div>
    </div>
</div>

<script>
    function openModal(id) {
        fetch(`/admin/contact/${id}`)
            .then(response => response.json())
            .then(data => {
                let gender = '';
                if (data.gender === 'male') gender = '男性';
                else if (data.gender === 'female') gender = '女性';
                else gender = 'その他';

                let type = '';
                if (data.type === 'delivery') type = '商品のお届けについて';
                else if (data.type === 'exchange') type = '商品の交換について';
                else if (data.type === 'trouble') type = '商品トラブル';
                else if (data.type === 'shop') type = 'ショップへのお問い合わせ';
                else type = 'その他';

                document.getElementById('modal-body').innerHTML = `
                    <p><strong>お名前：</strong>${data.last_name} ${data.first_name}</p>
                    <p><strong>性別：</strong>${gender}</p>
                    <p><strong>メール：</strong>${data.email}</p>
                    <p><strong>電話番号：</strong>${data.tel1}-${data.tel2}-${data.tel3}</p>
                    <p><strong>住所：</strong>${data.address}</p>
                    <p><strong>建物名：</strong>${data.building ?? ''}</p>
                    <p><strong>お問い合わせの種類：</strong>${type}</p>
                    <p><strong>お問い合わせ内容：</strong>${data.content}</p>
                `;
                document.getElementById('modal').style.display = 'flex';
            });
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }
</script>
@endsection