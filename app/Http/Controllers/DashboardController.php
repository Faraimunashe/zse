<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('admin'))
        {
            return redirect()->route('admin-dashboard');
        }elseif(Auth::user()->hasRole('broker'))
        {
            return redirect()->route('broker-dashboard');
        }elseif(Auth::user()->hasRole('user'))
        {
            return redirect()->route('user-dashboard');
        }else{
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    }
}
