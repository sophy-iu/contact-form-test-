<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
<header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        FashionablyLate
      </a>
    </div>
</header>

<main>
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
                        <input type="text" name="last_name" placeholder="例: 山田">
                        <input type="text" name="first_name" placeholder="例: 太郎">
                    </div>
                </div>
            </div>

            <!-- 性別 -->
            <div class="form__group">
                <div class="form__group-title">
                    <label>性別 <span>※</span></label>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <label><input type="radio" name="gender" value="male"> 男性</label>
                        <label><input type="radio" name="gender" value="female"> 女性</label>
                        <label><input type="radio" name="gender" value="other"> その他</label>
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
                        <input type="email" name="email" placeholder="例: test@example.com">
                    </div>
                </div>
            </div>

            <!-- 電話番号 -->
            <div class="form__group">
                <div class="form__group-title">
                    <label>電話番号 <span>※</span></label>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="tel1">
                        <span>-</span>
                        <input type="text" name="tel2">
                        <span>-</span>
                        <input type="text" name="tel3">
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
                        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
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
                        <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101">
                    </div>
                </div>
            </div>

            <!-- 種類 -->
            <div class="form__group">
                <div class="form__group-title">
                    <label>お問い合わせの種類 <span>※</span></label>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <select name="type">
                            <option value="">選択してください</option>
                            <option value="product">商品について</option>
                            <option value="service">サービスについて</option>
                            <option value="other">その他</option>
                        </select>
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
                        <textarea name="content" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn">確認画面</button>

        </form>
    </div>
</main>

</body>
</html>