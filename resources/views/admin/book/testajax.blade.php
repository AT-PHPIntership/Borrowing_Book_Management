@extends('admin.layouts.master')

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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#rowDemo').hide();

            $("#list").on('click', function () {
                $.ajax({
                    type: 'GET',
                    url: 'http://homestead.app/admin/book',
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        var output = "<ul>";
                        $.each(data, function (index, value) {
                            output += "<li>";
                            output += "<a href='#' id='" + value.id + "'>";
                            output += value.name;
                            output += "</a>";
                            output += "</li>";
                        });
                        output += "</ul>";
                        $("#data").html(output);
                        
                       
                    },
                    error: function (xhr, status, error) {
                        alert(error);
                        console.log(xhr);
                    }
                });
            });
            //check user
            $('#check').on('click',function(e){
               e.preventDefault();
               $('#error').html("");
               if ($('#rowDemo').next().length > 0) {
                   $('.clone').each(function(index){
                        $(this).remove();
                   });
               }
               $('#id_user').attr('value',$('form #username').val());
               $('#rowDemo input').attr('value',$('form #username').val());
               $.ajax({
                type: 'GET',
                url: 'http://homestead.app/admin/testajax/'+$('form #username').val(),
                data: {username: $('form #username').val()},
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if(data.allow=='true'){
                        $('#message').html(data.mes);
                        $('#quantitybook').html(data.quantity);
                        $('#inbook').show();
                        $('#enterBook').show();
                    } else if(data.allow=='false'){
                        $('#message').html(data.mes);
                        $('#quantitybook').html("0");
                        $('#inbook').show();
                        $('#enterBook').hide();
                    }
                }
                });   
                
            })
            var count=0;
            //add new borrow
            $('#add').on('click',function(e){
                count++;
                e.preventDefault();
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                var data1=$('form #bookid').val();
                // console.log(data1);
                console.log($('form #bookid').val());
                var list=$('#list-add tr');
                var error="";
                var maxBook=$('#quantitybook').text();
                var numBook=list.length;
                console.log(maxBook, numBook);
                //check maximum book to add
                if(numBook<=maxBook){
                list.each(function(){
                    if ($(this).attr('id')==data1){
                        error="Book has exist";
                        $('#error').html(error);
                    }
                });
                $('#error').html(error);
                if(error==""){
                $.ajax({
                    type: 'POST',
                    url: 'http://homestead.app/admin/testajax/add',
                    data: {bookID: $('form #bookid').val()},
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if(data.mes==null){
                            var newRow=$('#rowDemo').clone(true).attr({'class':'clone' ,'id': data.id,'style': 'display: '}).appendTo('#list-add');
                            newRow.find('td:nth-child(1)').html(data.bookname);
                            newRow.find('td:nth-child(2)').html(data.id);
                            newRow.find('button').attr('value',data.id);
                            newRow.find('input').attr('value', data.id);
                            newRow.find('input').attr('name',"lists_book_item[]");
                        }
                        $('#error').html(data.mes);
                        // console.log(count1);
                        // var task = '<tr id="'+data.id+'"><td>' + data.bookname + '</td>';
                        //     task+='<td>'+data.id+'</td>';
                        //     task += '<td><button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';
                        //     task+='<input type="hidden" name="lists_book_item[]" value="'+data.id+'">';
                        // $('#list-add').append(task);
                        count++;
                    },
                    error: function (data) {
                        console.log('Error:',data);
                    }
                }); }
                } else{
                    var notice="Max book ";
                    $('#error').html(notice);
                }          
            });
            // delete bookitem
            $(document).on('click','.btn-delete', function(){
                var id_book = $(this).val();
               
                // alert(id_book);
                $("#"+id_book).remove();
                // count--;
                
            });
            //save to database
            $('#savelist').on('click',function(e){
                // var data=$(this).find('input[name="lists_book_item[]"]').val();
                var list=[];
                var listdata=$('#list_books_add input');
                listdata.each(function(){
                    list.push($(this).attr('value'));
                });
                // list['0']=$('#id_user').val();
                // list.push({userID: $('#id_user').val()});
                // console.log(list['userID']);
                console.log(list);
                e.preventDefault();
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'http://homestead.app/admin/testajax/save',
                    data: {listBook: list},
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if(data.mes!="false"){
                            $('#notice').html(data.mes);
                            $('#add').attr('disabled',true);
                            $('#bookid').attr('disabled',true);
                            $('#savelist').attr('disabled',true);
                        } else {
                            if ($('#rowDemo').next().length > 0) {
                                $('.clone').each(function(index){
                                    $(this).remove();
                                });
                            }
                            $('#notice').html("Something wrong ! Please check and add again.");
                        }
                    },
                    error: function (data) {
                        console.log('Error:',data);
                    }
                });
            });
        });
    </script>
@endsection