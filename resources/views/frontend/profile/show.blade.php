@extends('frontend.layouts.master')

@section('title', trans('front_end.profile'))

@section('navbar')
 <!-- Navigation -->
    @include('frontend.layouts.partials._navbar')
@endsection

@section('content')
	<div class="col-md-12 profile">
            <div class="col-md-4 img-thumbnail" >
                <img id="avatar" class="img-rectangcle img-responsive pull-left" src="{{ url(config('path.upload_user').$user->image )}}" alt="{{ trans('front_end.noimage') }}"></img>
            </div>            
            <div class="col-lg-offset-2 col-md-6" style="line-height:2.0">
                    <h2 class="featurette-heading">{{ $user->username }}</h2>
                    <label>{{ trans('front_end.fullname') }} {{ $user->fullname }}</label>
                    <br>
                    <label>{{ trans('front_end.gender') }} {{ $user->gender }}</label>
                    <br>
                    <label>{{ trans('front_end.birthday') }} {{ $user->birthday }}</label>
                    <br>
                    <label>{{ trans('front_end.phone_number') }} {{ $user->phone }}</label>
                    <br>
                    <label>{{ trans('front_end.address') }} {{ $user->address }}</label>
                    <br>
                    <label>{{ trans('front_end.expiretime') }} {{ $user->expiretime }}</label><br>  
                    <div class="text-right">
                    	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">{{ trans('front_end.edit') }}</button>
                    </div>  
			</div>
	</div>
@endsection