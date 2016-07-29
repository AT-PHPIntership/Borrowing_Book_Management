@extends('frontend.layouts.master')

@section('title', 'Contact')

@section('navbar')
 <!-- Navigation -->
    @include('frontend.layouts.partials._navbar')
@endsection

@section('content')
<div class="row contact">
    <div id="map">
    </div>

    <div class="container">
        <div class="row sub_content">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="dividerHeading">
                    <h4><span>{{trans('front_end.title_contact')}}</span></h4>
                </div>
                <p>{{trans('front_end.note_send_contact')}}</p>
                {!! Form::open(['id' => 'contactForm', 'route' => 'contact.send', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="form-group">
                            <div class="col-lg-6 {{ $errors->has('yourname') ? ' has-error' : '' }}">
                            {{ Form::text('yourname', null, ['class' => 'form-control', 'placeholder' => trans('front_end.your_name')]) }}
                            @if ($errors->has('yourname'))
                            <span class="help-block">
                                <p>{{ $errors->first('yourname') }}</p>
                            </span>
                            @endif
                            </div>
                            <div class="col-lg-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('front_end.email')]) }}
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <p>{{ $errors->first('email') }}</p>
                            </span>
                            @endif         
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6{{ $errors->has('company') ? ' has-error' : '' }}">
                            {{ Form::text('company', null, ['class' => 'form-control', 'placeholder' => trans('front_end.company')]) }}
                            @if ($errors->has('company'))
                            <span class="help-block">
                                <p>{{ $errors->first('company') }}</p>
                            </span>
                            @endif
                            </div>
                            <div class="col-md-6{{ $errors->has('subject') ? ' has-error' : '' }}">
                            {{ Form::text('subject', null, ['class' => 'form-control', 'placeholder' => trans('front_end.subject')]) }}
                            @if ($errors->has('subject'))
                            <span class="help-block">
                                <p>{{ $errors->first('subject') }}</p>
                            </span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12{{ $errors->has('message') ? ' has-error' : '' }}">
                            {{ Form::textarea('message', null, ['class' => 'form-control', 'rows' => '10', 'cols' => '50', 'placeholder' => trans('front_end.message')]) }}
                            @if ($errors->has('message'))
                            <span class="help-block">
                                <p>{{ $errors->first('message') }}</p>
                            </span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                        {{ Form::submit(trans('front_end.send_message'), ['class' => 'btn btn-primary btn-md']) }}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="sidebar">
                    <div class="widget_info">
                        <div class="dividerHeading">
                            <h4>
                                <span>{{trans('front_end.title_info_contact')}}</span>
                            </h4>
                        </div>
                        <p>{{trans('front_end.note_contact')}}</p>
                        <ul class="widget_info_contact">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <strong>{{trans('front_end.address')}}</strong> 
                                <p>{{trans('front_end.address_infor')}}</p>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <strong>{{trans('front_end.email')}}</strong>
                                <p> <a href="#">{{trans('front_end.email_infor1')}}</a></p> 
                                <p> <a href="#">{{trans('front_end.email_infor2')}}</a></p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <strong>{{trans('front_end.phone')}}</strong>
                                <p>{{trans('front_end.phone_infor1')}}</p>
                                <p>{{trans('front_end.phone_infor2')}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDgMU9_YjJfBFbadL6LrM7YktkzLJyB81E"></script>
    <script type="text/javascript">
        var number_zoom = {!! json_encode(config('map.number_zoom')) !!};
        var latitude = {!! json_encode(config('map.latitude')) !!};
        var longitude = {!! json_encode(config('map.longitude')) !!};
    </script>
    <script src="{{ url('frontend/js/map.js') }}"></script>
@endsection
