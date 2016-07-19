@extends('admin.layouts.master')

@section('title', trans('category_manage_lang.edit_category'))

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {{trans('category_manage_lang.edit_category')}}
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">{{trans('labels.dashboard')}}</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>{{trans('category_manage_lang.edit_category')}}
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            {!! Form::model($category, ['route' => ['admin.category.update', $category->id], 'method' => 'PUT']) !!}
            {{ Form::label('name', 'Title:')}}
            {{ Form::text('name', null, ['class' => 'form-control input-lg'])}}
            {{ Form::submit(trans('category_manage_lang.edit_category'), ['class' => 'btn btn-success btn-block'])}}
            {!! Form::close() !!}

@endsection