@extends('admin.layouts.master')

@section('title', 'Category')

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Category
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Category
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col col-md-8 col-md-offset-2">
                        <form>
                             <div class="form-group">
                                <div class="col col-md-10">
                                    <label for="user id" class="sr-only">Enter Category:</label>
                                     <input type="text" class="form-control" name="search" placeholder="Enter Category ...">    
                                </div>
                                <div class="col col-md-2">
                                    <button type="submit" class="btn btn-default">Search
                                    </button>
                                </div>  
                             </div>     
                        </form>
                    </div>

                    <div class="col col-md-12">

                        <h2 class="text-left">Category Table</h2>
                         <div class="text-right">    
                    <a href="{{url('category/create')}}" class="btn btn-lg btn-danger">Create Category</a>
                        </div>
                        <br>                       
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Created By</th>
                                        <th class="text-center">More</th>
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
                            <div class="pagination pull-right">
                                    {{ $categories->render() }}
                            </div>
                        </div>
                    </div>
                        
                    </div>
@endsection