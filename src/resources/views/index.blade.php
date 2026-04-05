<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>
<body>

<header class="header">
    <h1>FashionablyLate</h1>
</header>

<main class="contact">
    <h2>Contact</h2>

    <form method="POST" action="/confirm">
        @csrf

        <!-- 名前 -->
        <div class="form-group">
            <label>お名前 <span class="required">※</span></label>
            <div class="name-group">
                <input type="text" name="last_name" placeholder="例: 山田">
                <input type="text" name="first_name" placeholder="例: 太郎">
            </div>
        </div>

        <!-- 性別 -->
        <div class="form-group">
            <label>性別 <span class="required">※</span></label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="male"> 男性</label>
                <label><input type="radio" name="gender" value="female"> 女性</label>
                <label><input type="radio" name="gender" value="other"> その他</label>
            </div>
        </div>

        <!-- メール -->
        <div class="form-group">
            <label>メールアドレス <span class="required">※</span></label>
            <input type="email" name="email" placeholder="例: test@example.com">
        </div>

        <!-- 電話番号 -->
        <div class="form-group">
            <label>電話番号 <span class="required">※</span></label>
            <div class="tel-group">
                <input type="text" name="tel1">
                <span>-</span>
                <input type="text" name="tel2">
                <span>-</span>
                <input type="text" name="tel3">
            </div>
        </div>

        <!-- 住所 -->
        <div class="form-group">
            <label>住所 <span class="required">※</span></label>
            <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
        </div>

        <!-- 建物名 -->
        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101">
        </div>

        <!-- 種類 -->
        <div class="form-group">
            <label>お問い合わせの種類 <span class="required">※</span></label>
            <select name="type">
                <option value="">選択してください</option>
                <option value="product">商品について</option>
                <option value="service">サービスについて</option>
                <option value="other">その他</option>
            </select>
        </div>

        <!-- 内容 -->
        <div class="form-group">
            <label>お問い合わせ内容 <span class="required">※</span></label>
            <textarea name="content" rows="5"></textarea>
        </div>

        <button type="submit" class="btn">確認画面</button>

    </form>
</main>

</body>
</html>