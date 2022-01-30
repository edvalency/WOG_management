<?php
require_once "dbcon.php";

$qty = 0;

$db= new DB();
$allData = $db->viewAll();

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
  <script src="assets/js/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="assets/css/components.css">
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
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
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
            <a href="dashboard.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">WOGMS</span>
            </a>
          </div>
          <ul class="sidebar-menu">
          <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="dashboard.php" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown active">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="users"></i><span>Members</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="members.php">Members List</a></li>
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
            <li class="dropdown">
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
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <!-- list table -->
            <div class="col-12 col-xs-12" id="memlist">
              <div class="card card-primary">
                <div class="card-header">
                  <h4>All Members</h4>
                </div>
                <div class="card-body p-5">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Residence</th>
                        <th>Detail</th>
                      </tr>
                      <tbody>
                          <?php 
                          foreach($allData as $data){
                            $qty+=1;
                          ?>
                          <tr>
                          <td><?php echo $qty;?></td>
                          <td><?php echo($data['fullname']);?></td>
                          <td><?php echo($data['contact']);?></td>
                          <td><?php echo($data['residence']);?></td>
                          <td><button href="" class="btn btn-primary" id="view" onclick="tapped('<?php echo($data['fullname']);?>')">Detail</button></td>
                        </tr>
                        <?php }; ?>
                        </tbody>
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
            <!-- list table -->
            <!-- single mmeber details -->
              <div class="card card-primary container col-lg-6" id='onemem'>
              <button class="btn col-sm-2 btn-success mt-2" id='back' onclick='list()'>Return</button>
                <p class='font-30 align-self-center font-weight-bold mt-5' id='memberName'></p>
                <div class="card-body col-xs-6">
                  <div class="table-responsive">
                    <table class="table table-bordered" >
                      <tbody id="memtable">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <!-- single member details end -->

          </div>
        </section>
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
  <!-- General JS Scripts -->
  <script src="members.js"></script>
  <script>
    var detailscount=0;
    const details = ["Date of birth",'Contact','Gender','Hometown','Region','Residence','Email',
  "Father's name", "Father's status","Mother's Name","Mother's status","Next of kin","Next of kin contact",
  "Relation to Next of kin","Email of next of kin","Department","Baptism Status","Date Baptised","Year of membership",
  "Profession","Present Occupation","Name of company","Employment Status"];
    var tbody = document.getElementById('memtable');
    // function to display selected members details
    function tapped(memName){
      document.getElementById('memlist').style.display = 'none';
      document.getElementById('onemem').style.display = 'flex';
     

      $.ajax({
        type:'POST',
        url:'ajax.php',
        data: 'name='+memName,
        success: function(data, status){
          console.log("Status: "+ status);
        const lst = JSON.parse(data)
        for(let l in lst[0]){
          console.log(l+': '+lst[0][l]);
          if(l =="fullname"){
            document.getElementById("memberName").innerHTML = lst[0][l]

          }else{
          row = document.createElement('tr');
          var td1= document.createElement('td');
          td1.innerHTML = details[detailscount];
          detailscount+=1;
          
          var td2 = document.createElement('td');
          td2.innerHTML = lst[0][l];

          row.appendChild(td1);
          row.appendChild(td2);
          tbody.appendChild(row); 
          }
        } }
      });
    }
    function list(){
      window.location="members.php";

    }
    
  </script>
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- blank.php  21 Nov 2019 03:54:41 GMT -->
</html>