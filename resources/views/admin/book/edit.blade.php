@extends('admin.layouts.master')

@section('title', trans('book_manage_lang.title'))

@section('content')
<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {!!trans('book_manage_lang.manage_book')!!}
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>
                    <a href="index.html">{!!trans('book_manage_lang.dashboard' )!!} </a>
                </li>
                <li>
                    <i class="fa fa-pencil fa-fw"></i>
                    <a href="#">{!!trans('book_manage_lang.book_list' )!!} </a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i>{!!trans('book_manage_lang.edit_book' )!!}  
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col col-md-12">
            <h2 class="text-left">{!!trans('book_manage_lang.edit_book' )!!}</h2>
            
            <br>
        </div>    
    </div>
@endsection