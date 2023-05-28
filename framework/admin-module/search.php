<?php
include_once '../class/class.admin.php';

$users = new Admin();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint='<div id="subtitle">
<h2>List of Admins</h2>
</div>
<table id="tablerecords">
<thead>
    <tr>
        <th>Admin Username</th>
        <th>Admin Email</th>
        <th>Admin Name</th>
        <th>Contact Number</th>
        <th>Access Level</th>
    </tr>
</thead>';
$data = $users->list_admin_search($q);
if($data != false){
    foreach($data as $value){
        extract($value);

        $hint .= '
        <tbody>
      					<tr>
        					<td><a href="index.php?page=admins&subpage=profile&id='.$adm_username.'">'.$adm_username.'</td>
							<td>'.$adm_email.'</td>
        					<td>'.$adm_fname.''.' '.''.$adm_lname.'</a></td>
							<td>'.$adm_cnumber.'</td>
                            <td>'.$adm_access.'</td>
						</tr>
					</tbody>';
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>
