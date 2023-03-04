<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // created_at, updated_atの自動挿入を無効化
    public $timestamps = false;

    // INSERT,UPDATEで許可するカラムを指定
    protected $fillable = [
        "name"
    ];

    public function items()
    {
    // カテゴリから見た場合は一対多になる
    return $this->hasMany('App\Item');
    }
}