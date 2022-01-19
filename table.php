<?php
require_once 'dbcon.php';
$db = new DB();

$db->insertWelfare("October","Edwin Ofosuhene","10");
// $months = array("","January", "February", "March","April", "May","June","July",
// "August","September","October","November","December");

// $mfrom = array_keys($months,$_POST['monthfrom']);
// $mto = array_keys($months,$_POST['monthto']);
// $yearfrm = $_POST['yearfrm'];
// $yearto = $_POST['yearto'];


// $lst = (int)$mto[0];
// $frst = (int)$mfrom[0];
// if($frst>$lst){
//   $subtract = $frst-$lst;
// }else{
//   $subtract = $lst-$frst;
// }

// $counter = $frst;
// for($i = 0; $i<=$subtract;$i++){
//   // if($i == $subtract+1){
//   //   break;
//   // }else{
//     // if($counter == 13){
//     //   $counter = 1;
//     // }
//     print_r($months[$counter]. $year);
//     // $db->insertWelfare($months[$counter],$_POST['yearfrm'],"Edwin Ofosuhene","10");
//     echo "<br>";
//     $counter +=1;
//   // }
  
// }


?>