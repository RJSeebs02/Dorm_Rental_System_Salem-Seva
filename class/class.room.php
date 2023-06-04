<!--Room Class File-->
<?php
/*Creates Room Object with database connection*/
class Room{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	/*Function for creating a new room */
	public function new_room($rnumber,$rtype,$rdesc,$rprice,$rfloor,$rvacancy,$rstatus){
		
		$data = [
			[$rnumber,$rtype,$rdesc,$rprice,$rfloor,$rvacancy,$rstatus],
		];
		/*Stores parameters passed from the creation page inside the database */
		$stmt = $this->conn->prepare("INSERT INTO room (room_number, room_type, room_desc, room_price, room_floor, room_vacancy, room_status) VALUES (?,?,?,?,?,?,?)");
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
	/*Function for updating a room */
	public function update_room($rnumber,$rtype,$rdesc,$rprice,$rfloor,$rvacancy,$rstatus,$id){
		/*Updates data from the database using the parameters passed from the profile updating page */	
		$sql = "UPDATE room SET room_number=:room_number, room_type=:room_type, room_desc=:room_desc, room_price=:room_price, room_floor=:room_floor, room_vacancy=:room_vacancy, room_status=:room_status WHERE room_id=:room_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':room_number'=>$rnumber, ':room_type'=>$rtype, ':room_desc'=>$rdesc,':room_price'=>$rprice,':room_floor'=>$rfloor,':room_vacancy'=>$rvacancy,':room_status'=>$rstatus, ':room_id'=>$id));
		return true;
	}
	/*Function for deleting a room */
	public function delete_room($id)
	{
		/*Deletes data from room selected by the user*/
		$sql = "DELETE FROM room WHERE room_id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function list_room_search($keyword){
		
		//$keyword = "%".$keyword."%";

		$q = $this->conn->prepare('SELECT * FROM `room` WHERE (`room_number`) LIKE ?');
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
	/*Function for getting the room id from the database */
	function get_room_id($id){
		$sql="SELECT room_id FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_id = $q->fetchColumn();
		return $room_id;
	}
	/*Function for getting the room number from the database */
	function get_room_number($id){
		$sql="SELECT room_number FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_number = $q->fetchColumn();
		return $room_number;
	}
	/*Function for getting the room type from the database */
	function get_room_type($id){
		$sql="SELECT room_type FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_type = $q->fetchColumn();
		return $room_type;
	}
	/*Function for getting the room description from the database */
	function get_room_desc($id){
		$sql="SELECT room_desc FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_desc = $q->fetchColumn();
		return $room_desc;
	}
	/*Function for getting the room price from the database */
	function get_room_price($id){
		$sql="SELECT room_price FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_price = $q->fetchColumn();
		return $room_price;
	}
	/*Function for getting the room floor from the database */
	function get_room_floor($id){
		$sql="SELECT room_floor FROM room WHERE room_id = :room_id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['room_id' => $id]);
		$room_floor = $q->fetchColumn();
		return $room_floor;
	}
	/*Function for getting the room vacancy from the database */
	function get_room_vacancy($id){
		$sql="SELECT room_vacancy FROM room WHERE room_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$room_vacancy = $q->fetchColumn();
		return $room_vacancy;
	}
	/*Function for getting the room status from the database */
	function get_room_status($id){
		$sql="SELECT room_status FROM room WHERE room_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$room_status = $q->fetchColumn();
		return $room_status;
	}
}
?>