<?php
require_once "dbcon.php";

$db = new DB();

$data = $db->months();
// print_r($data);
$jan = 0;
$feb = 0;
$mar = 0;

foreach($data as $offer){
    $splt = explode("/",$offer["date"]);
    if($splt[1] == "01"){
        $jan += $offer['amount'];
    }elseif($splt[1] == "02"){
        $feb += $offer['amount'];
    }
}

echo $jan;
echo "<br>";
echo $feb;


// print_r(gettype($data[0]['amount']));
// // $sum = 0;
// foreach($data as $ent){
//   print_r((int)$ent['amount']);
//   $amoumt = (int)$ent['amount'];
//   $sum += $amoumt;
//   echo "total: "+ $sum;
// }



?>