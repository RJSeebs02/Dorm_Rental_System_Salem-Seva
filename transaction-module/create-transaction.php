<!--Displaying Transaction Type Creation Page--->
<html>
    <head>
        <title>Transaction Types</title>
    </head>
<body>
	<div id="subtitle">
        <h2>Create New Transaction</h2>
	</div>
	<div class="form-wrapper">
		<!--Process for creating a transaction type will be executed once submit button is clicked--->
		<form action="processes/process.transaction.php?action=new" method="post">
			
			<label for="type_desc">Transaction Type: </label>
			<input type="text" id="type_desc" class="text" name="type_desc" placeholder="Enter Transaction Type..." required>
			
			<input type="submit" class="button" value="SUBMIT"> <!--Button that passes parameters input to the process file--->
		</form>
	</div>
</body>
</html>