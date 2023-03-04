<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 商品一覧の表示
Route::get("item", "ItemController@index");

// 商品登録ページ
Route::get("item/toroku", "ItemController@torokuPage");

// 商品登録の実行
Route::post("item/toroku", "ItemController@toroku");

// 商品編集ページ
Route::get("item/henshu/{id}", "ItemController@henshuPage");

// 商品編集の実行
Route::post("item/henshu/{id}", "ItemController@henshu");

// 商品削除の実行
Route::post("item/sakujo/{id}", "ItemController@sakujo");

// 在庫管理用のルーティング
Route::post("item/stock/{id}", "ItemController@zaikoKanri");