<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontBlogController extends Controller
{
    public function top() {
        return view('top');
    }
}
