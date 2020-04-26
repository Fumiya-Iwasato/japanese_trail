<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Contact;
use App\MailContact;

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
        $contact = new Contact;
        $form = $request->all();
        unset($form['_token']);
        $contact->fill($form);
        $contact->save();

        // 送信メール
    \Mail::send(new \App\MailContact([
        'to' => $request->email,
        'to_name' => $request->name,
        'from' => 'fmy.nmh@gmail.com',
        'from_name' => 'Jpanese Trail Races',
        'subject' => 'Thank you for inquiry',
        'title' => $request->title,
        'message' => $request->body
    ]));
 
    // 受信メール
    \Mail::send(new \App\MailContact([
        'to' => 'fmy.nmh@gmail.com',
        'to_name' => 'Japanese Trail Races',
        'from' => $request->email,
        'from_name' => $request->name,
        'subject' => 'Inquiry from Jpanese Trail Races',
        'title' => $request->title,
        'message' => $request->message
    ], 'from'));

        return redirect('top')->with('flash_message', 'Your message has been successfully sent.');
    }
}
