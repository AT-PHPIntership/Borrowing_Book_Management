@extends('mainadmin')

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
                    <a href="/Createcategory" class="btn btn-lg btn-primary">Create Category</a>
                        </div>
                        <br>                       
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>abc</td>
                                        <td><a href="/Editcategory" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>aaaaaa</td>
                                        <td><a href="/Editcategory" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/sales.html</td>
                                        <td><a href="/Editcategory" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/blog.html</td>
                                        <td><a href="/Editcategory" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/404.html</td>
                                        <td><a href="/Editcategory" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/services.html</td>
                                        <td><a href="/Editcategory" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/blog/post.html</td>
                                        <td><a href="/Editcategory" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        
                    </div>
@endsection