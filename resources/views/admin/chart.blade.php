@extends('admin.layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> {{trans('labels.chart_borrow')}}</div>
        <div id="chart" class="charts"></div>
    </div>
    <div class="panel panel-default">
        <div class="panel panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> {{trans('labels.chart_user')}}</div>
        <div align="center" class="form-group">
            {{Form::selectYear('year', config('define.year_begin'), config('define.year_end'),null,['id'=>'year','class'=>'input input-sm'])}}
            <button type="button" id="show" class="btn btn-sm btn-info">{{trans('labels.btnchart')}}</button>
        </div>
        <div id="user" class="charts"></div>
    </div>
@endsection
@section('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> 
    <script src="{{ url('backend/js/chart.js')}}"></script>
    <script type="text/javascript">
        var path_chart_user = {!! json_encode(config('path.path_chart_user')) !!};
        var path_chart_borrow = {!! json_encode(config('path.path_chart_borrow')) !!};
    </script> 
@endsection