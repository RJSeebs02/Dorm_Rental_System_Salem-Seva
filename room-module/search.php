<?php
include_once '../class/class.room.php';

$users = new Room();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint='<div id="subtitle">
<h2>List of Rooms</h2>
</div>
<table id="tablerecords">
<thead>
    <tr>
        <th>Room ID</th>
        <th>Room No.</th>
        <th>Room Type</th>
        <th>Room Description</th>
        <th>Room Price</th>
        <th>Room Floor</th>
        <th>Room Vacancy</th>
        <th>Room Status</th>
        <th>Operation</th>
    </tr>
</thead>';
$data = $users->list_room_search($q);
if($data != false){
    foreach($data as $value){
        extract($value);

        $hint .= '
        <tbody>
      					<tr>
        					<td>'.$room_id.'</td>
							<!--Redirects to the profile page if clicked-->
        					<td><a href="index.php?page=rooms&subpage=profile&id='.$room_id.'">'.$room_number.'</a></td>
        					<td>'.$room_type.'</td>
							<td>'.$room_desc.'</td>
        					<td>Php '.$room_price.'</td>
							<td>'.$room_floor.'</td>
							<td>'.$room_vacancy.'</td>
							<td>'.$room_status.'</td>
							<td><form action="processes/process.room.php?action=delete" method="POST">
								<input type="hidden" name="room_id" value="'.$room_id.'">
								<input type="submit" value="Delete">
       						</form></td>
						</tr>
					</tbody>';
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>
