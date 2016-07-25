$(document).ready(function(){
  //datatables
  $('#list_users').DataTable();
  $('#list_books').DataTable();
  $('#list_bookitems').DataTable();
  $('#list_categories').DataTable();
  $('#example').DataTable();
  $('#example #example_length').attr('style','none');
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
    $(document).ready(function() {
    var t = $('#example').DataTable();
    var counter = 1;
 
    $(document).on( 'click', '#addRow', function () {
        t.row.add( [
            '<input type="text" class="form-control" name ="txt'+counter+'" value = "" >'
        ] ).draw( false );
    });
    // Automatically add a first row of data
    $('#addRow').click();
} );
    $(document).ready(function() {
    var table = $('#example').DataTable();
 
    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#deleteRow').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );
