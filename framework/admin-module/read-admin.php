<!--Display admin records page-->
<body>
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
				<th>Access</th>
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
        					<td><a href="index.php?page=admins&subpage=profile&id=<?php echo $adm_username; ?>"><?php echo $adm_username;?></td>
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
</body>