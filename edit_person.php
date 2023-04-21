<!DOCTYPE html>
<html>
<head>
	<title>Edit Person - MRC Team</title>
    <link rel="stylesheet" href="index.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
    <div class="logo">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_aEwjE_hEdGeBWihBJaTIRDG2XSiSNbAlwlPB-iRhxBJsqL7DEnbuGaQmbTBWHhLim-A&usqp=CAU" alt="MRC Studio Operations Logo">
    </div>
    <h1>MRC Team</h1>
    
    <nav>
      
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
    </nav>
</header>




<br/>

<?php

$host = 'localhost'; 
$user = 'root';
$password = 'elaine12';
$database = 'operations';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $employee_type = $_POST['employee_type'];

  $sql = "UPDATE people SET first_name='$first_name', last_name='$last_name', employee_type='$employee_type' WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "Record updated successfully";
    header("refresh:1; url=people.php");
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM people WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Person</title>
	<link rel="stylesheet" href="index.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
</head>
<body>

	<div class="form-container">
		<h2>Edit Person</h2>
		<form method="post">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<label for="first_name">First Name:</label>
			<input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required>

			<label for="last_name">Last Name:</label>
			<input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required>

			<label for="employee_type">Employee Type:</label>
			<select name="employee_type" required>
				<option value="" disabled selected class="faded">Select...</option>
				<option value="PI" <?php if ($row['employee_type'] == 'PI') { echo 'selected'; } ?>>PI</option>
				<option value="Associate" <?php if ($row['employee_type'] == 'Associate') { echo 'selected'; } ?>>Associate</option>
				<option value="Assistant" <?php if ($row['employee_type'] == 'Assistant') { echo 'selected'; } ?>>Assistant</option>
				<option value="WorkStudy" <?php if ($row['employee_type'] == 'WorkStudy') { echo 'selected'; } ?>>WorkStudy</option>
				<option value="PAS" <?php if ($row['employee_type'] == 'PAS') { echo 'selected'; } ?>>PAS</option>
			</select>

			<button type="submit" name="submit">Save Changes</button>
		</form>
	</div>

</body>
</html>

<?php
}

mysqli_close($conn);
?>

