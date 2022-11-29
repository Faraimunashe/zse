<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Exception;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        return view('admin.notices', [
            'notices' => Notice::latest()->get()
        ]);
    }

    public function notice()
    {
        return view('admin.create-notice');
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string']
        ]);

        try{
            $notice = new Notice();
            $notice->title = $request->title;
            $notice->content = $request->content;
            $notice->save();

            return redirect()->back()->with('success', 'successfully added notice');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
