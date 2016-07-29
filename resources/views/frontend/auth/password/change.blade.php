@extends('frontend.layouts.master')

@section('title', trans('user.change_password'))

@section('navbar')
 <!-- Navigation -->
    @include('frontend.layouts.partials._navbar')
@endsection

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>{!! trans('user.change_password') !!}</h3></div>

            <div class="panel-body">
                
                {!! Form::open(['route' => ['changePassword', Auth::user()->id], 'method' => "PATCH"]) !!}
                <div class="form-group {{ $errors->has('current_password') ? ' has-error' : '' }}">
                {!! Form::label('current_password', trans('user.current_password')) !!}
                {!! Form::password('current_password', ['class' => 'form-control']) !!}
                @if($errors->has('current_password'))
                <span class="help-block">{{ $errors->first('current_password') }}</span>
                @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::label('password', trans('user.new_password')) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                @if($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
                </div>
                <div class="form-group {{ $errors->has('password_confirm') ? ' has-error' : '' }}">
                {!! Form::label('password_confirm', trans('user.confirm_new_password')) !!}
                {!! Form::password('password_confirm', ['class' => 'form-control']) !!}
                @if($errors->has('password_confirm'))
                <span class="help-block">{{ $errors->first('password_confirm') }}</span>
                @endif
                </div>
                <div class="form-group">
                {!! Form::submit(trans('user.change_password'), ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
