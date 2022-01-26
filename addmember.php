<?php
require_once "dbcon.php";
$db= new DB();

$fullname = $_POST['fullname']; $dob = $_POST['dob']; $phone = $_POST['phone']; $gender = $_POST['gender'];
$region = $_POST['region']; $email = $_POST['email']; $fname = $_POST['fathers_name']; $fstat = $_POST['dad_stat'];
$mname = $_POST['mothers_name']; $mstat = $_POST['mom_stat']; $hometown = $_POST['hometown']; $yom = $_POST['yom'];
$residence = $_POST['residence']; $nok = $_POST['nok']; $nok_phone = $_POST['nok_phone']; $relation = $_POST['r_nok'];
$nok_email = $_POST['nok_email']; $dept= $_POST['department']; $baptism_stat = $_POST['baptism']; $date_baptised = $_POST['baptism_date']; $yom = $_POST['yom'];
$profession = $_POST['profession']; $occupation = $_POST['occupation']; $company_name = $_POST['company_name']; $em_stat = $_POST['em_stat'];

if (isset($_POST['submit'])){
  $db->insert($fullname,$dob,$phone,$gender,$hometown,$region,$residence,$email,$fname,$fstat,$mname,$mstat,$nok,$nok_phone,$relation
  ,$nok_email,$dept,$baptism_stat,$date_baptised,$yom,$profession,$occupation,$company_name,$em_stat);

  echo "<script>alert('done')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>WOGMS </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
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
              <a href="index.php" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown active">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="users"></i><span>Members</span></a>
              <ul class="dropdown-menu">
                <li ><a class="nav-link" href="members.php">Members List</a></li>
                <li class="active"><a class="nav-link" href="addmember.php">Add member</a></li>
                
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
            <!-- Form start -->
            <form class="" method="POST" action="#">
            <div class="col-12 container col-xs-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Membership form</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" class="form-control" name="fullname" >
                  </div>
                  <div class="row">
                    <div class="form-group col-3 mr-4">
                    <label for="dob" class="d-block">Date of birth</label>
                      <input id="dob" type="date" class="form-control" data-indicator="pwindicator"
                        name="dob" >
                    </div>
                    <div class="form-group ">
                      <label>Phone Number (GH Format)</label>
                      <div class=" ">
                           <input type="tel" name="phone" id="phone" class="form-control " >
                      </div>
                    </div>
                    <div class="form-group mt-4 mr-2 row ml-3">
                      <div class="pretty p-default p-round ml-2 mt-2">
                        <input type="radio" name="gender" value="Male" >
                          <label>Male</label>
                      </div>
                      <div class="pretty p-default p-round ml-4 mt-2">
                        <input type="radio" name="gender" value="Female" >
                          <label>Female</label>
                      </div>
                    </div>
                   
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="hometown">Hometown</label>
                      <input type="text" name="hometown" id="" class="form-control" >
                    </div>
                     <div class="form-group col-6 mt-2">
                    <label for="region" class="d-block">Region</label>
                    <select name="region" id="" >
                      <option value="">Select your region</option>
                      <option value="Oti">Oti</option>
                      <option value="Bono East">Bono East</option>
                      <option value="Ahafo">Ahafo</option>
                      <option value="Bono">Bono</option>
                      <option value="North East">North East</option>
                      <option value="Savannah">Savannah</option>
                      <option value="Western">Western </option>
                      <option value="Western North">Western North</option>
                      <option value="Volta">Volta</option>
                      <option value="Eastern">Eastern</option>
                      <option value="Ashanti">Ashanti</option>
                      <option value="Central">Central</option>
                      <option value="Northern">Northern</option>
                      <option value="Upper East">Upper East</option>
                      <option value="Upper West">Upper West</option>
                    </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                    <label for="residence"> Place of Residence (Digital Address)</label>
                    <input type="text" name="residence" id="" class="form-control" >
                    </div>
                    <div class="form-group col-6">
                      <label for="phone">Email</label>
                      <input type="text" name="email" id="" class="form-control" >
                    </div>
                  </div>
                  <h5 class="font-18 ">Family Profile</h5>
                 <div class="form-group row mt-4 mb-0">
                   <div class="form-group col-8">
                      <label for="">Father's Name</label>
                       <input type="text" name="fathers_name" id="" class="form-control" >
                   </div>
                   <div class="form-group row ml-3 mt-4">
                    <div class="pretty p-default p-round ml-2 mt-2">
                      <input type="radio" name="dad_stat" value="alive" >
                        <label>Alive</label>
                    </div>
                    <div class="pretty p-default p-round ml-5 mt-2">
                      <input type="radio" name="dad_stat" value="dead" >
                        <label>Dead</label>
                    </div>
                  </div>
                 </div>
                 <div class="form-group row mb-0">
                  <div class="form-group col-8">
                     <label for="">Mother's Name</label>
                      <input type="text" name="mothers_name" id="" class="form-control" >
                  </div>
                  <div class="form-group row ml-3 mt-4">
                   <div class="pretty p-default p-round ml-2 mt-2">
                     <input type="radio" name="mom_stat" value="alive" >
                       <label>Alive</label>
                   </div>
                   <div class="pretty p-default p-round ml-5 mt-2">
                     <input type="radio" name="mom_stat" value="dead" >
                       <label>Dead</label>
                   </div>
                 </div>
                </div>
                <div class="row">
                  <div class="form-group col-7">
                  <label for="">Name of Next of Kin</label>
                  <input type="text" name="nok" id="" class="form-control" >
                </div>
                <div class="form-group col-5">
                  <label for="">Next of Kin Contact</label>
                  <input type="tel" name="nok_phone" id="" class="form-control" >
                </div>
                </div>
                <div class="row">
                  <div class="form-group col-7">
                  <label for="">Relationship to Next of Kin</label>
                  <input type="text" name="r_nok" id="" class="form-control" >
                </div>
                <div class="form-group col-5">
                  <label for="">Email of Kin Contact</label>
                  <input type="text" name="nok_email" id="" class="form-control" >
                </div>
                </div>
                <h5 class="font-18 ">Church Profile</h5>
                <div class="row mt-3">
                <div class="col-3 mr-3">
                <label for="" class="" style="font-weight: bold;">Department</label>
                    <select name="department" id="" class='form-control col-12 p-1 mr-0'>
                      <option value="">select</option>
                      <option value="Men''s Fellowship">Men's Fellowship</option>
                      <option value="Women''s Fellowship">Women's Fellowship</option>
                      <option value="Game Changers Generation">Game Changers Generation</option>
                      <option value="Tachmonites">Tachmonites</option>
                    </select>
                    </div>
                   <div class="form-group col-xs-2 mr-4">
                      <label for="">Date of Baptism</label>
                      <input type="date" name="baptism_date" id="" class="form-control" >
                    </div>

                    <div class="form-group ml-2 mr-2">
                    <label for="">Year of Membership</label>
                    <input type="number" min="1900" max="2099" step="1" name="yom" value="2021" class="form-control col-8" >
                  </div>
                    <div class="">
                    <label for="" class="font-13" style="font-weight: bold;">Are you baptised?</label>
                    <div class='row mt-1 ml-2'>
                      <div class="pretty p-default p-round mt-2">
                        <input type="radio" name="baptism" value="Yes" >
                          <label>Yes</label>
                      </div>
                      <div class="pretty p-default p-round ml-2 mt-2">
                        <input type="radio" name="baptism" value="No" >
                          <label>No</label>
                      </div>
                    </div>
                    </div>
                </div>
                <h5 class="font-18 ">Academic/Job Profile</h5>
                <div class="row mt-4">
                  <div class="form-group col-4">
                    <label for="">Profession</label>
                  <input type="text" name="profession" id=""class="form-control" >
                  </div>
                  <div class="form-group col-4">
                    <label for="">Present Occupation</label>
                    <input type="text" name="occupation" id="" class="form-control" >
                  </div>
                  <div class="form-group col-4">
                    <label for="">Name of Company/Workplace</label>
                    <input type="text" name="company_name" id="" class="form-control" >
                  </div>
                </div>
                <div class="row d-grid">
                  <h3 class="font-15 mr-2 mb-2">Employment Status</h3>
                  <div class="form-group row mt-2 col-lg-12">
                    <div class="pretty p-default p-round mt-2 mr-3">
                      <input type="radio" name="em_stat" value="Self Employed" >
                        <label>Self Employed</label>
                    </div>
                    <div class="pretty p-default p-round mt-2 mr-3">
                      <input type="radio" name="em_stat" value="Employee" >
                        <label>Employee</label>
                    </div>
                    <div class="pretty p-default p-round mt-2 mr-3">
                      <input type="radio" name="em_stat" value="Unemployed" >
                        <label>Unemployed</label>
                    </div>
                    <div class="pretty p-default p-round mt-2 mr-3">
                      <input type="radio" name="em_stat" value="Apprentice" >
                        <label>Apprentice</label>
                    </div>
                    <div class="pretty p-default p-round mt-2 mr-3">
                      <input type="radio" name="em_stat" value="Pensioneer" >
                        <label>Pensioneer</label>
                    </div>
                    <div class="pretty p-default p-round mt-2">
                      <input type="radio" name="em_stat" value="Student" >
                        <label>Student</label>
                    </div>
                  </div>
                </div>
                </div>
                <button type="submit" name="submit" class="btn btn-lg btn-primary">Submit</button>
              </div>
            </div>
          </form>
            <!-- Form End -->
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