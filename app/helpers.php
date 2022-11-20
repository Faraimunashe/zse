<?php

use App\Models\Stock;

function get_rate($broker_id){
    $stock = Stock::where('broker_id', $broker_id)->first();

    return $stock->rate;
}
