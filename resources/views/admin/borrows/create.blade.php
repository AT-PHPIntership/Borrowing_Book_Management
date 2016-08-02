@extends('admin.layouts.master')

@section('title', trans('borrow.addborrow'))

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {!!trans('borrow.add_borrow')!!}
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>
                                <a href="{{ route('home.admin') }}">{!!trans('book_manage_lang.dashboard' )!!} </a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> {!!trans('borrow.add_borrow' )!!} 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-offset-2 col-lg-8" id="maincontent">
                        <h3>{!!trans('borrow.enter_user' )!!}</h3>
                        <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">   
                            <input type="text" name="username" id="username" >
                            <p class="btn btn-md btn-primary" id="check">{!!trans('borrow.check' )!!}</p>
                        </form>
                        <div class="alert" id="user_notice" style="display:none">
                            <input type="hidden" id="user_name" name="user_name" value="">
                            <div class="" id="message">
                            </div>
                            <div id="quantity">
                                <label>{!!trans('borrow.quantity' )!!} : </label>
                                <span id="quantitybook" ></span>
                            </div>

                        </div>
                        <hr>
                            <div class="" id="enterBook" style="display:none">
                                <h3>{!!trans('borrow.enter_book' )!!}</h3>
                                <form id="addbook" name="addbook" class="form-horizontal col-lg-12" novalidate="">   
                                <input type="text" name="bookID" id="bookid" >
                                <button type="submit" class="btn btn-md btn-primary" id="add">{!!trans('borrow.add' )!!}</button>
                                <p id="error" class="alert"></p>
                                </form>
                                <div class="col-lg-12" id="">
                                    
                                <table id="list_books_add" class="display text-center table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{!!trans('book_manage_lang.name' )!!}</th>
                                            <th class="text-center">{!!trans('book_manage_lang.book_item_id' )!!}</th>
                                            <th class="text-center">{!!trans('borrow.action' )!!}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-add">
                                        <tr id="rowZero">
                                            <td></td>
                                            <td></td>
                                            <td><button class="btn btn-danger btn-xs btn-delete delete-task" value="">{!!trans('borrow.delete' )!!}</button></td>
                                            <input type="hidden" name="lists_book_item[]" value="">
                                        </tr>
                                    </tbody>
                                    
                                </table>
                                <div class="row">
                                    <button type="submit" id="savelist">{!!trans('borrow.submit' )!!}</button>
                                </div>
                                <div class="alert" id="notice"></div>
                                </div>
                            </div>
                        </div>    
                        
                    </div>    
                </div>
                <div class="row">
                    <ul id="listborrow">

                    </ul>
                </div>
    <meta name="_token" content="{!! csrf_token() !!}" />
@endsection

@section('script')
<script type="text/javascript">
    var path_check_user={!! json_encode(config('path.path_check_user'))!!};
    var path_add_book={!!json_encode(config('path.path_add_book'))!!};
    var path_save_borrow={!!json_encode(config('path.path_save_borrow'))!!};
    var max_book='{!!trans('borrow.max_book' )!!}';
    var book_exist= '{!! trans('borrow.book_exist')!!}';
</script>
@endsection