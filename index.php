<?php
require_once 'functions.php';

$user = null;
if ( isset($_POST['email']) ) {
    if ( isset($_POST['password']) ) {
		$user = login();

		if ($user ) {
			if ($user[5] == 'student') {
				/*
				echo "$user[0]";
				echo "$user[1]";
				echo "$user[2]";
				echo "$user[3]";
				echo "$user[4]";
				echo "$user[5]";
				*/
				header('Location: student.php?id='.$user[0]);
			} else if ($user[5] == 'teacher') {
				header('Location: teacher.php?id='.$user[0]);
		}
	}
}
}


?>
<html>
<head>
	<title>Attendance System | - </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

	<style>
	body {
		margin: 10%;
	}
	</style>
</head>
<body>

    <form class="form-horizontal"
	method="POST"
	action=""
	>
    <fieldset>

    <!-- Form Name -->
    <legend>Login to Attendance System</legend>

    <!-- Text input-->
    <div class="form-group">

		<span style="color:red;">
		<?php
			if ((! $user ) && isset( $_POST['email'] ) ) {
				echo "<p>Invalid User Credentials</p>";
			}
			else {
				//echo 'Success';
			}
		 ?>
		</span>


      <label class="col-md-4 control-label" for="email">Email</label>
      <div class="col-md-4">
      <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required="">
      <span class="help-block" style="color: red">
	  <?php
		  if ( isset($_POST['Submit']) ) {
			  if (! isset($_POST['email']) ) {
				  echo 'Email Required!';
			  }
		  }
	   ?>
	  </span>
      </div>
    </div>

    <!-- Password input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="password">Password</label>
      <div class="col-md-4">
        <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
		<span class="help-block" style="color: red">
		<?php
			if ( isset($_POST['email']) ) {
			    if (! isset($_POST['password']) ) {
					echo 'Password Required!';
				}
			}
		 ?>
		</span>
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="Submit"></label>
      <div class="col-md-4">
        <button id="Submit" name="Submit" class="btn btn-success">Login</button>
      </div>
    </div>

    </fieldset>
    </form>

</body>
</html>
