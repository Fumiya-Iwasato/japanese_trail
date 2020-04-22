<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;

class AdminBlogController extends Controller
{
    public function index(Request $request) {

        $cond_title = $request->cond_title;
      if ($cond_title != '') {
          $posts = Blog::where('title', $cond_title)->get();
      } else {
          $posts = Blog::all();
      }
      return view('admin.index', ['posts' => $posts, 'cond_title' => $cond_title]);
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
          $blog->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        $blog->fill($form);
        $blog->save();

        return redirect('admin/index'); 
    }

    public function edit() {
        $blog = Blog::find($request->id);
        if (empty($blog)) {
            abort(404);
        }
        return view('admin.edit');
    }

    public function update() {
        return redirect('admin/index');
    }

    public function delete() {
        return redirect('admin/index');
    }
}
