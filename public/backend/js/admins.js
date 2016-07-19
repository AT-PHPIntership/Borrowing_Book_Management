$(document).ready(function(){
  $('#list_users').DataTable();
  $('#list_books').DataTable();
  $('#list_categories').DataTable();
});
//js for upload image
  $('#image').on('change',function(evt){

            var files = evt.target.files;
            var f = files[0];
            var reader = new FileReader();
             
              reader.onload = (function(theFile) {
                    return function(e) {
                        var output= "<img src='"+e.target.result+"' title='" + theFile.name+"' width='100' />" ;
                      $('#list').html(output);
                    };
              })(f);
               
              reader.readAsDataURL(f);
});


