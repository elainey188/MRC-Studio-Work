<!DOCTYPE html>
<html>
<head>

	<title>Edit Project</title>
 
    <link rel="stylesheet" href="index.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
    <div class="logo">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_aEwjE_hEdGeBWihBJaTIRDG2XSiSNbAlwlPB-iRhxBJsqL7DEnbuGaQmbTBWHhLim-A&usqp=CAU" alt="MRC Studio Operations Logo">
    </div>
    <h1>MRC Studio Operations</h1>
    
    <nav>
      
      <ul>
        <li><a href="index.php">Back to Projects</a></li>
        <li><a href="people.php">MRC Team</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
    </nav>
</header>



<?php

$conn = new mysqli('localhost', 'root', 'elaine12', 'operations');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


    if (isset($_POST['submit'])){
  $id = $_GET['id'];
  $projectTitle = $_POST['project-title'];
  $projectDescription = $_POST['project-description'];
  $partnerCompany = $_POST['partner-company'];
  $startDate = $_POST['start-date'];
  $fundType = $_POST['fund-type'];
  $projectType = $_POST['project-type'];
  $projectStatus = isset($_POST['project-status']) ? $_POST['project-status'] : null;
  $endDate = isset($_POST['end-date']) ? $_POST['end-date'] : null;
  $assignedTo = isset($_POST['assigned-to']) ? json_encode($_POST['assigned-to']) : null;


  $stmt = $conn->prepare("UPDATE projects SET project_title=?, project_description=?, partner_company=?, start_date=?, fund_type=?, project_type=?, status=?, end_date=?, assigned_to=? WHERE id=?");
  $stmt->bind_param("sssssssssi", $projectTitle, $projectDescription, $partnerCompany, $startDate, $fundType, $projectType, $projectStatus, $endDate, $assignedTo, $id);
  $stmt->execute();
  $stmt->close();

 
  exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM projects WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
?>


<div class="form-container">
<h2>Edit Project</h2>
<form method="post">
  <label for="project-title">Project Title:</label>
  <input type="text" name="project-title" value="<?php echo $row['project_title']; ?>">

  <label for="project-description">Project Description:</label>
  <textarea name="project-description" required><?php echo $row['project_description']; ?></textarea><br>

  <label for="partner-company">Partner Company:</label>
  <input type="text" name="partner-company" value="<?php echo $row['partner_company']; ?>" required><br>

  <label for="start-date">Start Date:</label>
  <input type="date" name="start-date" value="<?php echo $row['start_date']; ?>" required><br>

  <label for="fund-type">Fund Type:</label>
  <input type="text" name="fund-type" value="<?php echo $row['fund_type']; ?>" required><br>

  <label for="project-type">Project Type:</label>
  <input type="text" name="project-type" value="<?php echo $row['project_type']; ?>" required><br>

  <label for="assigned-to">Assigned To:</label>
<select name="assigned-to[]" multiple>
    <?php
        $assignedToArr = json_decode($row['assigned_to'], true);
        foreach ($teamMembers as $member) {
            $selected = in_array($member, $assignedToArr) ? 'selected' : '';
            echo "<option value=\"$member\" $selected>$member</option>";
        }
    ?>
</select><br>



  <label for="project_status">Project Status:</label>
<select name="project_status" required>

  <option value="" disabled selected class="faded">Select...</option>
  <option value="discovery" <?php if ($row['status'] == 'discovery') { echo 'selected'; } ?>>discovery</option>
  <option value="pending" <?php if ($row['status'] == 'pending') { echo 'selected'; } ?>>pending</option>
  <option value="scoping" <?php if ($row['status'] == 'scoping') { echo 'selected'; } ?>>scoping</option>
  <option value="in-progress" <?php if ($row['status'] == 'in-progress') { echo 'selected'; } ?>>in-progress</option>
  <option value="completed" <?php if ($row['status'] == 'completed') { echo 'selected'; } ?>>completed</option>
  <option value="consideration" <?php if ($row['status'] == 'consideration') { echo 'selected'; } ?>>consideration</option>
</select><br>

  <label for="end-date">End Date:</label>
  <input type="date" name="end-date" value="<?php echo $row['end_date']; ?>"><br>



  <button type="submit">Update</button>
</form>

</div>

</body>
</html>

<?php

    
mysqli_close($conn);
?>
