<!---Displays the Profile Page of the selected rent-->

<div id="subtitle">
    <h2>Rent ID No. <?php echo $rent->get_rent_id($id);?></h2>
</div>
<div class="form-wrapper">
    <form method="POST" action="processes/process.room.php?action=update"> <!--Process for updating a room will be executed once submit button is clicked--->
        <div id="form-half">
            <label for="cust_name">Customer Name: </label>
            <input type="text" id="cust_name" class="text" name="cust_name" value="<?php echo $rent->get_cust_fname_display($id).' '.$rent->get_cust_mname_display($id).' '.$rent->get_cust_lname_display($id); ?>" readonly>
            
            <label for="room_number">Room Number: </label>
			<input type="text" id="room_number" class="text" name="room_number" value="<?php echo $rent->get_room_number_display($id);?>" readonly>
            
            <label for="t_type">Transaction Type: </label>
		    <input type="text" id="t_type" class="text" name="t_type" value="<?php echo $rent->get_transaction_type_description_display($id);?>" readonly>

            <label for="date_added">Date Added: </label>
		    <input type="text" id="date_added" class="text" name="date_added" value="<?php echo $rent->get_date_added($id);?>" readonly>
        
        </div>
        <div id="form-half">
            <label for="cust_email">Customer Email: </label>
		    <input type="text" id="cust_email" class="text" name="cust_email" value="<?php echo $rent->get_cust_email_display($id);?>" readonly>

            <label for="cust_cnumber">Contact Number: </label>
		    <input type="text" id="cust_cnumber" class="text" name="cust_cnumber" value="<?php echo $rent->get_cust_cnumber_display($id);?>" readonly>
        
            <label for="cust_address">Customer Address: </label>
		    <input type="text" id="cust_address" class="text" name="cust_address" value="<?php echo $rent->get_cust_address_display($id);?>" readonly>

		    <input type="hidden" id="rent_id" class="text" name="rent_id" value="<?php echo $rent->get_rent_id($id);?>" readonly>        
        </div>
    </form>
    <form method="POST" action="processes/process.rent.php?action=cancel">
        <button type="submit" name="rent_id" value="<?php echo $rent->get_rent_id($id);?>"><a>Delete</a></button>
    </form> 
</div>