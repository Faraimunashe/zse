<?php

use App\Models\Broker;
use App\Models\Invester;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

function get_rate($broker_id){
    $stock = Stock::where('broker_id', $broker_id)->first();

    return $stock->rate;
}

function get_broker($broker_id){
    return Broker::find($broker_id);
}

function get_invester($user_id){
    return Invester::where('user_id',$user_id)->first();
}

function share_status($num){
    $status = new stdClass();
    if($num === 2){
        $status->label = "pending";
        $status->badge = "warning";
    }elseif($num === 1){
        $status->label = "processed";
        $status->badge = "success";
    }else{
        $status->label = "failed";
        $status->badge = "danger";
    }

    return $status;
}

function broker(){
    return Broker::where('user_id', Auth::id())->first();
}

function calculate($selling, $buying, $dividend){
    return ($buying/$selling) * $dividend;
}
