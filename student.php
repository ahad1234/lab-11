<?php


require_once 'functions.php';

$conn = connect();
$output =null; 

$query = "SELECT studentid,isPresent,comments FROM attendance WHERE studentid = '" . $_GET['id']."'";
$result = $conn->query($query);
$output = mysqli_fetch_row($result);

$query = "SELECT fullname FROM user WHERE id = '" . $_GET['id']."'";
$result = $conn->query($query);
$name = mysqli_fetch_row($result); 


echo "Attendance for : "."<br/>";


// echo "Student";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Attendance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>Is Present</th>
        <th>Comments</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      	<td><?php echo $output[0] ?></td>
      	<td><?php echo $name[0] ?></td>
      	<td><?php echo $output[1] ?></td>
      	<td><?php echo $output[2] ?></td>
        
      </tr>
      
    </tbody>
  </table>
</div>

</body>
</html>



