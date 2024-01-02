
function active(name) {
    $("#onemem").show();
    $("#memlist").hide();


   window.location = "{{ route('mem.single') }}";
}

window.onload = function () {
    $("#onemem").hide();
    // console.log($(this).attr('action'))

    // var sample = $("#name").text();
    // console.log(sample);
};
