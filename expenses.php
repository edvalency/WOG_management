<?php
require_once 'dbcon.php';

$db = new DB();

if(isset($_POST['desc']) && isset($_POST['amount'])){
  $db->insertexpenses($_POST['desc'], $_POST['amount']);
  echo "<script>alert('Success');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>WOGMS</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="assets/css/components.css">
  <script src="assets/js/jquery-3.6.0.js"></script>
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body onload="table()">
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
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
        <li class="">
            <div class="mr-5">
            <span>Current Expenses total</span>
            <h5 class="mb-3 font-18" id='currentbal'></h5>
          </div>
          </li>
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
            <a href="dashboard.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">WOGMS</span>
            </a>
          </div>
          <ul class="sidebar-menu">
          <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="dashboard.php" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="users"></i><span>Members</span></a>
              <ul class="dropdown-menu">
                <li ><a class="nav-link" href="members.php">Members List</a></li>
                <li><a class="nav-link" href="addmember.php">Add member</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="offertory.php" class="menu-toggle nav-link"><i data-feather="dollar-sign"></i><span>Offertory</span></a>
            </li>
            <li class="dropdown">
              <a href="tithes.php" class="menu-toggle nav-link"><i data-feather="credit-card"></i><span>Tithes</span></a>
              
            </li>
            <li class="dropdown">
              <a href="welfare.php" class="menu-toggle"><i data-feather="umbrella"></i><span>Welfare</span></a>
            </li>
            <li class="dropdown active">
              <a href="expenses.php" class="menu-toggle nav-link"><i data-feather="trending-down"></i><span>Expenses</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="thumbs-up"></i><span>Game Changers
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
      <div class="main-content" >
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-lg-6 container">
                <div class="card">
                  <div class="card-header">
                    <h4>Expenses</h4>
                    <h4 id='amount'></h4>
                  </div>
                  <div class="card-body">
                    <button type="button" class="btn btn-success" data-toggle="modal"
                      data-target="#exampleModalCenter">Add Expense</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md" >
                        <tbody id='expenselist'>
                          <tr>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Amount</th>
                          </tr>
                        </tbody>
                      </table>
                      <p id="mty"></p>
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
          
<!-- content adding end -->
          </div>
        </section>
         <!-- Vertically Center -->
         <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Enter Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form class="" action='#' method="post">
                  <div class="form-group">
                      <label for="desc">Enter Expense details</label>
                      <input type="text" name="desc" id="" class="form-control">
                    <label>Enter amount</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-coins"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="amount" name="amount">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Enter</button>
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

// Expenses data from database
    const tbody = document.getElementById('expenselist');
    function table(){
      $.ajax({
        type:"POST",
        url:"ajax.php",
        data:'expense=Edwin Ofosuhene',
        success:function(data,status){
          const det = JSON.parse(data);
          if(det.length == 0){
              $('#mty').text('No data recorded yet');
          }
          var amount = 0;
          for(let i = 0;i<det.length;i++){
            var row = document.createElement('tr');
            var td1 = document.createElement('td');
            td1.innerHTML = det[i]['date'];
            var td2 = document.createElement('td');
            td2.innerHTML = det[i]['description'];
            var td3 = document.createElement('td');
            td3.innerHTML = det[i]['amount'];
            amnt = parseFloat(det[i]['amount']);
             amount +=amnt;
            row.appendChild(td1);
            row.appendChild(td2);
            row.appendChild(td3);
            tbody.appendChild(row);
            
          }
          $('#currentbal').text("₵ "+amount.toFixed(2));
        }
      })
    }
   
    // console.log(today);
     $('#ModalCenter').hide();
    $('#addoffertory').click(function(){
      var expense = prompt("Enter today's expense");
      $('#ModalCenter').show();
    });
  </script>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
</html>