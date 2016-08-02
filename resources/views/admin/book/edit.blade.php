@extends('admin.layouts.master')

@section('title', trans('book_manage_lang.title_edit_book'))

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
                    <a href="{{ route('home.admin') }}"> {!!trans('book_manage_lang.dashboard' )!!} </a>
                </li>
                <li>
                    <i class="fa fa-table"></i>
                    <a href="{{ route('admin.book.index') }}"> {!!trans('book_manage_lang.manage_book' )!!} </a>
                </li>
                <li class="active">
                    <i class="fa fa-pencil fa-fw"></i> {!!trans('book_manage_lang.edit_book' )!!}  
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-offset-2 col-lg-8">
        <h2 class="text-center">{!!trans('book_manage_lang.edit_book' )!!}</h2>
                {!! Form::model($list,[ 'route' => ['admin.book.update',$list ->id],'method'=>'PUT', 'enctype' => 'multipart/form-data']) !!}
                
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name',trans('book_manage_lang.name'),['class' =>'control-label']) !!}
                        {!! Form::text('name',null,['class' =>'form-control']) !!}<br>
                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {!! Form::label('category_id',trans('book_manage_lang.category'),['class' =>'control-label']) !!}
                        {!! Form::select('category_id', $categories,null, ['class' => 'form-control', 'id' => 'category']) !!}
                        @if($errors->has('category_id'))
                            <span class="help-block">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('admin_user_id') ? ' has-error' : '' }}">
                        {!! Form::label('admin_user_id',trans('book_manage_lang.admin_user_id'),['class' =>'control-label']) !!}
                        {!! Form::text('admin_user_id',Auth::guard('admin')->user()->username,['class' =>'form-control', 'disabled'=>'true'] )!!}
                        @if($errors->has('admin_user_id'))
                            <span class="help-block">{{ $errors->first('admin_user_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                        {!! Form::label('author',trans('book_manage_lang.author'),['class' =>'control-label']) !!}
                        {!! Form::text('author',null,['class' =>'form-control']) !!}<br>
                        @if($errors->has('author'))
                            <span class="help-block">{{ $errors->first('author') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        {!! Form::label('image',trans('book_manage_lang.image'),['class' =>'control-label']) !!}
                        {!! Form::file('image',['class' => 'control','id' => 'image']) !!}
                        <img src="{{url(config('path.upload_book').$list->image)}}" class = "setpicture img-thumbnail" id ="image_no"></img><br>
                        @if($errors->has('image'))
                            <span class="help-block">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('publish_year') ? ' has-error' : '' }}">
                        {!! Form::label('publish_year',trans('book_manage_lang.publish_year'),['class' =>'control-label']) !!}
                        {!! Form::date('publish_year',null,['class' =>'form-control']) !!}<br>
                        @if($errors->has('publish_year'))
                            <span class="help-block">{{ $errors->first('publish_year') }}</span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('number_of_page') ? ' has-error' : '' }}">
                        {!! Form::label('number_of_page',trans('book_manage_lang.number_of_page'),['class' =>'control-label']) !!}
                        {!! Form::number('number_of_page',null,['class' =>'form-control']) !!}<br>
                        @if($errors->has('number_of_page'))
                            <span class="help-block">{{ $errors->first('number_of_page') }}</span>
                        @endif
                    </div>

                    {!! Form::submit(trans('book_manage_lang.update'), ['class' => 'btn btn-sm btn-primary'])!!}
                    {!! link_to(route('admin.user.index'), trans('book_manage_lang.cancle'), ['class' => 'btn btn-sm btn-danger']) !!}
                {!! Form::close() !!}
            <br>
        </div>    
    </div>
@endsection