<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品新規登録ページ</title>
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>商品新規登録ページ</h1>
    <form action="toroku" method="post">
        <div>
            <label>商品名</label>
        </div>
        <div>
            <input type="text" name="name" placeholder="商品名を入力してください">
        </div>
        <div>
            <label>価格</label>
        </div>
        <div>
            <input type="number" name="price" placeholder="価格を入力してください">
        </div>
        <div>
            <label>カテゴリ-名</label>
        </div>
        <div>
            <select name="category_id">
                <?php foreach($categories as $category): ?>
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            {{ csrf_field() }}
            <input type="submit" name="send" value="登録する">
        </div>
        <div>
            <!-- 一覧に戻る -->
            <a href="/item_manager/public/item">戻る</a>
        </div>
    </form>
</body>
</html>

