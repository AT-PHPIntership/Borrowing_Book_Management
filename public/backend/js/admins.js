$(document).ready(function(){ 
  //datatables
  $('#list_users').DataTable();
  $('#list_books').DataTable();
  $('#list_bookitems').DataTable();
  $('#list_categories').DataTable();
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
    $(add_button).on('click', function(e) {
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
        $('#error').html(error);      
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
      if( (data.indexOf(parseInt(array[i])) == -1) || (data1.indexOf(parseInt(array1[i])) == -1) ){
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
