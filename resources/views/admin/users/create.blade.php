@extends('admin.layouts.master')

@section('title', trans('user.create_user'))

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {!! trans('user.create_user') !!}
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>
                <a href="{!! route('home.admin') !!}">{!! trans('labels.dashboard') !!}</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> {!! trans('user.create_user') !!}
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col col-lg-6">
        <form>
            <div class="form-group">
                <label for="username">{!! trans('user.username') !!}</label>
                    <input type="text" class="form-control" name="username" placeholder="{!! trans('user.username') !!}">
            </div>
            <div class="form-group">
                <label for="fullname">{!! trans('user.full_name') !!}</label>
                    <input type="text" class="form-control" name="fullName" placeholder="{!! trans('user.full_name') !!}">
            </div>
            <div>
                <label for="gender">{!! trans('user.gender') !!} :
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="{!! trans('user.male') !!}"> {!! trans('user.male') !!}
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="{!! trans('user.female') !!}"> {!! trans('user.female') !!}
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="{!! trans('user.unisex') !!}"> {!! trans('user.unisex') !!} </br></br>
            </div>
            <div class="form-group">
                <label for="birthday">{!! trans('user.birthday') !!}</label>
                    <input type="date" class="form-control" name="birthday" placeholder="{!! trans('user.birthday') !!}">
            </div>
            <div class="form-group">
                <label for="phone">{!! trans('user.phone') !!}</label>
                    <input type="text" class="form-control" name="phone" placeholder="{!! trans('user.phone') !!}">
            </div>
            <div class="form-group">
                <label for="address">{!! trans('user.address') !!}</label>
                    <input type="text" class="form-control" name="address" placeholder="{!! trans('user.address') !!}">
            </div>
            
            <div class="form-group">
                <label for="password">{!! trans('user.password') !!}</label>
                    <input type="password" class="form-control" name="password" placeholder="{!! trans('user.password') !!}">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">{!! trans('user.image') !!}</label>
                <input type="file" id="exampleInputFile">                        
            </div>
            <button type="submit" class="btn btn-primary">{!! trans('user.submit') !!}</button>
        </form>
    </div>
</div>
@endsection