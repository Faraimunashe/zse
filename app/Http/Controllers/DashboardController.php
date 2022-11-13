<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::hasRole('admin'))
        {

        }elseif(Auth::hasRole('broker'))
        {
            return redirect()->route('admin-dashboard');
        }elseif(Auth::hasRole('user'))
        {

        }else{
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    }
}
