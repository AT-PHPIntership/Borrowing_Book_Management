@extends('frontend.layouts.master')

@section('title', trans('search.title'))

@section('navbar')
 <!-- Navigation -->
    @include('frontend.layouts.partials._navbar')
@endsection

@section('content')
    @if($book->count())
    @foreach($book as $item)
            <div class="col-sm-3 col-lg-3 col-md-3">
                <div class="thumbnail">
                    <img id="img-book" src="{{ url(config('path.upload_book').$item->image) }}" alt="{{ $item->name }}">
                    <div class="caption">
                        <h4 class="pull-right">{{ $item->quantity }}</h4>
                        <h4><a href="{{route('show.book', $item->id)}}">{{$item->name}}</a></h4>
                        <p><label>{{trans('front_end.author')}}</label> {{$item->author}}</p>
                        <p><label>{{trans('front_end.category')}}</label> {{$item->category->name}}</p>
                        <p><label>{{trans('front_end.publish_year')}}</label> {{ date(config('path.formatdate_index'), strtotime($item->publish_year)) }}</p>
                        <p><label>{{trans('front_end.number_of_page')}}</label> {{$item->number_of_page}}</p>
                    </div>     
                </div>
            </div>
    @endforeach
    @else
        <div class="col-lg-12" align="center" >
            <div id="messageerror">{{trans('front_end.search_no_result')}} <strong>{{$_GET[config('define.value_search')]}}</strong></div>
        </div>
    @endif
@endsection