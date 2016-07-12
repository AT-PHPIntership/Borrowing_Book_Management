@extends('mainadmin')

@section('title', 'Edit Book')

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Book
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="manageBook.html">Manage Book</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Edit Book
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            <form>
                <div class="form-group">
                    <label for="fullname">Name</label>
                        <input type="text" class="form-control" name="fullName">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                        <input type="text" class="form-control" name="category">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                        <input type="text" class="form-control" name="author">
                </div>
                <div class="form-group">
                    <label for="address">Public Year</label>
                        <input type="text" class="form-control" name="address">
                </div>
                <div class="form-group">
                    <label for="username">Number of Page</label>
                        <input type="text" class="form-control" name="username" placeholder="User name">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Choose Image</label>
                        <input type="file" id="exampleInputFile">
                            <p class="help-block">Example block-level help text here.</p>
                </div>
                    <button type="submit" class="btn btn-default">Submit</button>
            </form>
                
                <!-- /.row -->
@endsection