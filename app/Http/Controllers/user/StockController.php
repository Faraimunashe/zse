<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function buy(Request $request)
    {
        $request->validate([
            'broker_id' => ['required'],
            'stock_id' => ['required']
        ]);

        try{
            $share = new Share();
            $share->user_id = Auth::id();
            $share->broker_id = $request->broker_id;
            $share->rate = get_rate();
        }
    }
}
