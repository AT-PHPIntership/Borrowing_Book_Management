@extends('admin.layouts.master')

@section('title', 'Category')

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {{trans('labels.Category')}}
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="{{url('/')}}">{{trans('labels.Dashboard')}}</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> {{trans('labels.Category')}}
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col col-md-12">
                        <h1 class="text-center">{{trans('labels.CategoryTable')}}</h1>
                         <div class="text-right">    
                    <a href="{{url('category/create')}}" class="btn btn-lg btn-danger">{{trans('labels.CreateCategory')}}</a>
                        </div>
                        <br>                       
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{trans('labels.Name')}}</th>
                                        <th class="text-center">{{trans('labels.CreatedBy')}}</th>
                                        <th class="text-center">{{trans('labels.More')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->adminUser->fullname}}</td>
                                        <td><a href="{{url('category/'.$category->id.'/edit')}}"><i class="fa fa-pencil fa-2x"></i></a>
                                            <a href=""><i class="fa fa-times-circle fa-2x"></i></a>                                   
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>                       
                </div>
@endsection