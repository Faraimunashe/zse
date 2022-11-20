<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Dividend;
use Illuminate\Http\Request;

class DividendController extends Controller
{
    public function index()
    {
        return view('user.dividends', [
            'dividends' => Dividend::all()
        ]);
    }
}
