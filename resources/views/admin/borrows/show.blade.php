@extends('admin.layouts.master')

@section('title', trans('borrow.deltail'))

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {!!trans('borrow.detail')!!}
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>
                <a href="{{ route('home.admin') }}">{!!trans('labels.dashboard' )!!} </a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i>
                <a href="{{ route('admin.borrow.index') }}">{!!trans('borrow.title' )!!} </a>
            </li>
             <li class="active">
                <i class="fa fa-edit"></i> {!!trans('borrow.detail' )!!} 
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col col-md-12">
        <div class="table-responsive">
            <table id="list_books" class="display text-center">
                <thead>
                    <tr>
                        <th class="text-center">
                            {!! Form::checkbox('check_all', 1, false, ['class' => 'mass']) !!}
                        </th>
                        <th class="text-center">{!!trans('borrow.book_item_id' )!!}</th>
                        <th class="text-center">{!!trans('borrow.book_name' )!!}</th>
                        <th class="text-center">{!!trans('borrow.create_at' )!!}</th>
                        <th class="text-center">{!!trans('borrow.expiretime' )!!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrowDetail as $item)
                    <tr>
                        <td>
                            {!! Form::checkbox('check-', 1, false, ['class' => 'single']) !!}
                        </td>
                        <td>{{ $item->book_item_id }}</td>
                        <td>{{ $item->bookItem->book->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->expiretime }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="check">
                        {!! trans('borrow.return') !!}
                    </button>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection