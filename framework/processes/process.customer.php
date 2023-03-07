<?php
/*Include Customer Class File */
include '../class/class.customer.php';

/*Parameters for switch case*/
$action = isset($_GET['action']) ? $_GET['action'] : '';

/*Switch case for actions in the process */
switch($action){
	case 'new':
        create_new_customer();
	break;
    case 'update':
        update_customer();
	break;
    case 'delete':
        delete_customer();
    break;
}

/*Main Function Process for creating a customer */
function create_new_customer(){
    $customer = new Customer();
    /*Receives the parameters passed from the creation page form */
    $fname = ucfirst($_POST['cust_fname']);
    $mname = ucfirst($_POST['cust_mname']);
    $lname = ucfirst($_POST['cust_lname']);
    $email = $_POST['cust_email'];
    $address = $_POST['cust_address'];
    $cnumber = $_POST['cust_cnumber'];
    $status = $_POST['cust_status'];

    /*Passes the parameters to the class function */
    $result = $customer->new_customer($fname,$mname,$lname,$email,$address,$cnumber,$status);
    if($result){
        $id = $customer->get_cust_id($fname);
        header("location: ../index.php?page=customers&subpage=records");
    }
}

/*Main Function Process for updating a customer */
function update_customer(){  
    $customer = new Customer();
    /*Receives the parameters passed from the profile updating page form */
    $cust_id = $_POST['cust_id'];
    $fname = ucfirst($_POST['cust_fname']);
    $mname = ucfirst($_POST['cust_mname']);
    $lname = ucfirst($_POST['cust_lname']);
    $email = $_POST['cust_email'];
    $address = $_POST['cust_address'];
    $cnumber = $_POST['cust_cnumber'];
    $status = $_POST['cust_status'];
    
    /*Passes the parameters to the class function */
    $result = $customer->update_customer($fname,$mname,$lname,$email,$address,$cnumber,$status,$cust_id);
    if($result){
        header('location: ../index.php?page=customers&subpage=records&id='.$cust_id);        
    }
}

/*Main Function Process for deleting a customer */
function delete_customer()
{
    /*If parameter was passed succesfully */
    if (isset($_POST['cust_id'])) {
        $customer = new Customer();
        /*Receives the parameters passed from the delete button */
        $id = $_POST['cust_id'];

        /*Passes the parameters to the class function */
        $result = $customer->delete_customer($id);

        /*If result was executed */
        if ($result) {
            header("location: ../index.php?page=customers&subpage=records");
        }
        /*If result was interrupted */
        else {
            echo "Error deleting customer.";
        }
    }
    /*If parameter was not passed successfully */
    else {
        echo "Invalid customer ID.";
    }
}
?>

