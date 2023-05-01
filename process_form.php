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
    $projectId = $stmt->insert_id; 
    $stmt->close();

   
if ($assignedTo && $projectId && $startDate && $endDate) {
  $assignedToArray = json_decode($assignedTo, true);
  foreach ($assignedToArray as $peopleId) {
    $stmt = $conn->prepare("INSERT INTO project_people(project_id, people_id, start_date, end_date) VALUES(?, ?, ?, ?)");
    $stmt->bind_param("iiss", $projectId, $peopleId, $startDate, $endDate);
    $execval = $stmt->execute();
    $stmt->close();
  }
}

$peopleIds = array(); 
$result = $conn->query("SELECT people_id FROM project_people WHERE project_id = $projectId");
while ($row = $result->fetch_assoc()) {
  $peopleIds[] = $row['people_id'];
}

foreach ($peopleIds as $peopleId) {
  $query = "SELECT Work_Terms FROM people WHERE id = $peopleId";
  $result = $conn->query($query);
  if (!$result) {
    die("Error executing query '$query': " . $conn->error);
  }
  $row = $result->fetch_assoc();
  $workTerms = json_decode($row['Work_Terms'], true);
  
  $formattedStartDate = date('F jS Y', strtotime($startDate));
  $formattedEndDate = date('F jS Y', strtotime($endDate));
  
  $workTerms[] = array(
    'start_date' => $formattedStartDate,
    'end_date' => $formattedEndDate
  );
  
  $workTermsJson = json_encode($workTerms);
  
  $stmt = $conn->prepare("UPDATE people SET Work_Terms = ? WHERE id = ?");
  $stmt->bind_param("si", $workTermsJson, $peopleId);
  $stmt->execute();
  $stmt->close();
}


echo "Project added successfully...";
$conn->close();
header("Location: index.php");
exit();


  }
}

?>
