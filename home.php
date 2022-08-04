<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<?php
include 'ajax-response.php';
?>
<table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Salery</th>
      </tr>
    </thead>
  </table>
<script type="text/javascript">
	jQuery(document).ready( function () {
	   	jQuery('#myTable').DataTable({
	         'processing': true,
	         'serverSide': true,         
	        'ajax' :{
	        	'url':'ajax-response.php'
	        },

	        'columns':[
	        { data: 'name' },
	        { data: 'email' },
	        { data: 'sal' }

	        ]
	    });
	} );

</script>
<script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>