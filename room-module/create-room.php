<!--Displaying Room Creation Page--->
<html>
    <head>
        <title>Room</title>
    </head>
	<script src="javascript/script.js"></script>
<body>
	<div id="subtitle">
        <h2>Create New Room</h2>
	</div>
	<div class="form-wrapper">
		<!--Process for creating a room will be executed once submit button is clicked--->
		<form action="processes/process.room.php?action=new" method="post" onsubmit="return ValidateFormRoom()">
			<div id="form-half">
				<label for="room_number">Room Number: </label>
				<input type="text" id="room_number" class="text" name="room_number" placeholder="Enter Room Number..." required>
				
				<label for="room_type">Room Type: </label>
		    	<input type="text" id="room_type" class="text" name="room_type" placeholder="Enter Room Type..." required>
			
				<label for="room_desc">Description: </label>
				<input type="text" id="room_desc" class="text" name="room_desc" placeholder="Add Description..." required>
			
				<input type="submit" class="button" value="SUBMIT"> <!--Button that passes parameters input to the process file--->
			</div>
			<div id="form-half">
				<label for="room_floor">Room Floor: </label>
				<input type="text" id="room_floor" class="text" name="room_floor" placeholder="Enter Room Floor..." required>
					
				<label for="room_price">Price: </label>
				<input type="text" id="room_price" class="text" name="room_price" placeholder="Enter Price..." required>

				<label for="room_vacancy">Room Vacancy: </label>
		    	<input type="text" id="room_vacancy" class="text" name="room_vacancy" placeholder="Enter Room Slot..." required>

		    	<input type="hidden" id="room_status" value="Available" class="text" name="room_status" placeholder="Enter Room Status..." readonly>
			</div>
		</form>
    </div>
</body>
</html>