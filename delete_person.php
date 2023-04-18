<?php


$host = 'localhost'; 
$user = 'root';
$password = 'elaine12';
$database = 'operations';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$person_id = $_GET['id'];


$sql = "DELETE FROM people WHERE id='$person_id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error deleting person: " . mysqli_error($conn));
}

mysqli_close($conn);

header("Location: people.php");

?>
