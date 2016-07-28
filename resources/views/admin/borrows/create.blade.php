@section('title', trans('book_manage_lang.title'))

@section('content')
<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {!!trans('book_manage_lang.manage_book')!!}
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>
                                <a href="{{ route('home.admin') }}">{!!trans('book_manage_lang.dashboard' )!!} </a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> {!!trans('book_manage_lang.manage_book' )!!} 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col col-md-12">
                        <h2 class="text-left">{!!trans('book_manage_lang.book_list' )!!}</h2>
                        <div class="row"> 
                        <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">   
                            <input type="text" name="username" id="username" >
                            <p class="btn btn-md btn-primary" id="check">Check</p>
                        </form>
                            <p class="btn btn-md btn-primary" id="list">List</p>
                        </div>
                        <div class="row">
                            
                        </div>
                        <br>
                        <div class="row" id="data"></data>
                        <div class="row" id="inbook" style="display:none">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <input type="hidden" id="id_user" name="userID" value="">
                                <div class="" id="message">
                                </div>
                                <label>Quantity</label>
                                <span id="quantitybook" ></span>

                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" id="enterBook">
                                <form id="addbook" name="addbook" class="form-horizontal col-lg-12" novalidate="">   
                                <input type="text" name="bookID" id="bookid" >
                                <button type="submit" class="btn btn-md btn-primary" id="add">Add</button>
                                <p id="error"></p>
                                
                                </form>
                                {{-- <form method="POST" action="http://homestead.app/admin/testajax/add">
                                    <input type="hidden" name="_token" value="<php echo csrf_token(); ?>">
                                    <input id="" name="bookID">
                                    <button type="submit">add</button>
                                </form> --}}
                                
                                <div class="col-lg-12" id="">
                                    
                                {{-- <form id="ok" method="POST" action="http://homestead.app/admin/testajax/save">
                                <input type="hidden" name="_token" value="<php echo csrf_token(); ?>">     --}}
                                <table id="list_books_add" class="display text-center table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{!!trans('book_manage_lang.name' )!!}</th>
                                            <th class="text-center">{!!trans('book_manage_lang.book_item_id' )!!}</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <form method="POST" action="http://homestead.app/admin/testajax/delete/0">
                                        <input type="hidden" name="_token" value="<php echo csrf_token(); ?>"> --}}
                                    
                                    <tbody id="list-add">
                                        <tr id="rowDemo">
                                            <td></td>
                                            <td></td>
                                            <td><button class="btn btn-danger btn-xs btn-delete delete-task" value="">Delete</button></td>
                                            <input type="hidden" name="lists_book_item[]" value="">
                                        </tr>
                                    </tbody>
                                    
                                </table>
                                <div class="row">
                                    <button type="submit" id="savelist">Submit</button>
                                </div>
                                <div class="" id="notice"></div>
                                {{-- </form> --}}
                                
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