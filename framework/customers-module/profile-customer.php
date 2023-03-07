<!---Displays the Profile Page of the selected customer-->
<div id="subtitle">
    <h2><?php echo $customer->get_cust_fname($id).' '.$customer->get_cust_lname($id).' ';?>Profile</h2>
</div>
<div class="form-wrapper">
    <form method="POST" action="processes/process.customer.php?action=update"> <!--Process for updating a customer will be executed once submit button is clicked--->
        <div id="form-half">
            <label for="cust_id">Customer ID: </label>
            <input type="text" id="cust_id" class="text" name="cust_id" value="<?php echo $customer->get_cust_id($id);?>" readonly>
            
            <label for="cust_fname">First Name: </label>
			<input type="text" id="cust_fname" class="text" name="cust_fname" value="<?php echo $customer->get_cust_fname($id);?>" placeholder="Enter First Name..." required>

            <label for="cust_mname">Middle Name: </label>
		    <input type="text" id="cust_mname" class="text" name="cust_mname" value="<?php echo $customer->get_cust_mname($id);?>" placeholder="Enter Middle Name..." required>
            
            <label for="cust_lname">Last Name: </label>
		    <input type="text" id="cust_lname" class="text" name="cust_lname" value="<?php echo $customer->get_cust_lname($id);?>" placeholder="Enter Last Name..." required>

            <input type="submit" class="button" value="SUBMIT"> <!--Button that passes parameters input to the process file--->
        </div>
        <div id="form-half">
            <label for="cust_email">Email Address: </label>
		    <input type="email" id="cust_email" class="text" name="cust_email" value="<?php echo $customer->get_cust_email($id);?>" placeholder="Enter Email Address..." required>
   
            <label for="cust_address">Home Address: </label>
		    <input type="text" id="cust_address" class="text" name="cust_address" value="<?php echo $customer->get_cust_address($id);?>" placeholder="Enter Home Address..." required>
            
            <label for="cust_cnumber">Contact No.: </label>
		    <input type="text" id="cust_cnumber" class="text" name="cust_cnumber" value="<?php echo $customer->get_cust_cnumber($id);?>" placeholder="Enter Contact No...." required>
        
            <input type="hidden" id="cust_status" class="text" name="cust_status" value="<?php echo $customer->get_cust_status($id);?>" placeholder="Enter Cust Status..." readonly>        
        </div>
    </form>   
</div>

