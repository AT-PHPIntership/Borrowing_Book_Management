@extends('admin.layouts.master')

@section('title', trans('user.title'))

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {!! trans('user.create_user') !!}
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>
                <a href="{!! route('home.admin') !!}">{!! trans('labels.dashboard') !!}</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> {!! trans('user.create_user') !!}
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col col-lg-8 col-lg-offset-2">
        {{ Form::open(array('route' => 'admin.user.store', 'id' => 'user-form', 'enctype' => 'multipart/form-data')) }}
            <div class="form-group">
                {{ Form::label('username', trans('user.username')) }}
                {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => trans('user.username'), 'pattern'=>trans('user.username_pattern'),'title'=>trans('user.username_notice'),'required')) }}
                @if ($errors->has('username'))
                    <span class="errors">
                        {{ $errors->first('username') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('fullname', trans('user.full_name')) }}
                {{ Form::text('fullname', null, array('class' => 'form-control', 'placeholder' => trans('user.full_name'), 'pattern'=>trans('user.fullname_pattern'),  'title'=>trans('user.fullname_notice'),'required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('gender', trans('user.gender')) }}
                {{ Form::radio('gender', trans('user.male')) }} {{ trans('user.male') }}
                {{ Form::radio('gender', trans('user.female')) }} {{ trans('user.female') }}
            </div>
            <div class="form-group">
                {{ Form::label('birthday', trans('user.birthday')) }}
                {{ Form::date('birthday', null, array('class' => 'form-control','pattern'=>trans('user.birthday_pattern'),
                'title'=>trans('user.birthday_notice'),'required')) }}
                @if ($errors->has('birthday'))
                    <span class="errors">
                        {{ $errors->first('birthday') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('phone', trans('user.phone')) }}
                {{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => trans('user.phone'),
                'pattern'=> trans('user.phone_pattern'),'title'=>trans('user.phone_notice'),'required')) }}
                @if ($errors->has('phone'))
                    <span class="errors">
                        {{ $errors->first('phone') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('address', trans('user.address')) }}
                {{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => trans('user.address'),
                'pattern'=>trans('user.address_pattern'),'title'=>trans('user.address_notice'),'required')) }}
                @if ($errors->has('address'))
                    <span class="errors">
                        {{ $errors->first('address') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('expiretime', trans('user.expiretime')) }}
                {{ Form::date('expiretime', null, array('class' => 'form-control' ,'pattern'=>trans('user.expiretime_pattern'),
                'title'=>trans('user.expiretime_notice'),'required')) }}
                @if ($errors->has('expiretime'))
                    <span class="errors">
                        {{ $errors->first('expiretime') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('password', trans('user.password')) }}
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => trans('user.password'),
                'pattern'=>trans('user.password_pattern'),'title'=>trans('user.password_notice'),'required')) }}
                @if ($errors->has('password'))
                    <span class="errors">
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('image', trans('user.image')) }}
                {{ Form::file('image',['class' => 'control','id' => 'image', 'name' => 'image']) }}<br>
                <img src="#" class = "setpicture img-thumbnail img_upload" id ="image_no"></img><br>
                {{-- {!! Form::image('#', null, ['class' => 'setpicture img-thumbnail img_upload','id' => 'image_no']) !!}<br> --}}

            </div>
            {{ Form::submit(trans('user.submit'), array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
</div>
@endsection