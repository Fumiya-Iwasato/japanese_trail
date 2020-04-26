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
        'message' => 'required|max:1000',
    ];
}
