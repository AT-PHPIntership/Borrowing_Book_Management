@extends('admin.layouts.master')

@section('title', trans('category_manage_lang.title_edit_category'))

@section('content')
<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {{trans('category_manage_lang.category')}}
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{route('home.admin')}}"> {{trans('labels.dashboard')}}</a>
                </li>
                <li>
                    <i class="fa fa-table"></i>  <a href="{{route('admin.category.index')}}"> {{trans('category_manage_lang.category')}}</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> {{trans('category_manage_lang.edit_category')}}
                </li>
            </ol>
        </div>
    </div>
                <!-- /.row -->
    <div class="row" id="formcreatecategory">
        <div class="col-lg-offset-2 col-lg-8 thumbnail">
        <h2 class="text-center">{!!trans('category_manage_lang.edit_category' )!!}</h2>
            {!! Form::model($category, ['route' => ['admin.category.update', $category->id], 'method' => 'PUT']) !!}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {{ Form::label('name', trans('category_manage_lang.name'))}}
            {{ Form::text('name', null, ['class' => 'form-control input-lg'])}}
            @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
            {{ Form::submit(trans('category_manage_lang.edit_category'), ['class' => 'btn btn-success btn-block btn-lg '])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection