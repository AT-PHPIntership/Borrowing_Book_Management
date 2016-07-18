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
                    <i class="fa fa-table"></i> {!!trans('book_manage_lang.edit_book' )!!}  
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <h2 class="text-center">{!!trans('book_manage_lang.edit_book' )!!}</h2>
                {!! Form::model($list,[ 'route' => ['admin.book.update',$list ->id],'method'=>'PUT']) !!}
                
                    <div class="form-group">
                        {!! Form::label('name',trans('book_manage_lang.name'),['class' =>'control-label']) !!}
                        {!! Form::text('name',null,['class' =>'form-control']) !!}<br>
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id',trans('book_manage_lang.category'),['class' =>'control-label']) !!}
                        {!! Form::select('category_id', $categories,null, ['class' => 'form-control', 'id' => 'category']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('admin_user_id',trans('book_manage_lang.admin_user_id'),['class' =>'control-label']) !!}
                        {!! Form::text('admin_user_id',Auth::guard('admin')->user()->username,['class' =>'form-control', 'disabled'=>'true'] )!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('author',trans('book_manage_lang.author'),['class' =>'control-label']) !!}
                        {!! Form::text('author',null,['class' =>'form-control']) !!}<br>
                    </div>

                    {{-- <div class="form-group">
                        {!! Form::label('image',trans('book_manage_lang.image'),['class' =>'control-label']) !!}
                        {!! Form::image(asset(/backend/images/uploads/books/.$list->image)) !!}<br>
                    </div> --}}

                    <div class="form-group">
                        {!! Form::label('publish_year',trans('book_manage_lang.publish_year'),['class' =>'control-label']) !!}
                        {!! Form::text('publish_year',null,['class' =>'form-control']) !!}<br>
                    </div>

                    <div class="form-group">
                        {!! Form::label('number_of_page',trans('book_manage_lang.number_of_page'),['class' =>'control-label']) !!}
                        {!! Form::text('number_of_page',null,['class' =>'form-control']) !!}<br>
                    </div>

                    {!! Form::submit('Update', ['class' => 'btn-btn btn-sm btn-primary'])!!}
                    {!! Form::submit('Cancel', ['class' => 'btn-btn btn-sm btn-danger'])!!}

                {!! Form::close() !!}
            <br>
        </div>    
    </div>
@endsection