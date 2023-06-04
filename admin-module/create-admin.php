<!--Displaying Admin Creation Page--->
<html>
    <head>
        <title>Admin</title>
    </head>
	<script src="javascript/script.js">

	</script>
<body>
	<div id="subtitle">
        <h2>Create New Admin</h2>
	</div>
	<div class="form-wrapper">
		<!--Process for creating an admin will be executed once submit button is clicked--->
		<form action="processes/process.admin.php?action=new" method="post" onsubmit="return ValidateForm()">
			<div id="form-half">
				<label for="adm_username">Username: </label>
				<input type="text" id="adm_username" class="text" name="adm_username" placeholder="Enter Username..." required>

				<label for="adm_email">Email Address: </label>
		    	<input type="email" id="adm_email" class="text" name="adm_email" placeholder="Enter Email Address..." required>

				<label for="adm_password">Password: </label>
		    	<input type="password" id="adm_password" class="text" name="adm_password" placeholder="Enter Password..." required>

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

<!-- <script>
    
	function ValidateForm() {
        // Retrieve the form inputs
        var userName = document.getElementById('adm_username').value;
        var contactNum = document.getElementById('adm_cnumber').value;
        var userPass = document.getElementById('adm_password').value;

        // Regular expression patterns
        var namePattern = /^[a-zA-Z0-9 ]+$/; // Only alphabets,numbers, and spaces allowed
        var contactPattern = /^\d{10}$/; // Exactly 10 digits allowed
        var passPattern = /^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/; // Should include special characters, numbers, Capital letters, minimum of 8 characters and maximum of 20 characters

        // Validate Full Name
        if (!namePattern.test(userName)) {
            alert('Please enter a valid Full Name (Only Alphabets and Numbers are allowed!).');
            return false;
        }

        // Validate Contact Number
        if (!contactPattern.test(contactNum)) {
            alert('Please enter a valid Contact Number (exactly 10 digits are allowed).');
            return false;
        }

        //Validate Password
        if (!passPattern.test(userPass)) {
            alert('Password does not meet the Requirements');
            return false;
        }

        return true; // Allow form submission
}
   
</script> -->

</html>
