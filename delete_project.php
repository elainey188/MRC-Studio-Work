<?php
// Database connection
$conn = new mysqli('localhost', 'root', 'elaine12', 'operations');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!empty($_POST['project_id'])) {

  $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);

  
  $sql = "DELETE FROM projects WHERE id='$project_id'";
  if ($conn->query($sql) === TRUE) {
    
    header('Location: index.php');
    exit;
  } else {
    echo "Error deleting project: " . $conn->error;
  }
} else {
  echo "Project ID not provided";
}
?>
