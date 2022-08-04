<?php
include 'header.php';
?>
<div class="container mt-5">
<button type="button" class="btn btn-dark px-5 my-4"><a href="add_record.php">Add Record</a></button>
	<table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Salery</th>

      </tr>
    </thead>
    <tbody>
    	<?php
        //$obj->DataTableHandler($_GET);
    	  $records =  $obj->fetchRecord();
        $id = 1;
        foreach ($records as $record) { ?>
        <tr>
          <th scope="row"><?php echo $id++;?></th>
          <td><?php echo $record['name'];?></td>
          <td><?php echo $record['email'];?></td>
          <td><?php echo $record['sal'];?></td>
        </tr>
     <?php } ?>
    </tbody>
  </table>
</div>
<?php
include 'footer.php';  
?>