<?php
/*Include Admin Class File */
include '../class/class.admin.php';

/*Parameters for switch case*/
$action = isset($_GET['action']) ? $_GET['action'] : '';

/*Switch case for actions in the process */
switch($action){
	case 'new':
        create_new_admin();
	break;
    case 'update':
        update_admin();
	break;
    case 'delete':
        delete_admin();
    break;
}

/*Main Function Process for creating an admin */
function create_new_admin(){
    $admin = new Admin();
    /*Receives the parameters passed from the creation page form */
    $username = $_POST['adm_username'];
    $password = $_POST['adm_password'];
    $email = $_POST['adm_email'];
    $fname = ucfirst($_POST['adm_fname']);
    $lname = ucfirst($_POST['adm_lname']);
    $cnumber = $_POST['adm_cnumber'];
    $access = $_POST['adm_access'];

    $password = md5($password);

    /*Passes the parameters to the class function */
    $result = $admin->new_admin($username,$password,$email,$fname,$lname,$cnumber,$access);
    if($result){
        $username = $admin->get_username($username);
        header("location: ../index.php?page=admins");
    }
}

/*Main Function Process for updating an admin */
function update_admin(){  
    $admin = new Admin();
    /*Receives the parameters passed from the profile updating page form */
    $username = $_POST['adm_username'];
    $password = $_POST['adm_password'];
    $email = $_POST['adm_email'];
    $fname = ucfirst($_POST['adm_fname']);
    $lname = ucfirst($_POST['adm_lname']);
    $cnumber = $_POST['adm_cnumber'];
    $access = $_POST['adm_access'];
    
    /*Passes the parameters to the class function */
    $result = $admin->update_admin($username,$password,$email,$fname,$lname,$cnumber,$access);
    if($result){
        header('location: ../index.php?page=admins&subpage=records&id='.$username);
    }
}

/*Main Function Process for deleting an admin */
function delete_admin(){
    if (isset($_POST['adm_username'])) {
        $admin = new Admin();
        $id = $_POST['adm_username'];
        $result = $admin->delete_admin($id);
        if ($result) {
            header("location: ../index.php?page=admins");
        } 
    }
}
?>