<?php

$host = 'localhost'; 
$user = 'root';
$password = 'elaine12';
$database = 'operations';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$employee_type = $_POST['employee_type'];


$sql = "INSERT INTO people (first_name, last_name, employee_type) VALUES ('$first_name', '$last_name', '$employee_type')";
if (mysqli_query($conn, $sql)) {
	
	header("Location: people.php");
	exit();
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>
