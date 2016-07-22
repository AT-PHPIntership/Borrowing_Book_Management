@extends('admin.layouts.master')

@section('title', trans('book_manage_lang.title_create_book'))

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {!!trans('book_manage_lang.manage_book' )!!}
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  
                                <a href="{{ route('home.admin') }}"> {!!trans('book_manage_lang.dashboard' )!!}</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>  
                                <a href="{!!route('admin.book.index')!!}"> {!!trans('book_manage_lang.manage_book' )!!}</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> {!!trans('book_manage_lang.create_book')!!}
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12">
                <h2 class="text-center">{!!trans('book_manage_lang.create_book' )!!}</h2>
                {!! Form::open(array('route' => 'admin.book.store','files' => true)) !!}
                <div class="form-group">
                    {!! Form::label('name',trans('book_manage_lang.name')) !!}
                    {!! Form::text('name',null, array('class' => 'form-control', 'id' => 'name')) !!}
                    @if ($errors->has('name'))
                    <span class="errors">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif

                </div>
                <div class="form-group">
                    {!! Form::label('category',trans('book_manage_lang.category')) !!}
                    {!! Form::select('category_id', $categories,null, array('class' => 'form-control', 'id' => 'category')) !!}
                    @if ($errors->has('category_id'))
                    <span class="errors">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('author',trans('book_manage_lang.author')) !!}
                    {!! Form::text('author',null, array('class' => 'form-control', 'id' => 'author')) !!}
                    @if ($errors->has('author'))
                    <span class="errors">
                        <strong>{{ $errors->first('author') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('publishyear',trans('book_manage_lang.publish_year')) !!}
                    {!! Form::text('publish_year',null, array('class' => 'form-control', 'id' => 'publishyear')) !!}
                    @if ($errors->has('publish_year'))
                    <span class="errors">
                        <strong>{{ $errors->first('publish_year') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('numberpage',trans('book_manage_lang.number_of_page')) !!}
                    {!! Form::text('number_of_page',null, array('class' => 'form-control', 'id' => 'numberpage')) !!}
                    @if ($errors->has('number_of_page'))
                    <span class="errors">
                        <strong>{{ $errors->first('number_of_page') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('quantity',trans('book_manage_lang.quantity')) !!}
                    {!! Form::text('quantity',null, array('class' => 'form-control', 'id' => 'quantity')) !!}
                    @if ($errors->has('quantity'))
                    <span class="errors">
                        <strong>{{ $errors->first('quantity') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('image',trans('book_manage_lang.choose_image')) !!}
                    {{ Form::file('image',null, array('class' => 'form-control', 'id' => 'image','onchange' => 'handleFileSelect')) }}
                    {!! Form::image(config('path.images').'noimage.png',null,['class' => 'setpicture img-thumbnail','id' => 'image_no']) !!}
                    @if ($errors->has('image'))
                    <span class="errors">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                    <output id="list"></output>
                </div>
                     {!! Form::submit(trans('book_manage_lang.submit'), ['class' =>'btn btn-primary'])!!}
                {!! Form::close() !!}
            </div>
            
               
                <!-- /.row -->
@endsection
