<!--Display Transaction Type records page-->
<body>
	<div id="subtitle">
		<h2>List of Transaction Types</h2>
	</div>
	<table id="tablerecords">
    	<thead>
			<tr>
        		<th>Transaction Type ID</th>
        		<th>Transaction Desc</th>
			</tr>
		</thead>
		<?php
			/*Display each transaction type records located on the database */
			$count = 1;
			if($transaction->list_transactions() != false){
				foreach($transaction->list_transactions() as $value){
   					extract($value);
					?>
					<tbody>
      					<tr>
        					<td><?php echo $type_id;?></td>
							<!--Redirects to the profile page if clicked-->
        					<td><a href="index.php?page=transactions&subpage=profile&id=<?php echo $type_id; ?>"><?php echo $type_description;?></a></td>
						</tr>
					</tbody>
					<?php
 						$count++;
						}
			}else{
						?>
						<tr>
							<!--Display when no records were found-->
							<td colspan="3">"No Record Found."</td>
						</tr>
					<?php
			}
			?>
    	</table>

		<?php
	if ($admin->get_adm_access($admin_user) == 'Manager' || $admin->get_adm_access($admin_user) == 'Supervisor'){
		?>
		<div class="download-button">	
			<form method="POST" action="reports/xlsx-transaction-report.php?action=print">
				<button><a><i class="fa fa-download"></i> Excel</a></button>
			</form>
			<form method="POST" action="reports/pdf-user.php?action=print">
				<span><button><a><i class="fa fa-download"></i> PDF</a></button></span>
			</form>
		</div>
		<?php
	}
?>
</body>