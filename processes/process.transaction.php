<?php
/*Include Transaction Class File */
include '../class/class.transaction.php';

/*Parameters for switch case*/
$action = isset($_GET['action']) ? $_GET['action'] : '';

/*Switch case for actions in the process */
switch($action){
	case 'new':
        create_new_transaction_type();
	break;
    case 'update':
        update_transaction_type();
	break;
    case 'delete':
        delete_transaction_type();
    break;
}

/*Main Function Process for creating a transaction type */
function create_new_transaction_type(){
    $transaction = new Transaction();
    /*Receives the parameters passed from the creation page form */
    $desc = $_POST['type_desc'];

    /*Passes the parameters to the class function */
    $result = $transaction->new_transaction($desc);
    if($result){
        $id = $transaction->get_transaction_id($desc);
        header("location: ../index.php?page=transactions&subpage=records");
    }
}

/*Main Function Process for updating a transaction type */
function update_transaction_type(){  
    $transaction = new Transaction();
    /*Receives the parameters passed from the profile updating page form */
    $type_id = $_POST['type_id'];
    $type_desc = $_POST['type_description'];
    
    /*Passes the parameters to the class function */
    $result = $transaction->update_transaction($type_desc,$type_id);
    if($result){
        header('location: ../index.php?page=transactions&subpage=records&id='.$type_id);        
    }
}

/*Main Function Process for deleting a transaction type */
function delete_transaction_type()
{
    /*If parameter was passed succesfully */
    if (isset($_POST['type_id'])) {
        $transaction = new Transaction();
        /*Receives the parameters passed from the delete button */
        $id = $_POST['type_id'];

        /*Passes the parameters to the class function */
        $result = $transaction->delete_transaction($id);

        /*If result was executed */
        if ($result) {
            header("location: ../index.php?page=transactions&subpage=records");
        }
        /*If result was interrupted */
        else {
            echo "Error deleting transaction type.";
        }
    }
    /*If parameter was not passed successfully */
    else {
        echo "Invalid transaction type ID.";
    }
}
?>

