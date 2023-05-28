<!-- 
Web Application Development MidTerm Exam
Dormitory Rental System
Company: Bacolod Gateway Dormitory

BSIT2-A
Salem, Lester Godwin P.
Seva, Romeo III V.
-->

<?php
/* include the class file together with the config(global - within application) */
include_once 'class/class.admin.php';
include_once 'class/class.customer.php';
include_once 'class/class.room.php';
include_once 'class/class.rent.php';
include_once 'class/class.transaction.php';
include 'config/config.php';

/*Parameter variables for the navbar*/
$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

/*Declaring the objects (OOP Concept)*/
$admin = new Admin();
$customer = new Customer();
$room = new Room();
$rent = new Rent();
$transaction = new Transaction();

/*Login Verifier (Deploys Login Check Method from another file)*/
if(!$admin->get_session()){
	header("location: login.php");
}
$admin_user = $admin->get_username($_SESSION['adm_username']);
$admin_user_login = $admin_user;
?>

<!--Main Index HTML page of the web application-->
<!DOCTYPE html>
<html>
	<head>
		<title>Dormitory Rental Homepage</title>
		<link rel="stylesheet" href="css/style.css?<?php echo time();?>">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
	<header>
	<div id="navbar">
		<h4>Bacolod Gateway Dormitory</h4>
		<h1>Dormitory Rental System</h1>
			<div id="navbar-contents">	
				<!-- Navigation Bar consists of icons from fontawesome.com which was inserted in the CSS file-->
				<span class="hover"><a href="index.php"><i class="fa-sharp fa fa-house"></i>&nbspHome</a> &nbsp</span>
				<span class="hover"><a href="index.php?page=rent"><i class="fa-sharp fa-solid fa-pen-to-square"></i>&nbspRent</a> &nbsp||&nbsp</span>
				<span class="hover"><a href="index.php?page=customers"><i class="fa-sharp fa-solid fa-users"></i>&nbspCustomers</a> &nbsp</span>
				<span class="hover"><a href="index.php?page=rooms"><i class="fa-sharp fa-solid fa-door-closed"></i>&nbspRooms</a> &nbsp</span>
				<span class="hover"><a href="index.php?page=admins"><i class="fa-sharp fa-solid fa-user-tie"></i>&nbspAdmins</a> &nbsp</span>
				<span class="hover"><a href="index.php?page=transactions"><i class="fa-solid fa-cash-register"></i>&nbspTransaction Types</a> &nbsp</span>
				<span class="hover"><a href="logout.php" class="right">Logout</a></span>
				<span class="right">Hello &nbsp<?php echo $admin->get_fname($admin_user).' '.$admin->get_lname($admin_user).'&nbsp;!&nbsp;&nbsp;-&nbsp;&nbsp;<b>'.$admin->get_adm_access($admin_user);?></b>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</span> 
			</div>
	</div>
	</header>
	<body>
	<!--Switch case of the navigation bar parameters-->
	<div id="content">
	<?php
    switch($page){
				/*Displays Rental Page*/
                case 'rent':
                    require_once 'rent-module/index.php';
                break;
				/*Displays Customers Page*/
                case 'customers':
                    require_once 'customers-module/index.php';
                break;
				/*Displays Rooms Page*/
                case 'rooms':
                    require_once 'room-module/index.php';
                break;
				/*Displays Admins Page*/
				case 'admins':
                    require_once 'admin-module/index.php';
                break;
				/*Displays Transactions Page*/
				case 'transactions':
                    require_once 'transaction-module/index.php';
                break;
				/*Displays Default Page (Homepage)*/
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
	</div>
	</body>
</html>