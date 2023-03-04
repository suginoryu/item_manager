<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // created_atとupdated_atの自動挿入を無効に
    public $timestamps = false;

    // INSERT、UPDATEで許可するカラムを指定
    protected $fillable = [
        "name",
        "price",
        "category_id"
    ];

    public function category()
    {
        // 商品から見た場合は多対一になる
        return $this->belongsTo('App\Category');
    }
}

