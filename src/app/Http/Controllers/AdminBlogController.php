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
          $posts = Blog::where('title', $cond_title)->get()->sortByDesc('updated_at');
      } else {
          $posts = Blog::all()->sortByDesc('updated_at');
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

        return redirect('admin/index')->with('flash_message', 'Successfully created'); 
    }

    public function edit(Request $request) {
        $blog = Blog::find($request->id);
        if (empty($blog)) {
            abort(404);
        }
        return view('admin.edit',  ['blog_form' => $blog]);
    }

    public function update(Request $request) {
        $this->validate($request, Blog::$rules);
        $blog = Blog::find($request->id);
        $blog_form = $request->all();
        if (isset($blog_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $blog->image_path = basename($path);
            unset($blog_form['image']);
        } elseif (isset($request->remove)) {
            $blog->image_path = null;
            unset($blog_form['remove']);
        }
        unset($blog_form['_token']);
        $blog->fill($blog_form)->save();
        
        return redirect('admin/index')->with('flash_message', 'Successfully updated');
    }

    public function delete(Request $request) {
        $blog = Blog::find($request->id);
        $blog->delete();
        return redirect('admin/index')->with('flash_message', 'Successfully deleted');
    }
}
