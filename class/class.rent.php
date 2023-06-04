<!--Rent Class File-->
<?php
/*Creates Rent Object with database connection*/
class Rent{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	/*Function for creating a new rent */
	public function new_rent($rrentcust,$rrentroom,$rrenttransaction){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$rrentcust,$rrentroom,$rrenttransaction,$NOW,$NOW],
		];
		/*Stores parameters passed from the creation page inside the database */
		$stmt = $this->conn->prepare("INSERT INTO rent (cust_id, room_id, type_id, date_added, time_added) VALUES (?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}
	/*Function for deleting a rent */
	public function delete_rent($id){
		/*Deletes data from rent selected by the user*/
		$sql = "DELETE FROM rent WHERE rent_id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
	/*Function that selects all the records from the rent table */
	public function list_rent(){
		$sql="SELECT * FROM rent";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
	/*Function for getting the customer id from the database */
	public function list_customer(){
		$sql="SELECT * FROM customer";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
	/*Function that selects all the records from the room table */
    public function list_rooms(){
		$sql="SELECT * FROM room";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
	/*Function that selects all the records from the transaction_type table */
    public function list_transaction_type(){
		$sql="SELECT * FROM transaction_type";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
	/*Function for getting the rent id from the database */
	function get_rent_id($id){
		$sql="SELECT rent_id FROM rent WHERE rent_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_id = $q->fetchColumn();
		return $rent_id;
	}
	/*Function for getting the customer id passed from the get_cust_id1 function */
	function get_cust_id($id){
		$sql="SELECT cust_id FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_id = $q->fetchColumn();
		return $cust_id;
	}
	/*Function for getting the customer id from the database*/
	function get_cust_id1($id){
		$sql="SELECT cust_id FROM rent WHERE rent_id = :rent_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['rent_id' => $id]);
		$cust_id1 = $q->fetchColumn();
		return $cust_id1;
	}
	/*Function for getting the customer firstname from the database */
	function get_cust_fname($id){
		$sql="SELECT cust_fname FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_fname = $q->fetchColumn();
		return $cust_fname;
	}
	/*Function for getting the customer middlename from the database */
	function get_cust_mname($id){
		$sql="SELECT cust_mname FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_mname = $q->fetchColumn();
		return $cust_mname;
	}
	/*Function for getting the customer lastname from the database */
	function get_cust_lname($id){
		$sql="SELECT cust_lname FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_lname = $q->fetchColumn();
		return $cust_lname;
	}
	/*Function for getting the customer email from the database */
	function get_cust_email($id){
		$sql="SELECT cust_email FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_email = $q->fetchColumn();
		return $cust_email;
	}
	/*Function for getting the customer address from the database */
	function get_cust_address($id){
		$sql="SELECT cust_address FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_address = $q->fetchColumn();
		return $cust_address;
	}
	/*Function for getting the customer contact number from the database */
	function get_cust_cnumber($id){
		$sql="SELECT cust_cnumber FROM customer WHERE cust_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_cnumber = $q->fetchColumn();
		return $cust_cnumber;
	}
	/*Function for getting the customer id passed from the get_room_id1 function */
	function get_room_id($id){
		$sql="SELECT room_id FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_id = $q->fetchColumn();
		return $room_id;
	}
	/*Function for getting the room id from the database */
	function get_room_id1($id){
		$sql="SELECT room_id FROM rent WHERE rent_id = :rent_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['rent_id' => $id]);
		$room_id1 = $q->fetchColumn();
		return $room_id1;
	}
	
	/*Function for getting the room vacancy from the database */
	function get_room_vacancy($id){
		$sql="SELECT room_vacancy FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_vacancy = $q->fetchColumn();
		return $room_vacancy;
	}
	/*Function for subtracting the selected room vacancy by 1 from the database */
	public function subtract_room_vacancy($id){
		$sql= "UPDATE room SET room_vacancy=room_vacancy - 1 WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_vacancy = $q->fetchColumn();
		return $room_vacancy;
	}
	/*Function for adding the selected room vacancy by 1 from the database */
	public function add_room_vacancy($id){
		$sql= "UPDATE room SET room_vacancy=room_vacancy + 1 WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_vacancy = $q->fetchColumn();
		return $room_vacancy;
	}
	/*Function for updating the room status to Occupied from the database if a condition is met*/
	public function update_room_status_0($id){
		$sql= "UPDATE room SET room_status = 'Occupied' WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_status = $q->fetchColumn();
		return $room_status;
	}
	/*Function for updating the room status to Available from the database if a condition is met*/
	public function update_room_status_1($id){
		$sql= "UPDATE room SET room_status = 'Available' WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_status = $q->fetchColumn();
		return $room_status;
	}
	/*Function for updating the customer status to Rented from the database if that customer finishes a rent process*/
	public function update_cust_status_0($id){
		$sql= "UPDATE customer SET cust_status = 'Rented' WHERE cust_id = :cust_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['cust_id' => $id]);
		$cust_status = $q->fetchColumn();
		return $cust_status;
	}
	/*Function for updating the customer status to Rented from the database if that customer withdraws a rent process*/
	public function update_cust_status_1($id){
		$sql= "UPDATE customer SET cust_status = 'Available' WHERE cust_id = :cust_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['cust_id' => $id]);
		$cust_status = $q->fetchColumn();
		return $cust_status;
	}
	/*Function for getting the transaction type id from the database */
	function get_transaction_type_id($id){
		$sql="SELECT type_id FROM transaction_type WHERE type_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}
	/*Function for getting the transaction type description from the database */
	function get_transaction_type_description($id){
		$sql="SELECT type_description FROM transaction_type WHERE type_id = :type_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['type_id' => $id]);
		$type_description = $q->fetchColumn();
		return $type_description;
	}
	/*Function for getting the room number from the database */
	function get_room_number($id){
		$sql="SELECT room_number FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_number = $q->fetchColumn();
		return $room_number;
	}
	/*Function for getting the transaction type description from the database */
	function get_date_added($id){
		$sql="SELECT date_added FROM rent WHERE rent_id = :rent_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['rent_id' => $id]);
		$date_added = $q->fetchColumn();
		return $date_added;
	}

	//INNER JOIN Functions

	/*INNER JOIN Function for getting the customer firstname from the database */
	function get_cust_fname_display($id){
		$sql="SELECT cust_fname FROM customer INNER JOIN rent WHERE rent.cust_id = customer.cust_id AND rent_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_cust_fname = $q->fetchColumn();
		return $rent_cust_fname;
	}
	/*INNER JOIN Function for getting the customer middlename from the database */
	function get_cust_mname_display($id){
		$sql="SELECT cust_mname FROM customer INNER JOIN rent WHERE rent.cust_id = customer.cust_id AND rent_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_cust_mname = $q->fetchColumn();
		return $rent_cust_mname;
	}
	/*INNER JOIN Function for getting the customer lastname from the database */
	function get_cust_lname_display($id){
		$sql="SELECT cust_lname FROM customer INNER JOIN rent WHERE rent.cust_id = customer.cust_id AND rent_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_cust_lname = $q->fetchColumn();
		return $rent_cust_lname;
	}
	/*INNER JOIN Function for getting the room number from the database */
	function get_room_number_display($id){
		$sql="SELECT room_number FROM room INNER JOIN rent WHERE rent.room_id = room.room_id AND rent_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_room_number = $q->fetchColumn();
		return $rent_room_number;
	}
	/*INNER JOIN Function for getting the transaction type description from the database */
	function get_transaction_type_description_display($id){
		$sql="SELECT type_description FROM transaction_type INNER JOIN rent WHERE rent.type_id = transaction_type.type_id AND rent_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_type_desc = $q->fetchColumn();
		return $rent_type_desc;
	}
	/*INNER JOIN Function for getting the customer email from the database */
	function get_cust_email_display($id){
		$sql="SELECT cust_email FROM customer INNER JOIN rent WHERE rent.cust_id = customer.cust_id AND rent_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_cust_email = $q->fetchColumn();
		return $rent_cust_email;
	}
	/*INNER JOIN Function for getting the customer contact number from the database */
	function get_cust_cnumber_display($id){
		$sql="SELECT cust_cnumber FROM customer INNER JOIN rent WHERE rent.cust_id = customer.cust_id AND rent_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_cust_cnumber = $q->fetchColumn();
		return $rent_cust_cnumber;
	}
	/*INNER JOIN Function for getting the customer address from the database */
	function get_cust_address_display($id){
		$sql="SELECT cust_address FROM customer INNER JOIN rent WHERE rent.cust_id = customer.cust_id AND rent_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_cust_address = $q->fetchColumn();
		return $rent_cust_address;
	}

	public function list_customer_search($keyword){
		
		//$keyword = "%".$keyword."%";

		$q = $this->conn->prepare('SELECT * FROM `customer` INNER JOIN rent on rent.cust_id = customer.cust_id INNER JOIN room on rent.room_id = room.room_id INNER JOIN transaction_type on rent.type_id = transaction_type.type_id WHERE (`cust_fname`) LIKE ?');
		$q->bindValue(1, "%$keyword%", PDO::PARAM_STR);
		$q->execute();

		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]= $r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
}
?>