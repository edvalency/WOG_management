<?php

require_once "dbcon.php";

$db = new DB();

$show = $db->offertorysum();
echo $show;
// foreach ($show as $val){
//     print_r($val['amount']);
// }

?>