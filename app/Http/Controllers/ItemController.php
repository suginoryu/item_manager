<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use App\Category;

class ItemController extends Controller
{
    // 商品一覧の表示
    public function index()
    {
        $query = Item::query()->whereNull("deleted_at");
        $items = $query->get();
        // views\item\index.blade.phpを表示
        // 画面で利用する変数として$itemsを連想配列で渡す
        return view("item.index", ["items" => $items]);
    }

    // 商品登録ページ表示用
    public function torokuPage()
    {
        $categories = Category::all();
        // views\item\torokuPage.blade.phpを表示
        return view("item.torokuPage", ["categories" => $categories]);
    }

    // 商品登録の実行
    public function toroku(Request $request)
    {
        $item = new Item();

        // リクエストからModelの$fillableに設定したプロパティのみを抽出・保存
        $item->fill($request->all())->save();

        // views\item\index.blade.phpにリダイレクト
        return redirect("/item");
    }

    // 商品編集ページ
    public function henshuPage($id)
    {
        // 商品データを1件取得
        $item = Item::find($id);
        $categories = Category::all();
        // views\item\henshuPage.blade.phpを表示
        return view("item.henshuPage", [
          "item" => $item,
          "categories" => $categories
        ]);
    }

    // 商品編集の実行
    public function henshu($id, Request $request)
    {
        // 商品データを1件取得
        $item = Item::find($id);

        // リクエストからModelの$fillableに設定したプロパティのみを抽出・保存
        $item->fill($request->all())->save();

        // views\item\index.blade.phpにリダイレクト
        return redirect("/item");
    }

    // 商品削除の実行
    public function sakujo($id)
    {
        // 商品データを1件取得
        $item = Item::find($id);

        // 現在日時を取得、フォーマットを変換
        $date = date("Y-m-d H:i:s");
    
        // deleted_at に取得した日時を保存
        $item->deleted_at = $date;
        $item->save();
    
        // views\item\index.blade.phpにリダイレクト
        return redirect("/item");
    }

    public function zaikoKanri(Request $request, $id)
    {
        // URLのidを利用してItemモデルから1件取得
        $item = Item::find($id);
        // $requestから入力された在庫数を取得
        $stock = $request->input("stock");
        // 入力が未入力 or 入力値が0以下の場合
        if (empty($stock) || $stock <= 0) {
            // 処理を行わずにリダイレクト
            return redirect("/item");
        }
        // 入荷の場合
        if ($request->has("in")) {
            // 商品の在庫数に$stockを加算
            $item->stock += $stock;
        // 出荷の場合
        // 商品の在庫数と$stockを比較
        } else if ($request->has("out")) {
            // 商品の在庫数が多い場合
            if ($item->stock >= $stock) {
                // 減算
                $item->stock -= $stock;
            }
        }
        // 在庫数の変動を保存
        $item->save();
        // 一覧ページへのリダイレクト
        return redirect("/item");
    }
}

