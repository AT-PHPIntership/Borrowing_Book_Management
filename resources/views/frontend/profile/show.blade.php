@extends('frontend.layouts.master')

@section('title', trans('labels.profile'))

@section('navbar')
 <!-- Navigation -->
    @include('frontend.layouts.partials._navbar')
@endsection

@section('content')
	@foreach($user as $item)
	<div class="col-lg-12">
		<div class="col-lg-4 img-circle">
			<img src="{{config('path.upload_book').$item->image}}" alt="">
		</div>
		<div class="col-lg-8"></div>
	</div>

@endsection