<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $projectId = $_POST['project-id'];
  $projectTitle = $_POST['project-title'];
  $projectDescription = $_POST['project-description'];
  $partnerCompany = $_POST['partner-company'];
  $startDate = $_POST['start-date'];
  $fundType = $_POST['fund-type'];
  $projectType = $_POST['project-type'];
  $completed = isset($_POST['completedCheckbox']) ? 1 : 0;
  $endDate = isset($_POST['end-date']) ? $_POST['end-date'] : null;

  // Database connection
  $conn = new mysqli('localhost','root','elaine12','operations');
  if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
  } else {
    $stmt = $conn->prepare("UPDATE projects SET project_title=?, project_description=?, partner_company=?, start_date=?, fund_type=?, project_type=?, completed=?, end_date=? WHERE project_id=?");
    $stmt->bind_param("ssssssisi", $projectTitle, $projectDescription, $partnerCompany, $startDate, $fundType, $projectType, $completed, $endDate, $projectId);
    $execval = $stmt->execute();
    echo $execval;
    echo "Project updated successfully...";
    $stmt->close();
    $conn->close();
  }
}
?>
