@extends('frontend.layouts.master')

@section('navbar')
 <!-- Navigation -->
    @include('frontend.layouts.partials._navbar')
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <p class="lead">{{trans('front_end.list_category')}}</p>
        <div class="list-group" >
        @foreach($categories as $category)
            <a href="{{route('list.category',$category->category_id)}}" class="list-group-item">{{$category->category->name}}</a>
        @endforeach
        </div>
    </div>
    <div class="col-md-9">
        <div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <?php $index=0; ?>
                        @foreach($images as $image)
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $index++ }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                    @foreach($imagedefault as $image)
                    <div class="item active">
                            <img id="side-slide" class="slide-image" src="{{ url(config('path.upload_book').$image->image) }}" alt="">
                    </div>
                    @endforeach
                    @foreach($images as $image)
                        <div class="item">
                            <img id="side-slide" class="slide-image" src="{{ url(config('path.upload_book').$image->image) }}" alt="">
                        </div>
                     @endforeach  
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
         <div>
            @foreach($books as $book)
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img id="img-book" src="{{ url(config('path.upload_book').$book->image) }}" alt="{{ $book->name }}">
                    <div class="caption">
                        <h4 class="pull-right">{{ $book->quantity }}</h4>
                        <h4><a href="{{route('show.book', $book->id)}}">{{$book->name}}</a></h4>
                        <p><label>{{trans('front_end.author')}}</label> {{$book->author}}</p>
                        <p><label>{{trans('front_end.category')}}</label> {{$book->category->name}}</p>
                        <p><label>{{trans('front_end.publish_year')}}</label> {{ date(config('path.formatdate_index'), strtotime($book->publish_year)) }}</p>
                        <p><label>{{trans('front_end.number_of_page')}}</label> {{$book->number_of_page}}</p>
                    </div>     
                </div>
            </div>
            @endforeach
        </div>                     
        </div>
        <div class="text-center">{!! $books->render() !!}</div> 
    </div>
</div>
@endsection