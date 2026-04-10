@extends('layouts.app')

@section('title', 'Contact')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>

    <form class="form" method="POST" action="/confirm">
        @csrf

        <!-- 名前 -->
        <div class="form__group">
            <div class="form__group-title">
                <label>お名前 <span>※</span></label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <div class="form__input-item">
                        <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
                        <div class="form__error">
                            @error('last_name')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form__input-item">
                        <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
                        <div class="form__error">
                            @error('first_name')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 性別 -->
        <div class="form__group">
            <div class="form__group-title">
                <label>性別 <span>※</span></label>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <label class="form__radio">
                        <input type="radio" name="gender" value="male"> 男性
                    </label>
                    <label class="form__radio">
                        <input type="radio" name="gender" value="female"> 女性
                    </label>
                    <label class="form__radio">
                        <input type="radio" name="gender" value="other"> その他
                    </label>
                </div>
                <div class="form__error">
                    @error('gender')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- メール -->
        <div class="form__group">
            <div class="form__group-title">
                <label>メールアドレス <span>※</span></label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <div class="form__input-item">
                        <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
                        <div class="form__error">
                            @error('email')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 電話番号 -->
        <div class="form__group">
            <div class="form__group-title">
                <label>電話番号 <span>※</span></label>
            </div>
            <div class="form__group-content">
                <div class="form__input--tell">
                    <div class="form__input-item">
                        <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}" />
                        <div class="form__error">
                            @error('tel1')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <span>-</span>

                    <div class="form__input-item">
                        <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}" />
                        <div class="form__error">
                            @error('tel2')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <span>-</span>

                    <div class="form__input-item">
                        <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
                        <div class="form__error">
                            @error('tel3')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 住所 -->
        <div class="form__group">
            <div class="form__group-title">
                <label>住所 <span>※</span></label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <div class="form__input-item">
                        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                        <div class="form__error">
                            @error('address')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 建物名 -->
        <div class="form__group">
            <div class="form__group-title">
                <label>建物名</label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <div class="form__input-item">
                        <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- 種類 -->
        <div class="form__group">
            <div class="form__group-title">
                <label>お問い合わせの種類 <span>※</span></label>
            </div>
            <div class="form__group-content">
                <div class="form__input--kinds">
                    <select name="type">
                        <option value="">選択してください</option>
                        <option value="delivery">商品のお届けについて</option>
                        <option value="exchange">商品の交換について</option>
                        <option value="trouble">商品トラブル</option>
                        <option value="shop">ショップへのお問い合わせ</option>
                        <option value="other">その他</option>
                    </select>
                </div>
                <div class="form__error">
                    @error('type')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- 内容 -->
        <div class="form__group">
            <div class="form__group-title">
                <label>お問い合わせ内容 <span>※</span></label>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="content" rows="5" placeholder="お問い合わせ内容をご確認ください。">{{ old('content') }}</textarea>
                </div>
                <div class="form__error">
                    @error('content')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__button">
            <button type="submit" class="form__button-submit">確認画面</button>
        </div>

    </form>
</div>
@endsection