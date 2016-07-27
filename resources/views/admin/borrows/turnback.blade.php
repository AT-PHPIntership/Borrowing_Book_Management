@extends('admin.layouts.master')

@section('title', trans('borrow.title_back'))

@section('content')
<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {!!trans('borrow.header')!!}
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>
                    <a href="{!! route('home.admin') !!}">{!!trans('borrow.dashboard' )!!} </a>
                </li>
                <li class="active">
                    <i class="fa fa-pencil fa-fw"></i>
                    {!!trans('borrow.give_back' )!!}  
                </li>
            </ol>
        </div>
    </div>
    <div class="col-lg-12">
            <h1 class ="text-center"><b>{!! trans('borrow.form') !!}</b></h1>
    <div class="input_fields_wrap col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12 thumbnail">
            <p><b>{!! trans('borrow.enter') !!}</b></p>
        <button class="add_row_button btn btn-info" id="add_button"> + </button>
    <div>
        <input type="text" name="addbook" class="form-control" id="bookid"><br>
         <span id="error" class="error"></span>
    </div>
    <div>
        <form action="{{ route('admin.back')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
        <table id="list_book" class="display text-center table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center"> {!! trans('borrow.borrow_id') !!} </th>
                    <th class="text-center"> {!! trans('borrow.fullname') !!}</th>
                    <th class="text-center"> {!! trans('borrow.book_name') !!}</th>
                    <th class="text-center"> {!! trans('borrow.remove') !!} </th>
                </tr>
            </thead>
            <tbody id="list-add">
            <tr id="rowBook">
            <td></td>
            <td></td>
            <td></td>
            <td>
                <button class="btn btn-danger glyphicon glyphicon-remove btn-xs btn-delete delete-task" id="btn_remove"></button>
            </td>
                <input type="hidden" name="item[]" value="">
            </tr>
            </tbody>
        </table>
    </div>
    </div>
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12">
        <button class="form-control btn btn-info"> {!! trans('borrow.submit') !!}  </button>
    </form>
    </div>        
        </div>
</div>   
@endsection

@section('script')
<script type="text/javascript">
        var error_null = {!! json_encode(config('define.error_null')) !!};
        var error_exist = {!! json_encode(config('define.error_exist')) !!};
        var error_notexist = {!! json_encode(config('define.error_notexist')) !!};
        var pathjsongiveback = {!! json_encode(config('path.pathjsongiveback')) !!};
    </script>
@endsection