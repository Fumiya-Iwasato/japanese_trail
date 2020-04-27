<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Contact;
use App\Mail\ContactSendmail;


class FrontBlogController extends Controller
{
    public function top(Request $request) {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Blog::where('title', $cond_title)->orderBy('created_at', 'desc')->paginate(5);
            $posts = Blog::where('title', 'like', '%'.$cond_title.'%')->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $posts = Blog::orderBy('created_at', 'desc')->paginate(5);
        }
        return view('top', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function article(Request $request) {
        $blog = Blog::find($request->id);
        if(empty($blog)) {
            abort(404);
        }
        return view('article', ['blog' => $blog]);
    }

    public function contact() {
        return view('contact');
    }

    public function send(Request $request) {
        $this->validate($request, Contact::$rules);
        return redirect('top')->with('flash_message', 'Your message has been successfully sent.');
    }
}
