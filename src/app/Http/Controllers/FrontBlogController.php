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
        $posts = Blog::all()->sortByDesc('updated_at');
        return view('top', ['posts' => $posts]);
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
