<!---Displays the Profile Page of the selected room-->
<?php
if($admin->get_adm_access($admin_user) == 'Staff'){
?>

<div id="subtitle">
    <h2>Room No. <?php echo $room->get_room_number($id).' ';?>Profile</h2>
</div>
<div class="form-wrapper">
    <form method="POST" action="processes/process.room.php?action=update"> <!--Process for updating a room will be executed once submit button is clicked--->
        <div id="form-half">
            <label for="room_id">Room ID: </label>
            <input type="text" id="room_id" class="text" name="room_id" value="<?php echo $room->get_room_id($id);?>" disabled>
            
            <label for="room_number">Room Number: </label>
			<input type="text" id="room_number" class="text" name="room_number" value="<?php echo $room->get_room_number($id);?>" placeholder="Enter Room No...." disabled>
            
            <label for="room_type">Room Type: </label>
		    <input type="text" id="room_type" class="text" name="room_type" value="<?php echo $room->get_room_type($id);?>" placeholder="Enter Room Type..." disabled>

            <label for="room_desc">Description: </label>
		    <input type="text" id="room_desc" class="text" name="room_desc" value="<?php echo $room->get_room_desc($id);?>" placeholder="Enter Description..." disabled>
        
            <input type="submit" disabled value="Update"> <!--Button that passes parameters input to the process file--->
        </div>
        <div id="form-half">
            <label for="room_floor">Room Floor: </label>
		    <input type="text" id="room_floor" class="text" name="room_floor" value="<?php echo $room->get_room_floor($id);?>" placeholder="Enter Room Floor..." disabled>

            <label for="room_price">Room Price: </label>
		    <input type="text" id="room_price" class="text" name="room_price" value="<?php echo $room->get_room_price($id);?>" placeholder="Enter Room Price..." disabled>
        
            <label for="room_vacancy">Room Vacancy: </label>
		    <input type="text" id="room_vacancy" class="text" name="room_vacancy" value="<?php echo $room->get_room_vacancy($id);?>" placeholder="Enter Room Slot..." disabled>

		    <input type="hidden" id="room_status" class="text" name="room_status" value="<?php echo $room->get_room_status($id);?>" placeholder="Enter Room Status..." disabled>        
        </div>
    </form>
    <form method="POST" action="processes/process.room.php?action=delete">
        <button type="submit" name="room_id" disabled value="<?php echo $room->get_room_id($id);?>"><a>Delete</a></button>
    </form> 
</div>

<?php
}else{
?>

<div id="subtitle">
    <h2>Room No. <?php echo $room->get_room_number($id).' ';?>Profile</h2>
</div>
<div class="form-wrapper">
    <form method="POST" action="processes/process.room.php?action=update"> <!--Process for updating a room will be executed once submit button is clicked--->
        <div id="form-half">
            <label for="room_id">Room ID: </label>
            <input type="text" id="room_id" class="text" name="room_id" value="<?php echo $room->get_room_id($id);?>" readonly>
            
            <label for="room_number">Room Number: </label>
			<input type="text" id="room_number" class="text" name="room_number" value="<?php echo $room->get_room_number($id);?>" placeholder="Enter Room No...." required>
            
            <label for="room_type">Room Type: </label>
		    <input type="text" id="room_type" class="text" name="room_type" value="<?php echo $room->get_room_type($id);?>" placeholder="Enter Room Type..." required>

            <label for="room_desc">Description: </label>
		    <input type="text" id="room_desc" class="text" name="room_desc" value="<?php echo $room->get_room_desc($id);?>" placeholder="Enter Description..." required>
        
            <input type="submit" value="Update"> <!--Button that passes parameters input to the process file--->
        </div>
        <div id="form-half">
            <label for="room_floor">Room Floor: </label>
		    <input type="text" id="room_floor" class="text" name="room_floor" value="<?php echo $room->get_room_floor($id);?>" placeholder="Enter Room Floor..." required>

            <label for="room_price">Room Price: </label>
		    <input type="text" id="room_price" class="text" name="room_price" value="<?php echo $room->get_room_price($id);?>" placeholder="Enter Room Price..." required>
        
            <label for="room_vacancy">Room Vacancy: </label>
		    <input type="text" id="room_vacancy" class="text" name="room_vacancy" value="<?php echo $room->get_room_vacancy($id);?>" placeholder="Enter Room Slot..." required>

		    <input type="hidden" id="room_status" class="text" name="room_status" value="<?php echo $room->get_room_status($id);?>" placeholder="Enter Room Status..." readonly>        
        </div>
    </form>
    <form method="POST" action="processes/process.room.php?action=delete">
        <button type="submit" name="room_id" value="<?php echo $room->get_room_id($id);?>"><a>Delete</a></button>
    </form> 
</div>

<?php
}
?>