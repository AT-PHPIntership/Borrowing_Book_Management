$(document).ready(function(){ 
  //datatables
  $('#list_users').DataTable();
  $('#list_books').DataTable();
  $('#list_bookitems').DataTable();
  $('#list_categories').DataTable();
  $('#list_borrows').DataTable();
  $('#list_bookborrow').DataTable( {
    "paging": false,
    "bFilter": false
  });

  //Confirm delete
  $('#confirmDelete').on('show.bs.modal', function (e) {
  	  // set message
      $message = $(e.relatedTarget).attr('data-message');
      $('.modal-body p').text($message);
      // set title for model
      $title = $(e.relatedTarget).attr('data-title');
      $('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $('.modal-footer #confirm').data('form', form);
  });
 
      //Form confirm (yes/ok) handler, submits form
  $('#confirmDelete .modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });

  //countdown shutdown alert
  $("div.alert").delay(timeout).slideUp();
});

$('.img_upload').hide();

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_no').show();
            $('#image_no').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#image").on('change', function(){
    readURL(this);

});


$('#rowBook').hide();

$(document).ready(function() {

    $.getJSON( pathjsongiveback, function(data) {
        borrows = data;
    });
    $('#add_button').on('click', function(e) {
        e.preventDefault();
        var request = $('#bookid').val();
        var array = $('tr');
        var error = "";
        var flag = 0;
        if (request == "") {
          error = error_null;
        }
        array.each(function(){
        if ($(this).attr('id') == request) {
          error = error_exist;
          }
        });
        if (error == "") {
        for(i=0; i < borrows.length; i++){
           if ((request == borrows[i].book_item_id)) { 
            var newRow = $('#rowBook').clone(true).attr({'id': borrows[i].book_item_id, 'style': 'display: '}).appendTo('#list-add');
            newRow.find('td:nth-child(1)').html(borrows[i].borrow_id);
            newRow.find('td:nth-child(2)').html(borrows[i].fullname);
            newRow.find('td:nth-child(3)').html(borrows[i].name);
            newRow.find('#borrowdetail_id').attr('value', borrows[i].id);
            newRow.find('#borrow_id').attr('value', borrows[i].borrow_id);
            break; 
            } else {
              flag++;
            }
          }
        }
        if (flag == borrows.length) {
          error = error_notexist;
        }
        $('#errors').html(error);      
    });
    
    $(btn_remove).on("click", function(e) {
        e.preventDefault(); 
        $(this).parent().parent().remove();
    });
    $('#btn_submit').on("click", function(e){
      e.preventDefault();
      var count = 0;
      var data = [];
      var data1 = [];
      var array = [];
      var array1 = [];
    $('#rowBook').remove();
    $("input:hidden[name*='item']").each(function() {
      array.push($(this).val());
    });
    $("input:hidden[name*='borrowid']").each(function() {
      array1.push($(this).val());
    }); 
    for(i=0; i < borrows.length; i++) {
      data.push(borrows[i].id);
      data1.push(borrows[i].borrow_id);
    }
    for(i=0; i < array.length; i++) {
      if( (data.indexOf(parseInt(array[i])) == -1) || (data1.indexOf(parseInt(array1[i])) == -1) ) {
        break;
      } else {
        count++;
      }
    }
    if(count == (array.length)) {
      $(this.form).submit();
    } else {
      $('#error_submit').html(error_notexist);
    }
  });
});
//Borrow book 
$(document).ready(function () {
    $('#rowZero').hide();

    //check user by id
    $('#check').on('click',function(e){
      e.preventDefault();
      $('#error').html("");
      $('#error').removeClass('alert-danger');
      if ($('#rowZero').next().length > 0) {
        $('.clone').each(function(index){
          $(this).remove();
        });
      }
      $('#notice').html("");
      $('#add').attr('disabled',false);
      $('#bookid').attr('disabled',false);
      $('#savelist').attr('disabled',false);
      $('#user_name').attr('value',$('form #username').val());
      $('#rowZero input').attr('value',$('form #username').val());
      $.ajax({
        type: 'GET',
        url: path_check_user+$('form #username').val(),
        data: {username: $('form #username').val()},
        dataType: "json",
        success: function (data) {
            $('#user_notice').show();

            if(data.allow=='true'){
                $('#user_notice').attr('class','alert-info');
                $('#message').html(data.mes);
                $('#quantity').show();
                $('#quantitybook').html(data.quantity);
                $('#enterBook').show();
            } else if(data.allow=='false'){
                $('#user_notice').attr('class','alert-warning');
                $('#message').html(data.mes);
                $('#quantitybook').html("0");
                $('#enterBook').hide();
            } else{
                $('#user_notice').attr('class','alert-danger');
                $('#enterBook').hide();
                $('#message').html(data.mes);
                $('#quantity').hide();
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
        var list=$('#list-add tr');
        var error="";
        var maxBook=$('#quantitybook').text();
        var numBook=list.length;
        //check maximum book to add
        if(numBook<=maxBook){
          list.each(function(){
              if ($(this).attr('id')==data1){
                  error="Book has exist";
                  $('#error').attr('class','alert-danger');
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
                    if(data.mes==null){
                        $('#error').removeClass('alert-danger');
                        var newRow=$('#rowZero').clone(true).attr({'class':'clone' ,'id': data.id,'style': 'display: '}).appendTo('#list-add');
                        newRow.find('td:nth-child(1)').html(data.bookname);
                        newRow.find('td:nth-child(2)').html(data.id);
                        newRow.find('button').attr('value',data.id);
                        newRow.find('input').attr('value', data.id);
                        newRow.find('input').attr('name',"lists_book_item[]");
                    } else{
                        $('#error').attr('class','alert-danger');
                        $('#error').html(data.mes);
                    }
                    
                },
                error: function (data) {
                    alert('Error:',data);
                }
            });
          }
        } else{
            $('#error').attr('class','alert-danger');
            $('#error').html(max_book);
        }          
    });
    // delete bookitem in list add
    $(document).on('click','.btn-delete', function(){
        var id_book = $(this).val();
        $("#"+id_book).remove();
        
    });
    //save to database
    $('#savelist').on('click',function(e){
        var list=[];
        var listdata=$('#list_books_add input');
        listdata.each(function(){
            list.push($(this).attr('value'));
        });
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
                $('#notice').show();
                if(data.mes=="Succesful"){
                    $('#notice').html(data.mes);
                    $('#notice').attr('class', 'alert-success');
                    $('#add').attr('disabled',true);
                    $('#bookid').attr('disabled',true);
                    $('#savelist').attr('disabled',true);
                } else {
                    $('#notice').html(data.mes);
                    $('#notice').attr('class', 'alert-success');
                }
            },
            error: function (data) {
                alert('Error:',data);
            }
        });
    });  
});
