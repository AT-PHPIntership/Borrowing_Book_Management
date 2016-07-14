@extends('admin.layouts.master')

@section('title', 'Manage Book')

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Book
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Manage Book
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
                                    <label for="user id" class="sr-only">Enter Book ID:</label>
                                     <input type="text" class="form-control" name="search" placeholder="Enter Book ID ...">    
                                </div>
                                <div class="col col-md-2">
                                    <button type="submit" class="btn btn-default">Search
                                    </button>
                                </div>  
                             </div>     
                        </form>
                    </div>

                    <div class="col col-md-12">

                        <h2 class="text-left">Book Table</h2>
                        <div class="text-right">    
                    <a href="/Createbook" class="btn btn-lg btn-primary">Create Book</a>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Author</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Publish year</th>
                                        <th class="text-center">Number of page</th>
                                        <th class="text-center">More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 5 * ($list->currentPage()-1)+1; ?>
                                    @foreach($list as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><a href="{{url('book/'.$item->id.'/edit')}}">{{ $item->name }}</a></td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->author }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <!-- <td>{{ $item->publish_year }}</td> -->
                                        <th>{{ date('d/m/Y', strtotime($item->publish_year)) }}</th>
                                        <td>{{ $item->number_of_page }}</td>
                                        <td> <a href="/Editbook"><i class="fa fa-pencil fa-fw"></i></a> 
                                             <a href=""><i class="fa fa-times-circle fa-fw"></i></a>
                                             <a href=""><i class="fa fa-wrench fa-fw"></i></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination pull-right">
                                {!! $list->render();!!}
                            </div>
                        </div>
                    </div>    
                </div>
@endsection