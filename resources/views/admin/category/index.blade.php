@extends('admin.layouts.master')

@section('title', trans('category_manage_lang.title_page_category'))

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {{trans('category_manage_lang.category')}}
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="{{url('/')}}">{{trans('category_manage_lang.dashboard')}}</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> {{trans('category_manage_lang.category')}}
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col col-md-12">
                        <h1 class="text-center">{{trans('category_manage_lang.category_table')}}</h1>
                         <div class="text-right">    
                    <a href="{{url('category/create')}}" class="btn btn-lg btn-danger">{{trans('category_manage_lang.create_category')}}</a>
                        </div>
                        <br>                       
                        <div class="table-responsive">
                            <table class="display text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{trans('category_manage_lang.no')}}</th>
                                        <th class="text-center">{{trans('category_manage_lang.name')}}</th>
                                        <th class="text-center">{{trans('category_manage_lang.created_by')}}</th>
                                        <th class="text-center">{{trans('category_manage_lang.more')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $i++ }}</td>
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