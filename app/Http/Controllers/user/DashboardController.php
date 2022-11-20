<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    public function index()
    {
        $line = (new LarapexChart)->lineChart()
        ->setTitle('Monthly Indices 2022.')
        ->setSubtitle('Industrial Indices')
        ->addData('Econet Holding', [40, 93, 35, 42, 18, 82])
        ->addData('ZB Bank', [70, 29, 77, 28, 55, 45])
        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

        return view('user.dashboard', [
            'line' => $line
        ]);
    }
}
