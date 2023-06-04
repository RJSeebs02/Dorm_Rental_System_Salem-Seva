<!--Display Customers records page-->
<body>
	<a><span class="right">Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)"></span></a>
	<span id="search-result">
	<div id="subtitle">
		<h2>List of Customers</h2>
		<?php
	if ($admin->get_adm_access($admin_user) == 'Manager' || $admin->get_adm_access($admin_user) == 'Supervisor'){
		?>
		<div class="download-button">	
			<form method="POST" action="reports/xlsx-customers-report.php">
				<button><a><i class="fa fa-download"></i> Excel</a></button>
			</form>
			<form method="POST" action="reports/pdf-customers.php">
				<span><button><a><i class="fa fa-download"></i> PDF</a></button></span>
			</form>
		</div>
		<?php
	}
?>
	</div>
	<table id="tablerecords">
    	<thead>
			<tr>
        		<th>Customer ID</th>
        		<th>Name</th>
        		<th>Email Address</th>
        		<th>Home Address</th>
				<th>Contact Number</th>
				<th>Status</th>
			</tr>
		</thead>
		<?php
			/*Display each customer records located on the database */
			$count = 1;
			if($customer->list_customers() != false){
				foreach($customer->list_customers() as $value){
   					extract($value);
					?>
					<tbody>
      					<tr>
        					<td><?php echo $cust_id;?></td>
							<!--Redirects to the profile page if clicked-->
        					<td><a href="index.php?page=customers&subpage=profile&id=<?php echo $cust_id; ?>"><?php echo $cust_fname.' '.$cust_mname.' '.$cust_lname; ?></td>
        					<td><?php echo $cust_email;?></td>
        					<td><?php echo $cust_address;?></td>
							<td><?php echo $cust_cnumber;?></td>
							<td><?php echo $cust_status;?></td>
						</tr>
					</tbody>
					<?php
 						$count++;
						}
			}else{
						?>
						<tr>
							<!--Display when no records were found-->
							<td colspan="7">"No Record Found."</td>
						</tr>
					<?php
			}
			?>
    </table>

</span>
</body>