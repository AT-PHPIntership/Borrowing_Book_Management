@extends('mainadmin')

@section('title', 'Show Book')

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Book Item
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="manageBook.html">Manage Book</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Book Item
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Book ID</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>/index.html</td>
                                        <td>1265</td>
                                        <td><button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/about.html</td>
                                        <td>261</td>
                                        <td><button class="btn btn-danger">Delete</button></td>                                   
                                    </tr>
                                    <tr>
                                        <td>/sales.html</td>
                                        <td>665</td>
                                        <td><button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/blog.html</td>
                                        <td>9516</td>
                                        <td><button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/404.html</td>
                                        <td>23</td>
                                        <td><button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/services.html</td>
                                        <td>421</td>
                                        <td><button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/blog/post.html</td>
                                        <td>1233</td>
                                        <td><button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                <!-- /.row -->
@endsection