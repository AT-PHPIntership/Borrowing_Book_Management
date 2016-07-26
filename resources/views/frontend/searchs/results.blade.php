@extends('frontend.layouts.master')

@section('title', 'Search Results')

@section('navbar')
 <!-- Navigation -->
    @include('frontend.layouts.partials._navbar')
@endsection

@section('content')
  @foreach($book as $item)
  <div class="col-sm-3 col-lg-3 col-md-3">
        <div class="thumbnail">
            <img src="{{ url('/images/upload/books/')}}/{!! $item->image !!}" alt="No image for {{ $item->name}}" >
            <div class="caption">
                <h4 class="pull-right">{{ $item->quantity }}</h4>
                <h4><a href="#">{{ $item->name }}</a>
                </h4>
                <p>{{trans('search.author')}} {{ $item->author }}.</p>
                <p>{{trans('search.publish_year')}} {{ $item->publish_year }}.</p>
                <p>{{trans('search.number_of_page')}} {{ $item->number_of_page }}.</p>
            </div>
            <div class="ratings">
                <p class="pull-right">{{trans('search.review')}}</p>
                <p>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                </p>
            </div>
        </div>
    </div>
    @endforeach
@endsection