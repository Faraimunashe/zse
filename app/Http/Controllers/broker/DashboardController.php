<?php

namespace App\Http\Controllers\broker;

use App\Http\Controllers\Controller;
use App\Models\Invester;
use App\Models\Share;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $investments = Share::where('broker_id', broker()->id)->latest()->get();
        return view('broker.dashboard', [
            'investments' => $investments
        ]);
    }
}
