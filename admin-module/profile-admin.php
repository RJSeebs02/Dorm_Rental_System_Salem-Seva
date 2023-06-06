<!---Displays the Profile Page of the selected admin-->
<?php
if($admin->get_adm_access($admin_user) == 'Staff' && $admin_user_login != $id){
	header("location: index.php?page=admins&subpage=records");
}

if($admin->get_adm_access($admin_user) == 'Staff'){
?>

<div id="subtitle">
    <h2><?php echo $admin->get_username($id).' ';?>Profile</h2>
</div>
<div class="form-wrapper">
    <form method="POST" action="processes/process.admin.php?action=update"> <!---Executes process after clicking the update/submit button-->
        <div id="form-half">
            <label for="adm_username">Username: </label>
            <input type="text" id="adm_username" class="text" name="adm_username" value="<?php echo $admin->get_username($id)?>" disabled>
            
            <label for="adm_email">Email Address: </label>
		    <input type="text" id="adm_email" class="text" name="adm_email" value="<?php echo $admin->get_email($id);?>" placeholder="Enter Email Address..." disabled>

            <label for="adm_password">Password: </label>
		    <input type="password" id="adm_password" class="text" name="adm_password" value="<?php echo $admin->get_password($id);?>" placeholder="Enter Password..." disabled>
            
            <label for="adm_access">Access Level</label>
            <select id="adm_access" name="adm_access" disabled>
                <option value="Staff" <?php if($admin->get_adm_access($id) == "Staff"){ echo "selected";};?>>Staff</option>
                <option value="Supervisor" <?php if($admin->get_adm_access($id) == "Supervisor"){ echo "selected";};?>>Supervisor</option>
                <option value="Manager" <?php if($admin->get_adm_access($id) == "Manager"){ echo "selected";};?>>Manager</option>
            </select>

            <input type="submit" value="Update" disabled> <!--Button that passes parameters input to the process file--->
        </div>
        <div id="form-half">
            <label for="adm_fname">First Name: </label>
			<input type="text" id="adm_fname" class="text" name="adm_fname" value="<?php echo $admin->get_fname($id);?>" placeholder="Enter First Name..." disabled>
            
            <label for="adm_lname">Last Name: </label>
		    <input type="text" id="adm_lname" class="text" name="adm_lname" value="<?php echo $admin->get_lname($id);?>" placeholder="Enter Last Name..." disabled>
            
            <label for="adm_cnumber">Contact Number: </label>
		    <input type="text" id="adm_cnumber" class="text" name="adm_cnumber" value="<?php echo $admin->get_cnumber($id);?>" placeholder="Enter Contact No...." disabled>    
        </div>
    </form>
    <form method="POST" action="processes/process.admin.php?action=delete">
        <button type="submit" name="adm_username" disabled value="<?php echo $admin->get_username($id);?>"><a>Delete</a></button>
    </form> 
</div>

<?php
}else if($admin->get_adm_access($admin_user) == 'Supervisor'){
?>

<div id="subtitle">
    <h2><?php echo $admin->get_username($id).' ';?>Profile</h2>
</div>
<div class="form-wrapper">
<div id="error"></div>
    <form method="POST" action="processes/process.admin.php?action=update"> <!---Executes process after clicking the update/submit button-->
        <div id="form-half">
            <label for="adm_username">Username: </label>
            <input type="text" id="adm_username" class="text" name="adm_username" value="<?php echo $admin->get_username($id)?>" disabled>
            
            <label for="adm_email">Email Address: </label>
		    <input type="text" id="adm_email" class="text" name="adm_email" value="<?php echo $admin->get_email($id);?>" placeholder="Enter Email Address..." disabled>

            <label for="adm_password">Password: </label>
		    <input type="password" id="adm_password" class="text" name="adm_password" value="<?php echo $admin->get_password($id);?>" placeholder="Enter Password..." disabled>
            
            <label for="adm_access">Access Level</label>
            <select id="adm_access" name="adm_access" disabled>
                <option value="Staff" <?php if($admin->get_adm_access($id) == "Staff"){ echo "selected";};?>>Staff</option>
                <option value="Supervisor" <?php if($admin->get_adm_access($id) == "Supervisor"){ echo "selected";};?>>Supervisor</option>
                <option value="Manager" <?php if($admin->get_adm_access($id) == "Manager"){ echo "selected";};?>>Manager</option>
            </select>

            <input type="submit" value="Update" disabled> <!--Button that passes parameters input to the process file--->
        </div>
        <div id="form-half">
            <label for="adm_fname">First Name: </label>
			<input type="text" id="adm_fname" class="text" name="adm_fname" value="<?php echo $admin->get_fname($id);?>" placeholder="Enter First Name..." disabled>
            
            <label for="adm_lname">Last Name: </label>
		    <input type="text" id="adm_lname" class="text" name="adm_lname" value="<?php echo $admin->get_lname($id);?>" placeholder="Enter Last Name..." disabled>
            
            <label for="adm_cnumber">Contact Number: </label>
		    <input type="text" id="adm_cnumber" class="text" name="adm_cnumber" value="<?php echo $admin->get_cnumber($id);?>" placeholder="Enter Contact No...." disabled>    
        </div>
    </form>
    <form method="POST" action="processes/process.admin.php?action=delete">
        <button type="submit" name="adm_username" disabled value="<?php echo $admin->get_username($id);?>"><a>Delete</a></button>
    </form> 
</div>

<?php
}else{
?>
<script src="../javascript/script.js">

</script>
<div id="subtitle">
    <h2><?php echo $admin->get_username($id).' ';?>Profile</h2>
</div>
<div class="form-wrapper">
    <form method="POST" action="processes/process.admin.php?action=update" onsubmit="return ValidateForm()"> <!---Executes process after clicking the update/submit button-->
        <div id="form-half">
            <label for="adm_username">Username: </label>
            <input type="text" id="adm_username" class="text" name="adm_username" value="<?php echo $admin->get_username($id);?>" required>
            
            <label for="adm_email">Email Address: </label>
		    <input type="text" id="adm_email" class="text" name="adm_email" value="<?php echo $admin->get_email($id);?>" placeholder="Enter Email Address..." required>

            <label for="adm_password">Password: </label>
		    <input type="password" id="adm_password" class="text" name="adm_password" value="<?php echo $admin->get_password($id);?>" placeholder="Enter Password..." required>
            
            <label for="adm_access">Access Level</label>
            <select id="adm_access" name="adm_access">
                <option value="Staff" <?php if($admin->get_adm_access($id) == "Staff"){ echo "selected";};?>>Staff</option>
                <option value="Supervisor" <?php if($admin->get_adm_access($id) == "Supervisor"){ echo "selected";};?>>Supervisor</option>
                <option value="Manager" <?php if($admin->get_adm_access($id) == "Manager"){ echo "selected";};?>>Manager</option>
            </select>

            <input type="submit" value="UPDATE"> <!--Button that passes parameters input to the process file--->
        </div>
        <div id="form-half">
            <label for="adm_fname">First Name: </label>
			<input type="text" id="adm_fname" class="text" name="adm_fname" value="<?php echo $admin->get_fname($id);?>" placeholder="Enter First Name..." required>
            
            <label for="adm_lname">Last Name: </label>
		    <input type="text" id="adm_lname" class="text" name="adm_lname" value="<?php echo $admin->get_lname($id);?>" placeholder="Enter Last Name..." required>
            
            <label for="adm_cnumber">Contact Number: </label>
		    <input type="text" id="adm_cnumber" class="text" name="adm_cnumber" value="<?php echo $admin->get_cnumber($id);?>" placeholder="Enter Contact No...." required>    
        </div>
    </form>
    <form method="POST" action="processes/process.admin.php?action=delete">
        <button type="submit" name="adm_username" value="<?php echo $admin->get_username($id);?>"><a>Delete</a></button>
    </form> 
</div>
<?php
}
?>
