$(document).ready(function(){
        $.getJSON(path_chart_borrow, function(result) {
            data = result;

            Morris.Bar({
                element: 'chart',
                data: data,
                xkey: 'ngaytao',
                ykeys: ['soluong','sl'],
                labels: ['Borrow','Quantity'],
                hideHover: 'auto',
                resize: true
            });
        });
    });
    $(document).on('click','#show',function(){
        $.ajax({
               type: 'GET',
                url: path_chart_user,
                data: {year : $('#year').val()},
                dataType: "json",
                success: function (data) {
                        $('#user').html("");
                        Morris.Bar({
                            element: 'user',
                            data: data,
                            xkey: 'created',
                            ykeys: ['userid'],
                            labels: ['Quantity User crearte'],
                            hideHover: 'auto',
                            resize: true
                        });
                    
                },
                error: function (data) {
                    console.log('Error:',data);
                }
      });
    });