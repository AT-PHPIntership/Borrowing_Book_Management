//Borrow book 
$(document).ready(function () {
    $('#rowDemo').hide();

    //check user by id
    $('#check').on('click',function(e){
      e.preventDefault();
      $('#error').html("");
      if ($('#rowDemo').next().length > 0) {
        $('.clone').each(function(index){
          $(this).remove();
        });
      }
      $('#notice').html("");
      $('#add').attr('disabled',false);
      $('#bookid').attr('disabled',false);
      $('#savelist').attr('disabled',false);
      $('#user_name').attr('value',$('form #username').val());
      $('#rowDemo input').attr('value',$('form #username').val());
      $.ajax({
        type: 'GET',
        url: path_check_user+$('form #username').val(),
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
    //add new book to borrow list
    $('#add').on('click',function(e){
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
                type: 'GET',
                url: path_add_book,
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
                },
                error: function (data) {
                    console.log('Error:',data);
                }
            });
          }
        } else{
            var notice="Max book ";
            $('#error').html(notice);
        }          
    });
    // delete bookitem in list add
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
            url: path_save_borrow,
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