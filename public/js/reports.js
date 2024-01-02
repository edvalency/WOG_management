$('#chart1').hide();
$('#chart3').hide();
$('#chart2').hide();

function chart(type) {
    if (type == "Offertory") {
        $("#chart1").show();
        offertory();
    }else if(type =="Expenses"){
        $("#chart2").show();
        expenses();
    }
}
