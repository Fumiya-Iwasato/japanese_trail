<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontBlogController extends Controller
{
    public function top(Request $request) {
        $post = Blog::all()->sortByDesc('updated_at');
        return view('top');
    }
}
