<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.new-letter');
    }

    public function send(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'email' => ['required', 'email']
        ]);

        $details = [

            'title' => $request->title,

            'body' => $request->body

        ];



        \Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));

        return redirect()->back()->with('success', 'successfully sent email');
    }
}
