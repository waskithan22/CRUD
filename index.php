<!DOCTYPE html>
<html>
<head>
	<title>PHP Crud Using Mysqli</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

</head>
<body>
<div class="container" style="margin-top: 70px;">
	<div class="row justify-content-center">
		<div class="col-md-10 text-center">
			<?php
include "connection.php";
if(isset($_POST['submit'])){
	$student_name         = $_POST['student_name'];
	$student_marks        = $_POST['marks'];
	$student_department   = $_POST['department'];
	$student_result       = $_POST['result'];
	$Query = mysqli_query($con, "INSERT INTO students (name,marks,department,result) VALUES ('$student_name','$student_marks', '$student_department','$student_result')");
	if($Query){
		echo "<script>alert('Student record is successfully inserted!')</script>";
	}else{
		echo "<script>alert('Sorry an error occured!')</script>";
	}

}

?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Record
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="">
       	<div class="form-group">
       		<input type="text" name="student_name" class="form-control" placeholder="Enter Name..." required="">
       	</div><!-- form-group -->
       	<div class="form-group">
       		<input type="text" name="marks" class="form-control" placeholder="Enter marks..." required="">
       	</div><!-- form-group -->
       	<div class="form-group">
       		<input type="text" name="department" class="form-control" placeholder="Enter Department..." required="">
       	</div><!-- form-group -->
       	<div class="form-group">
       		<input type="text" name="result" class="form-control" placeholder="Enter result..." required="">
       	</div><!-- form-group -->
       	<div class="form-group">
       		<input type="submit" name="submit" class="btn btn-info" value="Add Student">
       	</div><!-- form-group -->
       </form><!-- form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   
      </div>
    </div>
  </div>
</div>
<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Name</th>
			<th>Marks</th>
			<th>Department</th>
			<th>Result</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php
$Show = mysqli_query($con, "SELECT * FROM students");
while($r = mysqli_fetch_array($Show)): ?>
    <tr>
    	<td><?php echo $r['name']; ?></td>
    	<td><?php echo $r['marks']; ?></td>
    	<td><?php echo $r['department']; ?></td>
    	<td><?php echo $r['result']; ?></td>
    	<td><a href="update.php?update_id=<?php echo $r['id']; ?>" class="btn btn-warning">
  Update
</a></td>
    	<td><a href="delete.php?delete_id=<?php echo $r['id']; ?>" class="btn btn-danger">
  Delete
</a></td>
    </tr>
    <?php endwhile; ?>
	</tbody>
	</table>
		</div><!-- col -->
	</div><!-- row -->
</div><!-- container -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>

</html>