<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧表示ページ</title>
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <h1 class="header">商品管理システム</h1>
    <div class="main">
        <nav class="side-menu">
            <ul class="menu-list">
                <a href="item">
                    <li>商品一覧</li>
                </a>
                <a href="item/toroku">
                    <li>商品新規登録</li>
                </a>
            </ul>
        </nav>
        <div class="contents">
            <h1>商品一覧表示ページ</h1>
            <table class="tbl">
                <!-- テーブルの見出し -->
                <thead>
                    <tr>
                        <th>id</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>カテゴリ</th>
                        <th class="tbl-stock"><!-- 入出荷ボタン --></th>
                        <th><!-- 編集ボタン --></th>
                        <th><!-- 削除ボタン --></th>
                    </tr>
                </thead>
                <!-- テーブルの中身を出力します -->
                <tbody>
                    <?php foreach($items as $item): ?>
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price) }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                <form action="item/stock/{{ $item->id }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="number" class="tbl-form" name="stock">
                                    <input type="submit" class="tbl-stock-btn" name="in" value="入荷">
                                    <input type="submit" class="tbl-stock-btn" name="out" value="出荷">
                                </form>
                            </td>
                            <td>
                                <!-- 編集ページにアクセスします -->
                                <form action="item/henshu/{{ $item->id }}" method="get">
                                    <input type="submit" class="tbl-btn" value="編集">
                                </form>
                            </td>
                            <td>
                                <!-- 削除実行フォームです -->
                                <form action="item/sakujo/{{ $item->id }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="submit" class="tbl-btn" value="削除">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

