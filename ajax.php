<?php
require_once 'dbcon.php';
$db = new DB();


if(isset($_POST['name'])){
    $data = $db->viewOne($_POST['name']);
    print_r(json_encode($data));
  }

  if(isset($_POST['display'])){
    $data = $db->viewOffertory();
    print_r(json_encode($data));
  }

  if(isset($_POST['expense'])){
    $data = $db->viewExpenses();
    print_r(json_encode($data));
    // echo 'show them all';
  }

  if(isset($_POST['members'])){
    $data = $db->viewMembers();
    print_r(json_encode($data));
  }

  if(isset($_POST['member'])){
    $data = $db->viewRecords($_POST['member']);
    print_r(json_encode($data));
  }

  if(isset($_POST['gcmember'])){
    $data = $db->viewGCmdues($_POST['gcmember']);
    print_r(json_encode($data));
  }

  if(isset($_POST['amember']) && isset($_POST['amount'])){
    $db->insertrecord($_POST['amember'],$_POST['amount']);
  }

  if(isset($_POST['gcmember']) && isset($_POST['amount'])){
    $db->insertGCdues($_POST['gcmember'],$_POST['amount']);
  }

  if(isset($_POST['sum'])){
    $data = $db->totalMonth();
    print_r(json_encode($data));
  }

  if(isset($_POST['gc_search'])){
    $data = $db->searchData($_POST['gc_search']);
    print_r(json_encode($data));
  }

  if(isset($_POST['search'])){
    $data = $db->searchData($_POST['search']);
    print_r(json_encode($data));
  }

  if(isset($_POST['show'])){
    $data = $db->viewMembers();
    print_r(json_encode($data));
  }

  if(isset($_POST['welmember'])){
    $data = $db->viewMemberRecords($_POST['welmember']);
    print_r(json_encode($data));
  }

  if(isset($_POST['gc_d'])){
    $data = $db->viewGCRecords();
    print_r(json_encode($data));
  }

  if(isset($_POST['monthone']) && isset($_POST['monthtwo'])){
    $db->insertWelfare($_POST['month'],$_POST['year'],$_POST['memins'],$_POST['welamount']);
  }

  if(isset($_POST['memberstotal'])){
    $data= $db->viewTotalMembers();
    print_r(json_encode($data));
  }

  if(isset($_POST['offertorysum'])){
    $data = $db->Offertorysum();
    print_r(json_encode($data));
  }

  if(isset($_POST['totaltithe'])){
    $data = $db->totalTithe();
    print_r(json_encode($data));
  }

  if(isset($_POST['totalwelfare'])){
    $data = $db->totalwelfare();
    print_r(json_encode($data));
  }

  if(isset($_POST['totalbal'])){
    $data = $db->totalbal();
    print_r(json_encode($data));
  }

  if(isset($_POST['offertorychart'])){
    $data = $db->offertorymonths();
    print_r(json_encode($data));
  }

  if(isset($_POST['tithechart'])){
    $data = $db->tithemonths();
    print_r(json_encode($data));
  }

  if(isset($_POST['username']) && isset($_POST['password'])){
    $data = $db->login($_POST['username'],$_POST['password']);
    // print_r(json_encode($data));
    echo $data;
  }
  
?>