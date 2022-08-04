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

	public function DataTableHandler($get){
	
		$draw = isset($_GET['draw']) ? $_GET['draw'] :'' ;
		$row = isset($_GET['start']) ? $_GET['start'] : '';
		$rowperpage = isset($_GET['length']) ? $_GET['length'] : '';
		$columnindex = isset($_GET['order'][0]['column']) ? $_GET['order'][0]['column'] :'' ;
		$columnname = isset($_GET['columns'][$columnindex]['data']) ? $_GET['order'][0]['column'] : '';
		$columnsortorder = isset($_GET['order'][0]['dir']) ? $_GET['order'][0]['dir'] : '';
		$searchvalue = isset($_GET['search']['value']) ? $_GET['search']['value'] :'';
		//search
		$searchQuery = "";
		if($searchvalue != ''){
			$searchQuery =  "and (name like '%".$searchvalue."%' or email like '%".$searchvalue."%' or sal like '%".$searchvalue."%')";
		}
		//total no of record without filtering
		$q = "select count(*) as allcount from emp";
		$result = $this->conn->query($q);
		$trecords = $result->fetch_assoc();
		$totalworecords = $trecords['allcount'];

		//total no of record with filter
		$que = "select count(*) as allcount from emp where 1 ".$searchQuery;
		$res = $this->conn->query($q);
		$frecords = $res->fetch_assoc();
		$totalrecordwithfilter = $frecords['allcount'];

		//fetch record
		$empquery = "select count(*) as allcount from emp where 1 ".$searchQuery." order by ".$columnname."".$columnsortorder." limit ".$row.",".$rowperpage;
		$emprecords = $this->conn->query($empquery);
		$data=array();
		while($row = $emprecords->fetch_assoc()){
			$data=array(
				"name" => $row['name'],
				"email" => $row['email'],
				"sal" => $row['sal']
			);
		}
		//response
		$response = array(
			"draw"  =>  intval($draw),
			"totalrecords"  => $totalrecordwithfilter,
			"totaldisplayrecord" => $totalrecord,
			"data" =>  $data
		);
		echo json_encode($response);		
	}
}

$obj = new Query();

?>