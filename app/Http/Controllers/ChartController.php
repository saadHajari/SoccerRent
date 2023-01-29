<?php

namespace App\Http\Controllers;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    
    public function index()
    {

      $chart_options = [
    'chart_title' => 'Clubs by day',
    'report_type' => 'group_by_date',
    'model' => 'App\Club',
    'group_by_field' => 'created_at',
    'group_by_period' => 'day',
    'chart_type' => 'bar',
    'column_class' => 'col-md-4' ,
];

$chart1 = new LaravelChart($chart_options);


$chart_options = [
        'chart_title' => 'Delegates by names',
        'report_type' => 'group_by_string',
        'model' => 'App\Delegate',
        'group_by_field' => 'Nom',
        'chart_type' => 'pie',
        'filter_field' => 'created_at',
        'filter_period' => 'month',
        'column_class' => 'col-md-4' , // show users only registered this month
    ];

    $chart2 = new LaravelChart($chart_options);

$chart_options = [
        'chart_title' => 'Adherant by names',
        'report_type' => 'group_by_string',
        'model' => 'App\Adherant',
        'group_by_field' => 'nom',
        'chart_type' => 'pie',
        'filter_field' => 'created_at',
        'filter_period' => 'month',
        'column_class' => 'col-md-4' , // show users only registered this month
    ];

    $chart3 = new LaravelChart($chart_options);

 $chart_options = [
        'chart_title' => 'Admins by dates',
        'report_type' => 'group_by_date',
        'model' => 'App\Admin',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'chart_type' => 'line',
    ];

    $chart4 = new LaravelChart($chart_options);

     $chart_options = [
        'chart_title' => 'Terrain by Price (MAD) ',
        'report_type' => 'group_by_date',
        'model' => 'App\Terrain',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'aggregate_function' => 'sum' ,
        'aggregate_field' => 'price',
        'chart_type' => 'line',
    ];

    $chart5 = new LaravelChart($chart_options);


return view('chart.index', compact('chart1','chart2','chart3','chart4','chart5'));


    }




}
