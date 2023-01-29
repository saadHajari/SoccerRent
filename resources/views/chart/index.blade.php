@extends('layouts.app')
@section('content')
<div class="content">
	<div class="row">
<div class="container">
  <div class="row">
    <div class="col">
    <h5>{!! $chart3->options['chart_title'] !!}</h5>
     {!! $chart3->renderHtml() !!}   
      </div>
    <div class="col">
       <h5>{{ $chart2->options['chart_title'] }}</h5>
              {!! $chart2->renderHtml() !!}
    </div>
  </div>
</div>
                <h4>{!! $chart1->options['chart_title'] !!}</h4>
                {!! $chart1->renderHtml() !!}          

                <h4>{!! $chart4->options['chart_title'] !!}</h4>
                {!! $chart4->renderHtml() !!}   

                <h4>{!! $chart5->options['chart_title'] !!}</h4>
                {!! $chart5->renderHtml() !!}                              
   </div>
   </div>
@endsection

@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
   

    {!! $chart2->renderJs() !!}
    {!! $chart3->renderJs() !!}
    {!! $chart1->renderJs() !!}
    {!! $chart4->renderJs() !!}
    {!! $chart5->renderJs() !!}

@endsection



