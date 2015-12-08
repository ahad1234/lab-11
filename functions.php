<?php

function connect () {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}

function login() {
    $conn = connect();

	$email = addslashes($_POST['email']);
	$password = addslashes($_POST['password']);

	$query = "SELECT * FROM user WHERE email = '" . $email . "' AND password= '" . $password . "'; ";
	// $result = mysqli_query($conn, $query);
    // var_dump($conn);
    $result = $conn->query($query);
    $user = mysqli_fetch_row($result);
    // $user = mysqli_fetch_array($result);

    var_dump($user);

    echo $user[1];
    // $user = mysql_fetch_assoc($result);

    return $user;
}
