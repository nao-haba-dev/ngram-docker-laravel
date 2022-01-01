<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'shops';

    /**
     * 複数代入可能な属性
     *
     * @var array
     */
    protected $fillable = ['name', 'age', 'gender_id'];
}
