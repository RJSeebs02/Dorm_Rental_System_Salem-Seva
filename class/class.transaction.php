<!--Transaction Class File-->
<?php
/*Creates Transaction Object with database connection*/
class Transaction{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	/*Function for creating a new transaction type */
	public function new_transaction($typedesc){
		
		$data = [
			[$typedesc],
		];
		/*Stores parameters passed from the creation page inside the database */
		$stmt = $this->conn->prepare("INSERT INTO transaction_type (type_description) VALUES (?)");
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
	/*Function for updating a transaction */
	public function update_transaction($desc, $id){
		/*Updates data from the database using the parameters passed from the profile updating page */
		$sql = "UPDATE transaction_type SET type_description=:type_description WHERE type_id=:type_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':type_description'=>$desc, ':type_id'=>$id));
		return true;
	}
	/*Function for deleting a transaction type */
	public function delete_transaction($id){
		/*Deletes data from transaction type selected by the user*/
		$sql = "DELETE FROM transaction_type WHERE type_id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
	/*Function that selects all the records from the transaction type table */
	public function list_transactions(){
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
	/*Function for getting the transaction type id from the database */
	function get_transaction_id($id){
		$sql="SELECT type_id FROM transaction_type WHERE type_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}
	/*Function for getting the transaction type description from the database */
	function get_transaction_desc($id){
		$sql="SELECT type_description FROM transaction_type WHERE type_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_description = $q->fetchColumn();
		return $type_description;
	}
}
?>