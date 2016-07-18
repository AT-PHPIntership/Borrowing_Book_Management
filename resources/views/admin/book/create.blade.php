@extends('admin.layouts.master')

@section('title', trans('book_manage_lang.create_book'))

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {!!trans('book_manage_lang.create_book')!!}
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  
                                <a href="#">{!!trans('book_manage_lang.dashboard' )!!}</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  
                                <a href="#">{!!trans('book_manage_lang.manage_book')!!}</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> {!!trans('book_manage_lang.create_book')!!}
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            <form>
                <div class="form-group">
                    <label for="name">{!!trans('book_manage_lang.name')!!}</label>
                    <input id="name" type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="category">{!!trans('book_manage_lang.category')!!}</label>
                    <select id="category" name="category" class="form-control">
                        <option value="">----------Choose-----------</option>
                        @foreach($categories as $category)
                            <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="author">{!!trans('book_manage_lang.author')!!}</label>
                    <input id="author" type="text" class="form-control" name="author">
                </div>
                <div class="form-group">
                    <label for="publishyear">{!!trans('book_manage_lang.publish_year')!!}</label>
                    <input id="publishyear" type="text" class="form-control" name="publish year">
                </div>
                <div class="form-group">
                    <label for="numberpage">{!!trans('book_manage_lang.number_of_page')!!}</label>
                    <input id="numberpage" type="text" class="form-control" name="numberpage" placeholder="Number page">
                </div>
                <div class="form-group">
                    <label for="quantity">{!!trans('book_manage_lang.quantity')!!}</label>
                    <input id="quantity" type="text" class="form-control" name="quantity" placeholder="Quanity">
                </div>
                <div class="form-group">
                    <label for="image">{!!trans('book_manage_lang.choose_image')!!}</label>
                    <input type="file" id="image" name="image">
                        <p class="help-block">Example block-level help text here.</p>
                </div>
                    <button type="submit" class="btn btn-default">{!!trans('book_manage_lang.submit' )!!}</button>
            </form>
                
                <!-- /.row -->
@endsection