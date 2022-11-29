<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Invester;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvesterController extends Controller
{
    public function index()
    {
        $invester = Invester::where('user_id', Auth::id())->first();
        return view('user.invester', [
            'invester' => $invester
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'natid' => ['required', 'max:15'],
            'sex' => ['required', 'string'],
            'phone' => ['required', 'digits:10', 'starts_with:07'],
            'address' => ['required', 'string']
        ]);

        try{
            $already = Invester::where('user_id', Auth::id())->first();
            if(is_null($already))
            {
                $inv = new Invester();
                $inv->user_id = Auth::id();
                $inv->name = $request->name;
                $inv->natid = $request->natid;
                $inv->sex = $request->sex;
                $inv->phone = $request->phone;
                $inv->address = $request->address;
                $inv->save();

                return redirect()->back()->with('success', 'successfully added your invester details');
            }

            return redirect()->back()->with('error', 'You already have invester details added');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
