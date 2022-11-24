<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use App\Models\Invester;
use App\Models\Portifolio;
use App\Models\Share;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortifolioController extends Controller
{
    public function index()
    {
        $portifolios = Portifolio::latest()->get();

        return view('user.portifolio', [
            'portifolios' => $portifolios
        ]);
    }

    public function confirm($portifolio_id)
    {
        $portifolio = Portifolio::where('id',$portifolio_id)->latest()->first();
        $broker = Broker::where('user_id',$portifolio->user_id)->first();

        return view('user.buy-shares', [
            'portifolio' => $portifolio,
            'broker' => $broker
        ]);
    }

    public function buy(Request $request)
    {
        $invester = Invester::where('user_id', Auth::id())->first();
        if(is_null($invester))
        {
            return redirect()->route('user-details')->with('error', 'Add personal details first');
        }
        $request->validate([
            'broker_id' => ['required', 'integer'],
            'dividend' => ['required', 'numeric'],
            'selling' => ['required', 'numeric']
        ]);

        $broker = Broker::find($request->broker_id);
        $portifolio = Portifolio::where('user_id',$broker->user_id)->latest()->first();

        if($request->selling < $portifolio->selling){
            return redirect()->back()->with('error', 'Your amount is less than the bottom limit');
        }

        try{
            $already = Share::where('broker_id', $request->broker_id)->where('user_id', Auth::id())->first();

            if(is_null($already))
            {
                $share = new Share();
                $share->user_id = Auth::id();
                $share->broker_id = $request->broker_id;
                $share->dividend = calculate($portifolio->selling, $request->selling, $request->dividend);
                $share->buying = $request->selling;
                $share->status = 2;
                $share->save();

                return redirect()->back()->with('success', 'Successfully bought shares.');
            }

            return redirect()->back()->with('error', 'Already in possession of share with similar broker.');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
