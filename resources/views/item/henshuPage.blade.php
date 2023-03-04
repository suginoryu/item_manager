<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品編集ページ</title>
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>商品編集ページ</h1>
    <form action="{{ $item->id }}" method="post">
        <div>
            <label>商品名</label>
        </div>
        <div>
            <input type="text" name="name" value="{{ $item->name }}" placeholder="商品名を入力">
        </div>
        <div>
            <label>価格</label>
        </div>
        <div>
            <input type="number" name="price" value="{{ $item->price }}" placeholder="価格を入力">
        </div>
        <div>
            <label>カテゴリ名</label>
        </div>
        <div>
            <select name="category_id">
                <?php foreach($categories as $category): ?>
                    <!-- if文を利用して現在登録しているカテゴリを判別 -->
                    <?php if($category->id === $item->category_id): ?>
                        <!-- 登録されているカテゴリの場合にselected属性を付与 -->
                        <option value="{{ $category->id }}" selected>
                            {{ $category->name }}
                        </option>
                    <?php else: ?>
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            {{ csrf_field() }}
            <input type="submit" name="send" value="編集する">
        </div>
        <div>
            <!-- 一覧に戻る -->
            <a href="/item_manager/public/item">戻る</a>
        </div>
    </form>
</body>
</html>