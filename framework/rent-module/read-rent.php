<!--Display Customers records page-->
<body>
	<div id="subtitle">
        <h2>List of Rents</h2>
	</div>
	<table id="tablerecords">
    	<thead>
            <tr>
        		<th>Rent ID</th>
        		<th>Name</th>
				<th>Email</th>
                <th>Home Address</th>
                <th>Contact Number</th>
        		<th>Room No.</th>
                <th>Transaction Type</th>
				<th>Operation</th>
            </tr>
        </thead>
		<?php
			/*Display each rent records located on the database */
			$count = 1;
			if($rent->list_rent() != false){
				foreach($rent->list_rent() as $value) {
                    extract($value);
					?>
					<tbody>
						<tr>
        					<td><?php echo $rent->get_rent_id($rent_id);?></td>
							<!--Redirects to the profile page if clicked-->
        					<td><a href="index.php?page=customers&subpage=profile&id=<?php echo $cust_id; ?>"><?php echo $rent->get_cust_fname($cust_id).' '.$rent->get_cust_mname($cust_id).' '.$rent->get_cust_lname($cust_id); ?></td>
        					<td><?php echo $rent->get_cust_email($cust_id);?></td>
							<td><?php echo $rent->get_cust_address($cust_id);?></td>
        					<td><?php echo $rent->get_cust_cnumber($cust_id)?></td>	
							<td><?php echo $rent->get_room_number($room_id);?></td>
							<td><?php echo $rent->get_transaction_type_description($type_id);?></td>
							<td><form action="processes/process.rent.php?action=cancel" method="POST">
								<input type="hidden" name="rent_id" value="<?php echo $rent_id;?>">
								<input type="submit" value="Withdraw">
       						</form>
							<td>
						</tr>
					</tbody>
					<?php
 					    $count++;
					    }
                        }
                        
					else{
							?>
							<tr>
								<!--Display when no records were found-->
								<td colspan="7">"No Record Found."</td>
							</tr>
						<?php
					}
					?>
    </table>
</body>