<?php
include_once '../class/class.customer.php';

$users = new Customer();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint='<div id="subtitle">
<h2>List of Customers</h2>
</div>
<table id="tablerecords">
<thead>
    <tr>
        <th>Customer ID</th>
        <th>Name</th>
        <th>Email Address</th>
        <th>Home Address</th>
        <th>Contact Number</th>
        <th>Status</th>
        <th>Operation</th>
    </tr>
</thead>';
$data = $users->list_customer_search($q);
if($data != false){
    foreach($data as $value){
        extract($value);

        $hint .= '
        <tbody>
        <tr>
          <td>'.$cust_id.'</td>
          <td><a href="index.php?page=customers&subpage=profile&id='.$cust_id.'">'.$cust_fname.' '.$cust_mname.' '.$cust_lname.'</a></td>
          <td>'.$cust_email.'</td>
          <td>'.$cust_address.'</td>
          <td>'.$cust_cnumber.'</td>
          <td>'.$cust_status.'</td>
          <td>
              <form action="processes/process.customer.php?action=delete" method="POST">
                  <input type="hidden" name="cust_id" value="'.$cust_id.'">
                  <input type="submit" value="Delete">
              </form>
          </td>
        </tr>
        </tbody>';
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>
