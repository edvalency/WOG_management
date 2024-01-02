/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
$("#changes").hide();

$("#update").on("click", function () {
    $("#onemem").hide();
    $("#changes").show();
});

$('#search').on('keyup', function(){
    var search = $('#search').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $.ajax({
        type: "POST",
        url: '/look_up',
        data: {name:search},
        dataType: 'json',
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
})

$('.water').on('click',function(){
    console.log('clicked');
})

$('#datatab').DataTable();  


       