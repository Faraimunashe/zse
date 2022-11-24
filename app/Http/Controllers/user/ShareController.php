<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use App\Models\Invester;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ShareController extends Controller
{
    public function index()
    {
        $shares = Share::where('user_id', Auth::id())->latest()->get();
        return view('user.shares', [
            'shares' => $shares
        ]);
    }

    public function certificate($share_id)
    {
        $share = Share::find($share_id);

        $pdf = PDF::loadView('pdf.certificate', [
            'share' => $share,
            'broker' => Broker::find($share->broker_id),
            'investor' => Invester::where('user_id', $share->user_id)->first()
        ]);
        // download PDF file with download method
        return $pdf->download('share-'.$share->id.'certificate.pdf');
    }
}
