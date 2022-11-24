<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class BrokerController extends Controller
{
    public function index()
    {
        return view('admin.brokers', [
            'brokers' => Broker::latest()->paginate(10)
        ]);
    }

    public function broker()
    {
        return view('admin.add-broker');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'phone' => ['required', 'digits:10'],
            'address' => ['required', 'string'],
            'email' => ['required']
        ]);

        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('broker1234'),
            ]);

            $user->attachRole('broker');

            event(new Registered($user));

            $broker = new Broker();
            $broker->user_id = $user->id;
            $broker->name = $request->name;
            $broker->phone = $request->phone;
            $broker->address = $request->address;
            $broker->save();

            return redirect()->back()->with('success', 'successfully added a broker');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
