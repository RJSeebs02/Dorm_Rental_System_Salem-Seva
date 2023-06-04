<?php

include_once '../class/class.transaction.php';
include '../config/config.php';

$transaction = new Transaction();

header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=".date("Y-m-d")."-transaction type-report.xls");

echo 'Number' . "\t" . 'Transaction Description' . "\n";

$count = 1;

if($transaction->list_transactions() != false){
    foreach($transaction->list_transactions() as $value){
        extract($value);              
            echo $count . "\t" . $type_description. "\n";
            
                $count++;
    }
}
?>