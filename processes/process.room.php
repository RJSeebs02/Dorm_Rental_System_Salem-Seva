<?php
/*Include Room Class File */
include '../class/class.room.php';

/*Parameters for switch case*/
$action = isset($_GET['action']) ? $_GET['action'] : '';

/*Switch case for actions in the process */
switch($action){
	case 'new':
        create_new_room();
	break;
    case 'update':
        update_room();
	break;
    case 'delete':
        delete_room();
    break;
}

/*Main Function Process for creating a room */
function create_new_room(){
    $room = new Room();
    /*Receives the parameters passed from the creation page form */
    $number = $_POST['room_number'];
    $type = ucfirst($_POST['room_type']);
    $description = ucfirst($_POST['room_desc']);
    $price = ucfirst($_POST['room_price']);
    $floor = ucfirst($_POST['room_floor']);
    $vacancy = $_POST['room_vacancy'];
    $status = $_POST['room_status'];

    /*Passes the parameters to the class function */
    $result = $room->new_room($number,$type,$description,$price,$floor,$vacancy,$status);
    if($result){
        $id = $room->get_room_id($number);
        header("location: ../index.php?page=rooms&subpage=records");
    }
}

/*Main Function Process for updating a room */
function update_room(){  
    $room = new Room();
    /*Receives the parameters passed from the profile updating page form */
    $room_id = $_POST['room_id'];
    $number = $_POST['room_number'];
    $type = ucfirst($_POST['room_type']);
    $description = ucfirst($_POST['room_desc']);
    $price = ucfirst($_POST['room_price']);
    $floor = ucfirst($_POST['room_floor']);
    $rvacancy = $_POST['room_vacancy'];
    $rstatus = $_POST['room_status'];
    
    /*Passes the parameters to the class function */
    $result = $room->update_room($number,$type,$description,$price,$floor,$rvacancy,$rstatus,$room_id);
    if($result){
        header('location: ../index.php?page=rooms&subpage=records&id='.$room_id);
    }
}

/*Main Function Process for deleting a room */
function delete_room()
{
    /*If parameter was passed succesfully */
    if (isset($_POST['room_id'])) {
        $room = new Room();
        /*Receives the parameters passed from the delete button */
        $id = $_POST['room_id'];

        /*Passes the parameters to the class function */
        $result = $room->delete_room($id);

        /*If result was executed */
        if ($result) {
            header("location: ../index.php?page=rooms&subpage=records");
        }
        /*If result was interrupted */
        else {
            echo "Error deleting room.";
        }
    }
    /*If parameter was not passed successfully */
    else {
        echo "Invalid room ID.";
    }
}
?>