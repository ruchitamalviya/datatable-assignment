<?php
class Query 
{
	private $conn;	
	function __construct()
	{
		$this->conn = new mysqli("localhost","root","","datatable");
		if($this->conn){

			return $this->conn;
		}
	}
	public function insertRecord($post){
		if(isset($_POST['submit']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['sal']) && !empty($_POST['sal']) ){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$sal = $_POST['sal'];
			$sql = "INSERT INTO `emp` ( `name`, `email`, `sal`) VALUES ('$name', '$email', '$sal')";
			$result = $this->conn->query($sql);
			if($result){
				header("Location: index.php");
			}
		}	
	}
	
	public function fetchRecord()
	{
		$sql = "SELECT * FROM `emp`";
		$result = $this->conn->query($sql);
		if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}
}
$obj= new Query();

?>