@extends('admin.layouts.master')

@section('title', trans('user.title_profile'))

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {!! trans('user.profile') !!}
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>
                <a href="{!! route('home.admin') !!}">{!! trans('labels.dashboard') !!}</a>
            </li>
             <li class="active">
                <i class="fa fa-table"></i> 
                <a href="{!! route('admin.user.index') !!}">{!! trans('user.manage_user') !!}</a>
            </li>
            <li class="active">
                <i class="fa fa-user"></i> {!! trans('user.profile') !!}
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="well well-sm">
            <div class="row">
                <div class="col-sm-6 col-md-5">
                    @if($user->image == null)
                    <img src="{!! asset(config('path.img_default').'profile_default.png') !!}" alt="" class="img-rounded img-responsive" />
                    @else
                    <img src="{!! asset(config('path.upload_user').$user->image) !!}" alt="" class="img-rounded img-responsive" />
                    @endif
                </div>
                <div class="col-sm-6 col-md-7">
                    <h3>{{ $user->fullname }}</h3>
                    <cite title="!! $user->address !!}">{{ $user->address }}<i class="glyphicon glyphicon-map-marker">
                    </i></cite>
                    <ul class="profile">
                        <li>
                            <strong>{!! trans('user.username') !!}:</strong> {{ $user->username }}
                        </li>
                        <li>
                            <strong>{!! trans('user.gender') !!}:</strong> {{ $user->gender }}
                        </li>
                        <li>
                            <strong>{!! trans('user.birthday') !!}:</strong> {!! date(config('path.formatdate'), strtotime($user->bithday)) !!}
                        </li>
                        <li>
                            <strong>{!! trans('user.phone') !!}:</strong> {{ $user->phone }}
                        </li>
                        <li>
                            <strong>{!! trans('user.expiretime') !!}:</strong> {!! date(config('path.formatdate'), strtotime($user->expiretime)) !!}
                        </li>
                        <li>
                            <strong>{!! trans('user.create_at') !!}:</strong> {{ $user->created_at }}
                        </li>
                    </ul>
                    <!-- Split button -->
                    <div class="btn-group">
                        <a href="{{ route('admin.user.edit',$user ->id)}}"><button class="btn btn-info">{!! trans('user.edit_user') !!}</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection