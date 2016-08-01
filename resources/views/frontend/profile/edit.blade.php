@extends('frontend.layouts.master')

@section('title', trans('user.edit_profile'))

@section('navbar')
 <!-- Navigation -->
    @include('frontend.layouts.partials._navbar')
@endsection

@section('content')
    <div class="row">
        <div class="col col-lg-8 col-lg-offset-2"> 
            <h2 class="text-center profile">{!! trans('user.edit_profile') !!}</h2>
            <div class="col col-lg-12 profile-content">
                <div class="col col-lg-10">
                    {!! Form::model($users,['route' => ['profile.update',$users -> id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
                    <div class ="col col-lg-12 form-group {!!$errors->has('fullname') ? ' has-error' : '' !!}"> 
                        <div class="col col-lg-3">
                            {!! Form::label('fullname', trans('user.full_name'), ['class' =>'control-label']) !!}
                        </div>
                        <div class="col col-lg-9">
                            {!! Form::text('fullname', null, ['class' =>'form-control']) !!}
                            @if($errors->has('fullname'))
                            <span class="help-block">{{ $errors->first('fullname') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class = "col col-lg-12 form-group {!!$errors->has('image') ? ' has-error' : '' !!}">
                        <div class="col col-lg-12">
                            {!! Form::label('image', trans('user.image'), ['class' =>'control-label']) !!}
                        </div>
                        <div class="col col-lg-3">
                            @if($users->image == null) 
                                {!! Form::image(config('path.img_default').'profile_default.png', null,['class' => 'avatar','id' => 'image_no']) !!}
                            @else
                                {!! Form::image(config('path.upload_user').$users->image, null,['class' => 'avatar','id' => 'image_no']) !!}
                            @endif
                            @if($errors->has('image'))
                            <span class="help-block">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <div class="col col-lg-12 col col-lg-9">
                            {!! Form::file('image', ['class' => 'control', 'id' => 'image']) !!}
                        </div>
                    </div>
                    <div class = "col col-lg-12 form-group">
                        <div class="col col-lg-3">
                            {!! Form::label('gender', trans('user.gender'), ['class' =>'control-label']) !!}
                        </div>
                        <div class="col col-lg-9">
                            {!! Form::select('gender', ['male' => trans('user.male'), 'female' => trans('user.female'), 'unisex' => trans('user.unisex')], null, ['class' =>'form-control']) !!}
                        </div>
                    </div>
                    <div class = "col col-lg-12 form-group {!!$errors->has('birthday') ? ' has-error' : '' !!}">
                        <div class="col col-lg-3">
                            {!! Form::label('birthday', trans('user.birthday'), ['class' =>'control-label']) !!}
                        </div>
                        <div class="col col-lg-9">
                            {!! Form::date('birthday', null, ['class' =>'form-control']) !!}
                            @if($errors->has('birthday'))
                            <span class="help-block">{{ $errors->first('birthday') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class = "col col-lg-12 form-group {!!$errors->has('phone') ? ' has-error' : '' !!}">
                        <div class="col col-lg-3">
                            {!! Form::label('phone', trans('user.phone'), ['class' =>'control-label']) !!}
                        </div>
                        <div class="col col-lg-9">
                            {!! Form::text('phone', null, ['class' =>'form-control']) !!}
                            @if($errors->has('phone'))
                            <span class="help-block">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class = "col col-lg-12 form-group {!!$errors->has('address') ? ' has-error' : '' !!}">
                        <div class="col col-lg-3">
                            {!! Form::label('address', trans('user.address'), ['class' =>'control-label']) !!}
                        </div>
                        <div class="col col-lg-9">
                            {!! Form::text('address', null, ['class' =>'form-control']) !!}
                            @if($errors->has('address'))
                            <span class="help-block">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col col-lg-12 form-group">
                    {!! Form::submit(trans('user.update'), ['class' =>'btn btn-primary']) !!}
                    {!! link_to(route('/'), trans('user.cancle'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection
