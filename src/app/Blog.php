<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'title' => 'required',
        'desc' => 'required',
        'body' => 'required|max:3000', 
    ];
}
