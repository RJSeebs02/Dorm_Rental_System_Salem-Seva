<?php
include_once '../class/class.rent.php';

$rent = new Rent();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint='<div id="subtitle">
<h2>List of Rents</h2>
</div>
<table id="tablerecords">
<thead>
    <tr>
        <th>Rent ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Home Address</th>
        <th>Contact Number</th>
        <th>Room No.</th>
        <th>Transaction Type</th>
        <th>Date Added</th>
    </tr>
</thead>';
$data = $rent->list_customer_search($q);
if($data != false){
    foreach($data as $value){
        extract($value);

        $hint .= '
        <tbody>
        <tr>
          <td><a href="index.php?page=rent&subpage=profile&id='.$rent_id.'">'.$rent_id.'</a></td>
          <td>'.$cust_fname.' '.$cust_mname.' '.$cust_lname.'</td>
          <td>'.$cust_email.'</td>
          <td>'.$cust_address.'</td>
          <td>'.$cust_cnumber.'</td>
          <td>'.$room_number.'</td>
          <td>'.$type_description.'</td>
          <td>'.$date_added.'</td>
        </tr>
        </tbody>';
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>
