$(document).ready(function(){
  $('#list_users').DataTable();
  $('#list_books').DataTable();
  $('#list_categories').DataTable();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#image_no").on('change',function(){
    readURL(this);
});