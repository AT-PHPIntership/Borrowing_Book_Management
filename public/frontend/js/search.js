var books;

$(document).ready(function(){
  $.getJSON( pathjsonsearch, function( data ) {
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

//countdown shutdown alert
  $("div.alert").delay(timeout).slideUp();