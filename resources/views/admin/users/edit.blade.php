@extends('admin.layouts.master')

@section('title', trans('user.title_edit_user'))

@section('content')
<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {!!trans('user.manage_user')!!}
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>
                    <a href="{!! route('home.admin') !!}">{!!trans('user.dashboard' )!!} </a>
                </li>
                <li>
                    <i class="fa fa-table"></i>
                    <a href="{!! route('admin.user.index') !!}">{!!trans('user.manage_user')!!} </a>
                </li>
                <li class="active">
                    <i class="fa fa-pencil fa-fw"></i>
                    {!!trans('user.edit_user' )!!}  
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col col-lg-8 col-lg-offset-2"> 
            <h2 class="text-center">{!!trans('user.form_edit' )!!}</h2>
               {!! Form::model($users,['route' => ['admin.user.update',$users -> id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
            <div class ="form-group {!!$errors->has('fullname') ? ' has-error' : '' !!}"> 
            {!! Form::label('fullname', trans('user.full_name'), ['class' =>'control-label'])!!} <br>
            {!! Form::text('fullname', null, ['class' =>'form-control', 'pattern'=>trans('user.fullname_pattern'),  'title'=>trans('user.fullname_notice'),'required']) !!}<br>
            @if($errors->has('fullname'))
            <span class="help-block">{{ $errors->first('fullname') }}</span>
            @endif
            </div>
            <div class = "form-group {!!$errors->has('image') ? ' has-error' : '' !!}">
            {!! Form::label('image', trans('user.image'), ['class' =>'control-label'])!!} <br>
            {!! Form::file('image', ['class' => 'control', 'id' => 'image']) !!}<br>
            <img src="{{url(config('path.upload_user').$users->image)}}" class = "setpicture img-thumbnail" id ="image_no"></img><br>
            @if($errors->has('image'))
            <span class="help-block">{{ $errors->first('image') }}</span>
            @endif
            </div>
            <div class = "form-group">
            {!! Form::label('gender', trans('user.gender'), ['class' =>'control-label']) !!} <br>
             {!! Form::select('gender', ['male' => trans('user.male'), 'female' => trans('user.female'), 'unisex' => trans('user.unisex')], null, ['class' =>'form-control']) !!}<br>
            </div>
            <div class = "form-group {!!$errors->has('birthday') ? ' has-error' : '' !!}">
            {!! Form::label('birthday', trans('user.birthday'), ['class' =>'control-label']) !!} <br>
            {!! Form::date('birthday', null, ['class' =>'form-control','pattern'=>trans('user.birthday_pattern'),
                'title'=>trans('user.birthday_notice'),'required']) !!}<br>
            @if($errors->has('birthday'))
            <span class="help-block">{{ $errors->first('birthday') }}</span>
            @endif
            </div>
            <div class = "form-group {!!$errors->has('phone') ? ' has-error' : '' !!}">
            {!! Form::label('phone', trans('user.phone'), ['class' =>'control-label']) !!} <br>
            {!! Form::text('phone', null, ['class' =>'form-control',
                'pattern'=> trans('user.phone_pattern'),'title'=>trans('user.phone_notice'),'required']) !!}<br>
            @if($errors->has('phone'))
            <span class="help-block">{{ $errors->first('phone') }}</span>
            @endif
            </div>
            <div class = "form-group {!!$errors->has('address') ? ' has-error' : '' !!}">
            {!! Form::label('address', trans('user.address'), ['class' =>'control-label']) !!} <br>
            {!! Form::text('address', null, ['class' =>'form-control',
                'pattern'=>trans('user.address_pattern'),'title'=>trans('user.address_notice'),'required']) !!}<br>
            @if($errors->has('address'))
            <span class="help-block">{{ $errors->first('address') }}</span>
            @endif
            </div>
            <div class = "form-group {!!$errors->has('expiretime') ? ' has-error' : '' !!}">
            {!! Form::label('expiretime', trans('user.expiretime'), ['class' =>'control-label']) !!} <br>
            {!! Form::date('expiretime', null, ['class' =>'form-control',
                'title'=>trans('user.expiretime_notice'),'required']) !!} <br />
            @if($errors->has('expiretime'))
            <span class="help-block">{{ $errors->first('expiretime') }}</span>
            @endif
            </div>
            <div class = "form-group">
            {!! Form::label('admin', trans('user.admin').Auth::guard('admin')->user()->username, ['class' =>'control-label']) !!} <br>
            {!! Form::hidden('admin_user_id', Auth::guard('admin')->user()->id, null,['class' =>'form-control']) !!} <br />
            </div>
            {!! Form::submit(trans('user.update'), ['class' =>'btn btn-primary'])!!}
            {!! link_to(route('admin.user.index'), trans('user.cancle'), ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            <br>    
        </div>    
    </div>
@endsection
