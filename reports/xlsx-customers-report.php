<?php

include_once '../class/class.customer.php';
include '../config/config.php';

$customer = new Customer();

header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=".date("Y-m-d")."-customer-report.xls");

echo 'Number' . "\t" . 'Customer Name' . "\t" . 'E-mail' . "\t" . 'Address' . "\t" . 'Contact Number' . "\t" . 'Customer Status' . "\n";

$count = 1;

if($customer->list_customers() != false){
    foreach($customer->list_customers() as $value){
        extract($value);              
            echo $count . "\t" . $cust_fname . ' ' . $cust_mname . ' ' . $cust_lname . "\t" . $cust_email . "\t" . $cust_address . "\t" . $cust_cnumber . "\t" . $cust_status . "\n";
            
                $count++;
    }
}
?>