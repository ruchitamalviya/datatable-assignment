<?php
	include 'header.php';
	$obj->insertRecord($_POST);
?>
<div class="container mt-5">
	<form action="add_record.php" method="POST">
		<div class="form-group">
		<label for="name">Name:</label>
		<input type="text" class="form-control" name="name" id="name">
		</div>
		<div class="form-group">
		<label for="email">Email address:</label>
		<input type="email" class="form-control" name="email" id="email">
		</div>
		<div class="form-group">
		<label for="sal">Salery:</label>
		<input type="text" class="form-control" name="sal" id="sal">
		</div>
		<button type="submit" class="btn btn-dark px-3 my-4" name="submit">Submit</button>
	</form>
</div>

<?php
include 'footer.php';  
?>