@extends('admin.layouts.master')

@section('content')

<div id="chart" style="height: 500px;"></div>
<script>
    Morris.Bar({
      element: 'chart',
      data: [
        { date: '1', value: 3 },
        { date: '2', value: 1 },
        { date: '3', value: 5 },
        { date: '4', value: 1 },
        { date: '5', value: 2 },
        { date: '6', value: 3 },
        { date: '7', value: 2 },
        { date: '8', value: 2 },
        { date: '9', value: 5 },
        { date: '10', value: 2 },
        { date: '11', value: 5 },
        { date: '12', value: 1 },
        { date: '13', value: 2 },
        { date: '14', value: 4 },
        { date: '15', value: 2 },
        { date: '16', value: 2 },
        { date: '17', value: 3 },
        { date: '18', value: 2 },
        { date: '19', value: 4 },
        { date: '20', value: 2 },
        { date: '21', value: 4 },
        { date: '22', value: 1 },
        { date: '23', value: 2 },
        { date: '24', value: 3 },
        { date: '25', value: 2 },
        { date: '26', value: 4 },
        { date: '27', value: 2 },
        { date: '28', value: 5 },
      ],
      xkey: 'date',
      ykeys: ['value'],
      labels: ['Borrows']
    });
</script>
@endsection