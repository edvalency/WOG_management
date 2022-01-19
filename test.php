<?php
require_once "dbcon.php";

$db = new DB();

$data = $db->viewOffertory();
// $sum = 0;
foreach($data as $ent){
  print_r((int)$ent['amount']);
  $amoumt = (int)$ent['amount'];
  $sum += $amoumt;
  echo "total: "+ $sum;
}



?>