@extends('frontend.layouts.master')

@section('title', trans('front_end.title_book'))

@section('navbar')
 <!-- Navigation -->
    @include('frontend.layouts.partials._navbar')
@endsection

@section('content')
    <div class="col col-md-12 ">
            <hr>
            <div class="col col-md-4">
                <img id="bookdetail" class="thumbnail" src="{{ url(config('path.upload_book').$book->image) }}" alt="{{ $book->name }}">
            </div>
            <div class="col col-md-8" id="infor">
                        <h2>{{$book->name}}</h2><br>
                        <p><label>{{trans('front_end.author')}}</label> {{$book->author}}</p>
                        <p><label>{{trans('front_end.category')}}</label> {{$book->category->name}}</p>
                        <p><label>{{trans('front_end.publish_year')}}</label> {{ $book->publish_year }}</p>
                        <p><label>{{trans('front_end.number_of_page')}}</label> {{$book->number_of_page}}</p>
                        <p><label>{{trans('front_end.descripbe')}}</label></p>
                  
            </div>
    </div>
@endsection