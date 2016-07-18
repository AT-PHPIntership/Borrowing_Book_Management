@extends('admin.layouts.master')

@section('title', trans('book_manage_lang.create_book'))

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {!!trans('book_manage_lang.create_book')!!}
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  
                                <a href="#">{!!trans('book_manage_lang.dashboard' )!!}</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  
                                <a href="#">{!!trans('book_manage_lang.manage_book')!!}</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> {!!trans('book_manage_lang.create_book')!!}
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            
                {!! Form::open(array('route' => 'admin.book.store','files' => true)) !!}
                <div class="form-group">
                    {!! Form::label('name',trans('book_manage_lang.name')) !!}
                    {!! Form::text('name',null, array('class' => 'form-control', 'id' => 'name')) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('category',trans('book_manage_lang.category')) !!}
                    {!! Form::select('category_id', $categories,null, array('class' => 'form-control', 'id' => 'category')) !!}
                    
                </div>
                <div class="form-group">
                    {!! Form::label('author',trans('book_manage_lang.author')) !!}
                    {!! Form::text('author',null, array('class' => 'form-control', 'id' => 'author')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('publishyear',trans('book_manage_lang.publish_year')) !!}
                    {!! Form::text('publish_year',null, array('class' => 'form-control', 'id' => 'publishyear')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('numberpage',trans('book_manage_lang.number_of_page')) !!}
                    {!! Form::text('number_of_page',null, array('class' => 'form-control', 'id' => 'numberpage')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('quantity',trans('book_manage_lang.quantity')) !!}
                    {!! Form::text('quantity',null, array('class' => 'form-control', 'id' => 'quantity')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image',trans('book_manage_lang.choose_image')) !!}
                    {{ Form::file('image',null, array('class' => 'form-control', 'id' => 'image')) }}
                </div>
                     {!! Form::submit(trans('book_manage_lang.submit'), ['class' =>'btn btn-primary'])!!}
                {!! Form::close() !!}
            
                
                <!-- /.row -->
@endsection