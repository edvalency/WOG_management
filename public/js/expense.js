$('#water').hide();
$('#misc').hide();

$('#water').on('click',function(){
    $('#water').show();
    console.log('water');
})

$('#prepaid').on('click',function(){
    console.log('prepaid');
})

$('#allowance').on('click',function(){
    console.log('allowance');
})

$('#misc').on('click',function(){
    $('#misc').show();
    console.log('misc');
})