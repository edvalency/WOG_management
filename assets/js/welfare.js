// showing members when screen loads
 $.ajax({
    type:'POST',
    url: "ajax.php",
    data:"show=all",
    success: function(data, status){
      const all = JSON.parse(data);
        var tbody = $("#welfarenames");
        var allData = 0;
        var arranged = Math.ceil(all.length/3);
        for(var m = 0;m<arranged;m++){
     
          var row = $("<tr></tr>");
          for(let a = 0;a<4;a++){
            if(allData === all.length-1){
              var td1 = $("<td onclick='member(this.innerHTML)'></td>").text(all[allData]['fullname']);
              row.append(td1);
              break;

            }else{
              var td1 = $("<td onclick='member(this.innerHTML)'></td>").text(all[allData]['fullname']);
              row.append(td1);
            allData += 1;
            }
            
          }
          tbody.append(row);
  }

    }
  })

    // Function for inserting amount into database
  $("#record").click(function(){
    var name = document.getElementById('membername').innerHTML;
    var amount = $("#amount").val();
    $.ajax({
      type:"POST",
      url: "ajax.php",
      data: {memins: name, welamount: amount},
      success: function(){
        alert("success");
        window.location="welfare.php";
      }
    })
  })

// search members
      function search(smember){
        var tbody = $('#welfarenames');

        if(smember ===""){
          window.location = "welfare.php";
        }else{
        $.ajax({
        type:"POST",
        url: "ajax.php",
        data: {search:smember},
        success: function(data, status){
          $('#welfarenames').empty();
          const searchr = JSON.parse(data);
          const nor = searchr.length;
          const resultsQty = Math.ceil(searchr.length/4);
          console.log("Search results qty: "+searchr.length);

          for(let a = 0;a<resultsQty;a++){
            var row = $('<tr></tr>');
          
          var displayed = 0;
              for(let i = 0; i<4;i++){
                if(displayed ===nor-1){
                  var td = $("<td onclick='member(this.innerHTML)'></td>").text(searchr[displayed]['fullname']);
                  row.append(td);
                  break;
                }else{
                  var td = $("<td onclick='member(this.innerHTML)'></td>").text(searchr[displayed]['fullname']);
                  row.append(td);
                  displayed +=1;
                }
              }
            tbody.append(row);
            }
            }
        })
      }}


var memlist= document.getElementById('allmembers');
var memdetails = document.getElementById('member_welfare');
memdetails.style.display = 'none';
// memlist.style.display = "none";

const month = ["","January", "February", "March","April", "May","June","July",
"August","September","October","November","December"];

// showing members records
 function member(member){
   memdetails.style.display = "flex";
   memlist.style.display = "none";
   $('#membername').text(member);
   var tbody = $('#recordtable');
    var checks = 0;
   $.ajax({
     type:"POST",
     url:"./ajax.php",
     data:"welmember="+member,
     success:function(data, status){
       var records = JSON.parse(data);
       console.log(records);
    //    var firstpayment = records[0]['month'];
    //    console.log('first payment: '+month[firstpayment[1]]);
    //    var months = parseInt(firstpayment[1]);
       
    //    if(records.length == 0){
    //      $('#tab').hide();
    //      $('#empty').text("No data recorded yet");
    //    }
    //    for(w=0;w<records.length;w++){
    //      var check = parseInt(records[w]['amount']);
    //      checks +=check;
    //    }
    //   //  console.log(checks);
    //   var nor = Math.ceil(checks/5);
    //   var shown = 0;
    //   // console.log(nor);
    //   for(s=0;s<nor;s++){
    //     var row = $('<tr></tr>');
    // //    if(months == 13){
    // //      months = 1;
    // //    }
    //     if(shown === checks-1){
    //       console.log('all equal');
    //       var mnth = $('<td></td>').text(month[months]);
    //     //console.log("months:"+months);
    //       var td = $('<td><input type="checkbox" name="c"></td>');
    //       row.append(mnth,td);
    //       tbody.append(row);
    //       break;
    //     }else{
    //        var mnth = $('<td></td>').text(month[months]);
        
    //     months +=1;
    //     row.append(mnth);
    //       for(t =0;t<5;t++){
    //        var td = $('<td><input type="checkbox" name="c"></td>');
    //       row.append(td);
    //       shown +=1;
    //       }

    //     }
    //   tbody.append(row);
       
    // }
    //  var checkboxes = document.getElementsByName('c');
    //     for(i = 0;i<checks;i++){
    //       checkboxes[i].checked=true;
    //     }
     }
    //  success ends
   })
 }

// returning from one member view
 function listall(){
  window.location = "welfare.php";
 }

//  hiding welfare amount input month in modal
// $('#one').hide();
$('#more').hide();

// display single month or multiple months
 function amt(num){
    console.log("num");

    //  if(num == ''){
        
    //     $('#one').hide();
    //     $('#more').hide();
    //  }else if(num.split('').length == 2){
    //      if(num.split('')[0]==2){
    //          console.log('one');
    //          document.getElementById('one').style.display = "flex";
    //         //  $('#one').show();
    //          $('#more').hide();
    //      }else{
    //         $('#one').hide();
    //          $('#more').show();

    //      }
    //  }
 }