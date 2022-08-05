<?php
include 'header.php';
?>
<div class="container mt-5">
<button type="button" class="btn btn-dark px-5 my-4"><a href="add_record.php">Add Record</a></button>
<table>
     <tr>
       <td>
          <input type='date' id='search_fromdate' class="datepicker" placeholder='From date'>
       </td>
       <td>
          <input type='date' id='search_todate' class="datepicker" placeholder='To date'>
       </td>
       <td>
          <input type='button' id="btn_search" value="Search">
       </td>
     </tr>
   </table>
	<table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Salery</th>
         <th scope="col">Date</th>

      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>
<?php
include 'footer.php';  
?>