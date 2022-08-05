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
	
	public function DataTableHandler($get){
	
		$draw = $_GET['draw'] ;
		$row = $_GET['start'];
		$rowperpage = $_GET['length'];
		$columnindex = $_GET['order'][0]['column'];
		$columnname = $_GET['columns'][$columnindex]['data'];
		$columnsortorder = $_GET['order'][0]['dir'];
		$searchvalue = $_GET['search']['value'];
		//search
		$searchQuery = "";
		if($searchvalue != ''){
			$searchQuery =  "and (name like '%".$searchvalue."%' or email like '%".$searchvalue."%' or sal like '%".$searchvalue."%')";
		}
		//total no of record without filtering
		$q = "SELECT count(*) as allcount FROM emp";
		$result = $this->conn->query($q);
		$trecords = $result->fetch_assoc();
		$totalwithoutfilter = $trecords['allcount'];

		//total no of record with filter
		$que = "SELECT count(*) as allcount FROM emp where 1 ".$searchQuery;
		$res = $this->conn->query($que);
		$frecords = $res->fetch_assoc();
		$totalrecordwithfilter = $frecords['allcount'];

		//fetch record
		$empquery = "SELECT * FROM `emp` where 1  ".$searchQuery." order by ".$columnname." ".$columnsortorder." limit ".$row." , " 
		.$rowperpage;
		$emprecords = $this->conn->query($empquery);
		$data = array();

		while($row = $emprecords->fetch_assoc()){

			$data[] = array(
				"id"     =>  $row['id'],
				"name"   =>  $row['name'],
				"email"  =>  $row['email'],
				"sal"    =>  $row['sal']
			);
		}
		//response
		$response = array(
			"draw"             =>  intval($draw),
			"recordsTotal"     => $totalwithoutfilter,
			"recordsFiltered"  => $totalrecordwithfilter,		
			"data"             =>  $data
		);

		echo json_encode($response);
	}
}

$obj = new Query();

?>