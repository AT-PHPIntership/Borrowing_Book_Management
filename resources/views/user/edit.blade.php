@extends('mainadmin')

@section('title', 'Edit User')

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit User
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="manageBook.html">Manage Book</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Create Account
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            <form>
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" name="fullname" placeholder="fullname">
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                        <input type="text" class="form-control" name="birthday" placeholder="birthday">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                        <input type="text" class="form-control" name="gender" placeholder="gender">
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                        <input type="text" class="form-control" name="phone" placeholder="phone">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="address">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Change Image</label>
                        <input type="file" id="exampleInputFile">
                </div>
                    <button type="submit" class="btn btn-default">Submit</button>
            </form>               
@endsection