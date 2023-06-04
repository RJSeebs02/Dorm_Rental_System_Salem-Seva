<!---Displays the Profile Page of the selected transaction type-->
<?php
if($admin->get_adm_access($admin_user) == 'Staff'){
?>

<div id="subtitle">
    <h2><?php echo $transaction->get_transaction_desc($id).' ';?>Transaction Type Profile</h2>
</div>
<html>
    <head>
        <title>Transaction Types</title>
    </head>
<body>
	<div class="form-wrapper">
		<form method="POST" action="processes/process.transaction.php?action=update"> <!--Process for updating a transaction type will be executed once submit button is clicked--->
		<div id="form-half">	
			<label for="type_id">Transaction Type ID: </label>
            <input type="text" id="type_id" class="text" name="type_id" value="<?php echo $transaction->get_transaction_id($id);?>" disabled>

			<label for="type_description">Transaction Type: </label>
			<input type="text" id="type_description" class="text" name="type_description" value="<?php echo $transaction->get_transaction_desc($id);?>" placeholder="Enter Transaction Type..." disabled>
			
			<input type="submit" class="button" disabled value="SUBMIT"> <!--Button that passes parameters input to the process file--->
		</div>
		</form>
		<form method="POST" action="processes/process.transaction.php?action=delete">
        <button type="submit" name="type_id" disabled value="<?php echo $transaction->get_transaction_id($id);?>"><a>Delete</a></button>
    </form>
	</div>
</body>
</html>

<?php
}else{
?>

<div id="subtitle">
    <h2><?php echo $transaction->get_transaction_desc($id).' ';?>Transaction Type Profile</h2>
</div>
<html>
    <head>
        <title>Transaction Types</title>
    </head>
<body>
	<div class="form-wrapper">
		<form method="POST" action="processes/process.transaction.php?action=update"> <!--Process for updating a transaction type will be executed once submit button is clicked--->
		<div id="form-half">	
			<label for="type_id">Transaction Type ID: </label>
            <input type="text" id="type_id" class="text" name="type_id" value="<?php echo $transaction->get_transaction_id($id);?>" readonly>

			<label for="type_description">Transaction Type: </label>
			<input type="text" id="type_description" class="text" name="type_description" value="<?php echo $transaction->get_transaction_desc($id);?>" placeholder="Enter Transaction Type..." required>
			
			<input type="submit" class="button" value="SUBMIT"> <!--Button that passes parameters input to the process file--->
		</div>
		</form>
		<form method="POST" action="processes/process.transaction.php?action=delete">
        <button type="submit" name="type_id" value="<?php echo $transaction->get_transaction_id($id);?>"><a>Delete</a></button>
    </form>
	</div>
</body>
</html>

<?php
}
?>