<?php
require_once "dbcon.php";

$db = new DB();

if(isset($_POST['submit'])){
  if($_POST['firstmnth'] != "default"){
  $db->insertWelfare($_POST['firstmnth'],$_POST['name'],$_POST['amount']);
  echo '<script>alert("success");</script>';
  echo '<script>window.location="welfare.php";</script>';
}

if($_POST['monthone'] !="default" && $_POST['monthtwo'] !="default"){
  $months = array("","January", "February", "March","April", "May","June","July",
"August","September","October","November","December");

$mfrom = array_keys($months,$_POST['monthone']);
$mto = array_keys($months,$_POST['monthtwo']);


$lst = (int)$mto[0];
$frst = (int)$mfrom[0];
if($frst>$lst){
  $subtract = $frst-$lst;
}else{
  $subtract = $lst-$frst;
}

$counter = $frst;
for($i = 0; $i<=$subtract;$i++){
    $db->insertWelfare($months[$counter],$_POST['name'],'10');
    $counter +=1;
}

echo '<script>alert("success");</script>';
echo '<script>window.location="welfare.php";</script>';
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>WOG Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <script src="assets/js/jquery-3.6.0.js"></script>
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200" oninput='search(this.value)'>
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile.php" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.php" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="auth-login.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- Side bar for all the pages start -->
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">WOGMS</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Members</span></a>
              <ul class="dropdown-menu">
                <li ><a class="nav-link" href="members.php">Members List</a></li>
                <li><a class="nav-link" href="addmember.php">Add member</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="offertory.php" class="menu-toggle nav-link"><i data-feather="command"></i><span>Offertory</span></a>
            </li>
            <li class="dropdown">
              <a href="tithes.php" class="menu-toggle nav-link"><i data-feather="mail"></i><span>Tithes</span></a>
              
            </li>
            <li class="dropdown active">
              <a href="welfare.php" class="menu-toggle"><i data-feather="copy"></i><span>Welfare</span></a>
            </li>
            <li class="dropdown">
              <a href="expenses.php" class="menu-toggle nav-link"><i data-feather="command"></i><span>Expenses</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Game Changers
              </span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="gc_members.php">Members List</a></li>
                <li><a class="nav-link" href="gc_dues.php">Dues</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Sidebar end  -->
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="row " id="allmembers">
              <div class="col-6 container">
                <div class="card" >
                  <div class="card-header">
                    <h4>Welfare Payments</h4>
                  </div>
                  
                  <div class="card-body">
                    <h4 class="justify-content-center d-flex">Names</h4>
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tbody id="welfarenames"></tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span
                              class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- single member welfare details -->
            <div class="card col-4 container" id="member_welfare">
              <h4 class="align-self-center mt-3 mb-4" id='membername'></h4>
              <div>
                <button onclick="listall()" class="btn btn-primary ml-4 mb-4"><i class="fas fa-less-than"></i></button>
                <button type="button" class="btn btn-success ml-2 mb-4 " data-toggle="modal"
                      data-target="#exampleModalCenter">Record Payment</button>
              </div>
              <div class="card-body">
                <div class="table-responsive" id="tab">
                  <table class="table table-bordered table-md">
                     <tr>
                      <th>Month</th>
                      <th>Year</th>
                      <th>Amount</th>
                    </tr>
                    <tbody id="recordtable"></tbody>
                   
                  </table>
                </div>
                <p id="empty"></p>
              </div>

            </div>
            <!-- single member welfare details -->
            <!-- content adding end -->
          </div>
        </section>
        <!-- Vertically Center -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Enter member's welfare amount</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form class="" action='#' method="post">
                  <div class="form-group">
                    <label>Enter amount</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-coins"></i>
                        </div>
                      </div>
                      <input type="text" name="name" id="singlemember" hidden>
                      <input type="text" class="form-control" placeholder="Amount" name="amount" id="amount" oninput="amt(this.value)">
                      
                    </div>
                    <div class='row justify-content-center mt-3' id='one'>
                      <label for="months" class="mr-3 mt-2" id="payfor">Payment for </label>
                      <select name="firstmnth" id="months" class='form-control col-3'>
                      <option value="default">Select month</option>
                      <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                      </select>
                      <span id="years"class='font-15 mt-2 ml-2'></span>
                      <!-- <input type="number" name="year" min=2021 max=2099 value=2021 id="" class="form-control col-3 ml-2"> -->
                    </div>
                    <div class="row justify-content-center" id='more'>
                      <div class="row justify-content-center d-flex mt-3">
                      <label for="months" class="mr-3 mt-2">Payment from </label>
                      <select name="monthone" id="months" class='form-control col-4'>
                      <option value="default">Select month</option>
                      <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                      </select>
                      <!-- <input type="number" name="year" min=2021 max=2099 value=2021 id="" class="form-control col-3 ml-2"> -->
                      <span id="year1"class='font-15 mt-2 col-3 ml-2'></span>
                      </div>
                      <div class="row justify-content-center d-flex mt-3">
                      <label for="months" class="mr-3 mt-2">Payment to </label>
                      <select name="monthtwo" id="months" class='form-control col-4'>
                      <option value="default">Select month</option>
                      <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                      </select>
                      <!-- <input type="number" name="year" min=2021 max=2099 value=2021 id="" class="form-control col-3 ml-2"> -->
                      <span id="year2"class='font-15 mt-2 col-3 ml-2'></span>
                      </div>
                    </div>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect" id="record">Record</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Vertically Center end -->
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="#">Word of Grace Management System</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <script>
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
  // $("#record").click(function(){
  //   var name = document.getElementById('membername').innerHTML;
  //   var amount = $("#amount").val();
  //   var firstmonth = $("#firstmonth").val();
  //   var secondmonth = $("#secondmonth").val();

  //   $.ajax({
  //     type:"POST",
  //     url: "ajax.php",
  //     data: {memins: name, welamount: amount,monthone: firstmonth,monthtwo: secondmonth},
  //     success: function(){
  //       alert("success");
  //       window.location="welfare.php";
  //     }
  //   })
  // })

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
   $('#singlemember').val(member);
   var tbody = $('#recordtable');
    var checks = 0;
   $.ajax({
     type:"POST",
     url:"./ajax.php",
     data:"welmember="+member,
     success:function(data, status){
       var records = JSON.parse(data);
       if(records.length == 0){
         $("#empty").text('No data recorded yet');
       }else{
         for(i=0;i<records.length;i++){
           var row = $("<tr></tr>");
           var td1 = $('<td></td>').text(records[i]['month']);
           var td2 = $('<td></td>').text(records[i]['year']);
           var td3 = $('<td></td>').text(records[i]['amount']);
           
           row.append(td1,td2,td3);
            $('#recordtable').append(row);

         }
        
       }
     }
    //  success ends
   })
 }

// returning from one member view
 function listall(){
  window.location = "welfare.php";
 }

//  hiding welfare amount input month in modal
$('#one').hide();
$('#more').hide();
var dte = new Date();
$('#years').text(dte.getFullYear());
$('#year1').text(dte.getFullYear());
$('#year2').text(dte.getFullYear());

// display single month or multiple months
 function amt(num){
     if(num == ''){
        
        $('#one').hide();
        $('#more').hide();
     }else if(num.split('').length == 2){
         if(num.split('')[0]==1){
             $('#one').show();
             $('#payfor').text('Payment for');
             $('#more').hide();
         }else{
            $('#one').hide();
             $('#more').show();

         }
     }else if(num.split('').length == 1){
      $('#payfor').text('Part payment for');
      $('#one').show();
      $('#more').hide();

     }
 }


  </script>
  <!-- General JS Scripts -->
  <!-- <script src="assets/js/welfare.js"></script> -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
</html>