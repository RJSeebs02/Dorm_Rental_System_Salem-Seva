<?php

include_once '../class/class.rent.php';
include '../config/config.php';

$rent = new Rent();

header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=".date("Y-m-d")."-rent-report.xls");

echo 'Number' . "\t" . 'Name' . "\t" . 'E-mail' . "\t" . 'Home Address' . "\t" . 'Contact Number' . "\t" . 'Room Number' . "\t" . 'Transaction Type' ."\n";

$count = 1;

if($rent->list_rent() != false){
    foreach($rent->list_rent() as $value){
        extract($value);              
            echo $count . "\t" . $rent->get_cust_fname($cust_id).' '.$rent->get_cust_mname($cust_id).' '.$rent->get_cust_lname($cust_id). "\t" . $rent->get_cust_email($cust_id) . "\t" . $rent->get_cust_address($cust_id) . "\t" . $rent->get_cust_cnumber($cust_id) . "\t" . $rent->get_room_number($room_id) . "\t" . $rent->get_transaction_type_description($type_id) . "\n";
            
                $count++;
    }
}
?>