<?php

namespace App\Http\Controllers\broker;

use App\Http\Controllers\Controller;
use App\Models\Portifolio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortifolioController extends Controller
{
    public function index()
    {
        $portifolios = Portifolio::where('user_id', Auth::id())->latest()->get();
        $latest = Portifolio::where('user_id', Auth::id())->latest()->first();
        return view('broker.portifolio', [
            'portifolios' => $portifolios,
            'latest' => $latest
        ]);
    }

    public function update_portifolio()
    {
        return view('broker.update-portifolio');
    }

    public function update(Request $request)
    {
        $request->validate([
            'selling' => ['required', 'numeric'],
            'dividend' => ['required', 'numeric']
        ]);

        try{
            $port = new Portifolio();
            $port->user_id = Auth::id();
            $port->selling = $request->selling;
            $port->dividend = $request->dividend;
            $port->save();

            return redirect()->back()->with('success', 'successfully updated portifolio.');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
