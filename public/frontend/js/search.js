var books;

$(document).ready(function(){
  $.getJSON( 'http://homestead.app/search/book', function( data ) {
    books = data;
    setAutocomplete();
  });
});

function setAutocomplete(){
  $('#search-input').autocomplete({
    source: $.map(books, function (value, index) {
      return {
        label: value.name,             
      };
    }),
    messages: {
      noResults: '',
      results: function() {}
    },
    minLength: 0
  });
}