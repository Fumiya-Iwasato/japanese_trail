<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'title' => 'required',
        'body' => 'required|max:1000',
    ];
}
