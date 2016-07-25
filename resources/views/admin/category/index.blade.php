@extends('admin.layouts.master')

@section('title', trans('category_manage_lang.title'))

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {{trans('category_manage_lang.manage_category')}}
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="{{route('home.admin')}}">{{trans('labels.dashboard')}}</a>
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
                        <h2 class="text-left">{{trans('category_manage_lang.category_list')}}</h2>
                         <div class="text-right">    
                    <a href="{{route('admin.category.create')}}" class="btn btn-lg btn-primary">{{trans('category_manage_lang.create_category')}}</a>
                        </div>
                        <br>                       
                        <div class="table-responsive">
                            <table class="display text-center" id="list_categories" data-toggle="dataTable" data-form="deleteForm">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{trans('category_manage_lang.no')}}</th>
                                        <th class="text-center">{{trans('category_manage_lang.name')}}</th>
                                        <th class="text-center">{{trans('category_manage_lang.created_by')}}</th>
                                        <th class="text-center">{{trans('category_manage_lang.edit')}}</th>
                                        <th class="text-center">{{trans('category_manage_lang.delete')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index=1; ?>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->adminUser->fullname}}</td>
                                        <td>
                                        
                                        <a href="{{ route('admin.category.edit', $category->id)}}" class="btn btn-primary">Edit</a></td>
                                            <td>
                                            {!! Form::open(['route' => ['admin.category.destroy', $category->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                            {!! Form::button(trans('labels.delete'), ['class' => 'btn btn-danger',
                                                'data-toggle' => 'modal','data-target' => '#confirmDelete',
                                                'data-title' => trans('category_manage_lang.title_model_confirm'),
                                                'data-message' => trans('category_manage_lang.question_confirm')]) !!}
                                            {!! Form::close() !!}
                                            </td>
                                            
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>                       
                </div>
@endsection
