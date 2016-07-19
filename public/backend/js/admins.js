$(document).ready(function(){
  //datatables
  $('#list_users').DataTable();
  $('#list_books').DataTable();
  $('#list_categories').DataTable();

  //Confirm delete
  $('#confirmDelete').on('show.bs.modal', function (e) {
  	  // set message
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      // set title for model
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });
 
      //Form confirm (yes/ok) handler, submits form
  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });

  //countdown shutdown alert
  $("div.alert").delay(3000).slideUp();
});
