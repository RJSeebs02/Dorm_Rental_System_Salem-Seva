<!--Display admin records page-->
<body>
	<a><span class="right">Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)"></span></a>
	<span id="search-result">
	<div id="subtitle">
		<h2>List of Admins</h2>
	</div>
	<table id="tablerecords">
    	<thead>
        	<tr>

				<th>Admin Username</th>
        		<th>Admin Email</th>
        		<th>Admin Name</th>
				<th>Contact Number</th>
				<th>Access Level</th>
			</tr>
		</thead>
		<?php
			/*Display each admin records located on the database */
			$count = 1;
			if($admin->list_admins() != false){
				foreach($admin->list_admins() as $value){
   					extract($value);
					?>
					<tbody>
      					<tr>
	
							<!--Redirects to the profile page if clicked-->
        					<td><a href="index.php?page=admins&subpage=profile&id=<?php echo $adm_username ?>"><?php echo $adm_username;?></td>
							<td><?php echo $adm_email;?></td>
        					<td><?php echo $adm_fname.' '.$adm_lname;?></a></td>
							<td><?php echo $adm_cnumber;?></td>
							<td><?php echo $adm_access;?></td>
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
	

	<?php
	if ($admin->get_adm_access($admin_user) == 'Manager' || $admin->get_adm_access($admin_user) == 'Supervisor'){
		?>
		<div class="download-button">	
			<form method="POST" action="reports/xlsx-admin-report.php">
				<button><a><i class="fa fa-download"></i> Excel</a></button>
			</form>
			<form method="POST" action="reports/pdf-admin.php">
				<span><button><a><i class="fa fa-download"></i> PDF</a></button></span>
			</form>
		</div>
		<?php
	}
?>

</body>