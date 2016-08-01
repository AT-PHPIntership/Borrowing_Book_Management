@extends('admin.layouts.master')

@section('title', trans('borrow.title'))

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {!!trans('borrow.title')!!}
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>
                <a href="{{ route('home.admin') }}">{!!trans('labels.dashboard' )!!} </a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i> {!!trans('borrow.title' )!!} 
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col col-md-12">
        <div class="table-responsive">
            <table id="list_borrows" class="display text-center">
                <thead>
                    <tr>
                        <th class="text-center">{!!trans('borrow.no' )!!}</th>
                        <th class="text-center">{!!trans('borrow.borrow_id' )!!}</th>
                        <th class="text-center">{!!trans('user.username' )!!}</th>
                        <th class="text-center">{!!trans('borrow.quantity' )!!}</th>
                        <th class="text-center">{!!trans('borrow.create_at' )!!}</th>
                        <th class="text-center">{!!trans('borrow.more' )!!}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index=1;?>
                    @foreach($borrows as $item)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td><a href="{{ route('admin.borrow.show',$item->id) }}">{{ $item->id }}</a></td>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.borrow.show',$item->id) }}"><button class="btn btn-info">{!!trans('borrow.view' )!!}</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>    
</div>
@endsection