<?php
require_once 'functions.php';

$conn = connect();
$output =null; 

$query = "SELECT * FROM user WHERE id = '" . $_GET['id']."'";
$result = $conn->query($query);
$output = mysqli_fetch_row($result);

echo "Teacher : "."<br/>";
echo $output[1]."<br/>";

$query = "SELECT fullname,email,class FROM user WHERE role = 'student'";
$result = $conn->query($query);
$output = mysqli_fetch_row($result);
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
        <th>Fullname</th>
        <th>Email</th>
        <th>Class</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      	<?php for($i=0;$i<count($output);$i++){?>
        	<td><?php echo $output[$i] ?></td>
        <?php }?>
      </tr>
      
    </tbody>
  </table>
</div>

</body>
</html>



