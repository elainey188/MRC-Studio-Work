<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $projectTitle = $_POST['project-title'];
  $projectDescription = $_POST['project-description'];
  $partnerCompany = $_POST['partner-company'];
  $startDate = $_POST['start-date'];
  $fundType = $_POST['fund-type'];
  $projectType = $_POST['project-type'];
  $projectStatus = isset($_POST['project-status']) ? $_POST['project-status'] : null;
  $endDate = isset($_POST['end-date']) ? $_POST['end-date'] : null;
  $assignedTo = isset($_POST['assigned-to']) ? json_encode($_POST['assigned-to']) : null;

  
  $conn = new mysqli('localhost','root','elaine12','operations');
  if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
  } else {
    $stmt = $conn->prepare("INSERT INTO projects(project_title,project_description, partner_company, start_date, fund_type, project_type, status, end_date, assigned_to) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $projectTitle,$projectDescription, $partnerCompany, $startDate, $fundType, $projectType, $projectStatus, $endDate, $assignedTo);
    $execval = $stmt->execute();
    echo $execval;
    echo "Project added successfully...";
    $stmt->close();
    $conn->close();

  
    header("Location: index.php");
    exit();
  }
}
?>
