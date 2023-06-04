<!--Admin Class File-->
<?php
/*Creates Admin Object with database connection */
class Charts{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
	}
    
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
    /*public function list_rent_records_yearly(){
		$sql="SELECT COUNT(rent_id) FROM rent GROUP BY year(date_added)";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}*/
    
    /*function list_rent_records_yearly(){
        $NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$sql="SELECT COUNT(rent_id) FROM rent GROUP BY month(date_added)";	
		$q = $this->conn->prepare($sql);
		$q->execute();
		$count1 = $q->fetchColumn();
		return $count1;
	}
    public function list_months(){
        
        $nyear= date("Y");
		$sql="SELECT COUNT(rent_id) FROM rent GROUP BY MONTH(date_added)";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}*/
}
?>