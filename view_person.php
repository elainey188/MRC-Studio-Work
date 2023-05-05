<!DOCTYPE html>
<html>
<head>
	<title>MRC Team</title>
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
      <li><a href="people.php">Back to Members</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
    </nav>
  </header>

  <?php
$host = 'localhost'; 
$user = 'root';
$password = 'elaine12';
$database = 'operations';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $person_id = $_GET['id'];
  
    $person_query = "SELECT * FROM people WHERE id = $person_id";
    $person_result = mysqli_query($conn, $person_query);
    $person = mysqli_fetch_assoc($person_result);
  
    $project_query = "SELECT * FROM projects p JOIN project_people pp ON p.id = pp.project_id WHERE pp.people_id = $person_id ORDER BY p.start_date DESC";
    $project_result = mysqli_query($conn, $project_query);
  
    if (mysqli_num_rows($project_result) > 0) {
      echo "<br/><br/><h3>{$person['first_name']} {$person['last_name']}'s projects</h3>";
      echo "<table>";
      echo "<thead>";
      echo "<tr><th>Project ID</th><th>Project Title</th><th>Start Date</th><th>End Date</th>";
      echo "</thead>";
      echo "<tbody>";
      while ($row = mysqli_fetch_assoc($project_result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['project_title']}</td>";
        echo "<td>{$row['start_date']}</td>";
        echo "<td>{$row['end_date']}</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
    } else {
      echo "<br/>No projects found for this person.";
    }
  
    mysqli_close($conn);
  }
  
?>
</body>
</html>