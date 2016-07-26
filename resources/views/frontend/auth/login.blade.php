@extends('frontend.layouts.master')

@section('title', trans('labels.login_user'))

@section('navbar')
 <!-- Navigation -->
    @include('frontend.layouts.partials._navbar')
@endsection

@section('content')
<div class="row">
    <!-- log in -->
    <div class="col-md-4 col-md-offset-4">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><span>{!! trans('labels.login_title') !!}</span></h4>
            </div>
            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" id="user-name" title="{!! trans('user.username') !!}" name="username" value="{{ old('username') }}" placeholder="{!! trans('user.username') !!}">
                         @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" id="password" title="{!! trans('user.password') !!}" name="password" placeholder="{!! trans('user.password') !!}">
                         @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" title="{!! trans('labels.login_user') !!}">{!! trans('labels.login_user') !!}</button>
                    <button type="reset" class="btn btn-info" title="{!! trans('labels.reset') !!}">{!! trans('labels.reset') !!}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection