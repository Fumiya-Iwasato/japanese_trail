<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'title' => 'required',
        // 文字数が多いとエラーが出る
        'body' => 'required|max:3000', 
    ];
}
