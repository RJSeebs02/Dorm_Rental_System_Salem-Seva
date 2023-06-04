<?php

include_once '../class/class.room.php';
include '../config/config.php';

$user = new Room();

header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=".date("Y-m-d")."-rooms-report.xls");

echo 'Number' . "\t" . 'Room Number' . "\t" . 'Room Type' . "\t" . 'Description' . "\t" . 'Price' . "\t" . 'Floor' . "\t" . 'Vacancy' . "\t" . 'Status' . "\n";

$count = 1;

if($user->list_rooms() != false){
    foreach($user->list_rooms() as $value){
        extract($value);              
            echo $count . "\t" . $room_number. "\t" . $room_type . "\t" . $room_desc . "\t" . $room_price . "\t" . $room_floor . "\t" . $room_vacancy . "\t" . $room_status . "\n";
            
                $count++;
    }
}
?>