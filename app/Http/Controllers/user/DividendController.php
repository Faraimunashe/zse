<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Dividend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DividendController extends Controller
{
    public function index()
    {
        return view('user.dividends', [
            'dividends' => Dividend::where('user_id', Auth::id())->get()
        ]);
    }
}
