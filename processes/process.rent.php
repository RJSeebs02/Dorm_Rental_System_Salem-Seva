<?php
/*Include Rent Class File */
include '../class/class.rent.php';

/*Parameters for switch case*/
$action = isset($_GET['action']) ? $_GET['action'] : '';

/*Switch case for actions in the process */
switch($action){
	case 'new':
        create_new_rent();
	break;
    case 'cancel':
        withdraw_customer();
	break;
}

/*Main Function Process for creating a rent */
function create_new_rent(){
    $rent = new Rent();
    /*Receives the parameters passed from the creation page form */
    $rentcust = $_POST['cust_id'];
    $renttransaction = $_POST['trans_id'];
    $rentroom = $_POST['room_id'];

    /*Passes the parameters to the class function */
    $result = $rent->new_rent($rentcust,$rentroom,$renttransaction);
    
    /*If result is executed succesfully */
    if($result){
        /*Subtract room vacancy by 1 */
        $result2 = $rent->subtract_room_vacancy($rentroom);
        /*Get room vacancy */
        $getroomvac = $rent->get_room_vacancy($rentroom);
        /*If room vacancy is less than or equal to 0 */
        if ($getroomvac <= 0){
            /*Update room status to occupied */
            $updateroomstatus = $rent->update_room_status_0($rentroom);
        } else {
            /*Update room status to available */
            $updateroomstatus = $rent->update_room_status_1($rentroom);
        }
        /*Update customer status to rented */
        $finalresult = $rent->update_cust_status_0($rentcust);
    }
            header("location: ../index.php?page=rent&subpage=records");
}

/*Main Function Process for withdrawing a customer from a rent */
function withdraw_customer(){
    if (isset($_POST['rent_id']) && is_numeric($_POST['rent_id'])) {
        $rent = new Rent();
        /*Receives the parameters passed from the creation page form */
        $rid = $_POST['rent_id'];

        /*Passes the parameters to the class functions */
        $rentroomid = $rent->get_room_id1($rid);
        $roomid = $rent->get_room_id($rentroomid);
        $addroomvac = $rent->add_room_vacancy($roomid);
        $getroomvac = $rent->get_room_vacancy($roomid);

        $rentcustid = $rent->get_cust_id1($rid);
        $custid = $rent->get_cust_id($rentcustid);
        $finalresult = $rent->update_cust_status_1($custid);

        /*If room vacancy is less than or equal to 0 */
        if ($getroomvac <= 0){
            /*Update room status to occupied */
            $result = $rent->update_room_status_0($roomid);
            header('location: ../index.php?page=rent&subpage=records');
        } else {
            /*Update room status to available */
            $result = $rent->update_room_status_1($roomid);
        }
        /*Delete rent record selected */
        $result1 = $rent->delete_rent($rid);

        /*If result was executed */
        if ($result1) {
            header('location: ../index.php?page=rent&subpage=records');
        }
        /*If result was interrupted */
        else {
            echo "Error deleting rent.";
        }
    }
    /*If parameter was not passed successfully */
    else {
        echo "Invalid rent ID.";
    }
}
?>