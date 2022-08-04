<?php
include 'config.php';
$draw = $_GET['draw'];
$trow = $_GET['start'];
$rowperpage = $_GET['length'];
$columnindex = $_GET['order'][0]['column'];
$columnname = $_GET['columns'][$columnindex]['data'];
$columnsortorder = $_GET['order'][0]['dir'];
$searchvalue = $_GET['search']['value'];
//search
$searchQuery = "";
if($searchvalue !=''){
	$searchQuery =  "and (name like '%".$searchvalue."%' or email like '%".$searchvalue."%' or sal like '%".$searchvalue."%')";
}
//tottal no of record without filtering
$sel= mysqli_query($conn,"SELECT count(*) as allcount from emp");
$record = mysqli_fetch_assoc($sel);
$totalrecords = $record['allcount'];

//total no of record with filter
$sel = mysqli_query($conn , "SELECT count(*) as allcount from emp where 1 "  .$searchQuery);
$totalrecord =  mysqli_fetch_assoc($sel);
$totalrecordwithfilter = $totalrecord['allcount'];

//fetch record
$empquery = "SELECT * FROM `emp` where 1 ".$searchQuery." ORDER BY ".$columnname." ".$columnsortorder." limit ".$trow." , " .$rowperpage;
$emprecord = mysqli_query($conn,$empquery);
$data = array();

while( $row = @mysqli_fetch_assoc($emprecord) ){
	$data[] = array(
		'name'  =>  $row['name'],
		'email' =>  $row['email'],
		'sal'   =>  $row['sal']

	);
}
//response
$response = array(
		"draw" => intval($draw),
		"totalrecords" => $totalrecordwithfilter,
		"totaldisplayrecord" => $totalrecords,
		"data" => $data
	);
 echo json_encode($response);

?>	