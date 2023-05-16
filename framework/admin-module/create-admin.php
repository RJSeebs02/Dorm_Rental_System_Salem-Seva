<!--Displaying Admin Creation Page--->
<html>
    <head>
        <title>Admin</title>
    </head>
<body>
	<div id="subtitle">
        <h2>Create New Admin</h2>
	</div>
	<div class="form-wrapper">
		<!--Process for creating an admin will be executed once submit button is clicked--->
		<form action="processes/process.admin.php?action=new" method="post">
			<div id="form-half">
				<label for="adm_username">Username: </label>
				<input type="text" id="adm_username" class="text" name="adm_username" placeholder="Enter Username..." required>

				<label for="adm_email">Email Address: </label>
		    	<input type="email" id="adm_email" class="text" name="adm_email" placeholder="Enter Email Address..." required>

				<label for="adm_password">Password: </label>
		    	<input type="text" id="adm_password" class="text" name="adm_password" placeholder="Enter Password..." required>

				<label for="adm_access">Access Level</label>
            	<select id="adm_access" name="adm_access">
              		<option value="Staff">Staff</option>
              		<option value="Supervisor">Supervisor</option>
              		<option value="Manager">Manager</option>
            	</select>

				<input type="submit" class="button" value="SUBMIT"> <!--Button that passes parameters input to the process file--->
			</div>
			<div id="form-half">
				<label for="adm_fname">First Name: </label>
				<input type="text" id="adm_fname" class="text" name="adm_fname" placeholder="Enter First Name..." required>
				
				<label for="adm_lname">Last Name: </label>
				<input type="text" id="adm_lname" class="text" name="adm_lname" placeholder="Enter Last Name..." required>
				
				<label for="adm_cnumber">Contact Number: </label>
				<input type="text" id="adm_cnumber" class="text" name="adm_cnumber" placeholder="Enter Contact Number..." required>
			</div>
		<form>
    </div>
</body>
</html>