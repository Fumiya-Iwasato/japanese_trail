<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function form() {
        return view('admin.form');
    }

    public function create(Request $request) {
        $this->validate($request, Blog::$rules);
        $blog = new Blog;
        $form = $request->all();
        if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $blog->image_path = basename($path);
        } else {
          $news->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        $blog->fill($form);
        $blog->save();

        return redirect('admin/index'); 
    }

    public function edit() {
        return view('admin.edit');
    }

    public function update() {
        return redirect('admin/index');
    }

    public function delete() {
        return redirect('admin/index');
    }
}
