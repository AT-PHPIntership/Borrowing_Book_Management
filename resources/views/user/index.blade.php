@extends('mainadmin')

@section('title', 'Manage User')

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage User
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Manage User
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
                                    <label for="user id" class="sr-only">Enter User ID:</label>
                                     <input type="text" class="form-control" name="search" placeholder="Enter User ID ...">    
                                </div>
                                <div class="col col-md-2">
                                    <button type="submit" class="btn btn-default">Search
                                    </button>
                                </div>  
                             </div>     
                        </form>
                    </div>

                    <div class="col col-md-12">
                        <h2>User Table</h2>
                    
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Full name</th>
                                        <th class="text-center">Birthday</th>
                                        <th class="text-center">Gender</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>/index.html</td>
                                        <td>1265</td>
                                        <td>32.3%</td>
                                        <td>$321.33</td>
                                        <td>$$$$</td>
                                        <td><a href="/Edituser" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/about.html</td>
                                        <td>261</td>
                                        <td>33.3%</td>
                                        <td>$234.12</td>
                                        <td>$$$$</td>
                                        <td><a href="/Edituser" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/sales.html</td>
                                        <td>665</td>
                                        <td>21.3%</td>
                                        <td>$16.34</td>
                                        <td>$$$$</td>
                                        <td><a href="/Edituser" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/blog.html</td>
                                        <td>9516</td>
                                        <td>89.3%</td>
                                        <td>$1644.43</td>
                                        <td>$$$$</td>
                                        <td><a href="/Edituser" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/404.html</td>
                                        <td>23</td>
                                        <td>34.3%</td>
                                        <td>$23.52</td>
                                        <td>$$$$</td>
                                        <td><a href="/Edituser" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/services.html</td>
                                        <td>421</td>
                                        <td>60.3%</td>
                                        <td>$724.32</td>
                                        <td>$$$$</td>
                                        <td><a href="/Edituser" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    <tr>
                                        <td>/blog/post.html</td>
                                        <td>1233</td>
                                        <td>93.2%</td>
                                        <td>$126.34</td>
                                        <td>$$$$</td>
                                        <td><a href="/Edituser" class="btn btn-primary">Edit</a> <button class="btn btn-danger">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>                       
                </div>
@endsection