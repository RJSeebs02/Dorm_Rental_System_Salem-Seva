<?php

include_once '../class/class.admin.php';
include '../config/config.php';

$user = new Admin();

header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=".date("Y-m-d")."-admin-report.xls");

echo 'Number' . "\t" . 'Username' . "\t" . 'E-mail' . "\t" . 'Name' . "\t" . 'Contact Number' . "\t" . 'Access Level' . "\n";

$count = 1;

if($user->list_admins() != false){
    foreach($user->list_admins() as $value){
        extract($value);              
            echo $count . "\t" . $adm_username. "\t" . $adm_email . "\t" . $adm_fname." ".$adm_lname . "\t" . $adm_cnumber . "\t" . $adm_access . "\n";
            
                $count++;
    }
}
?>