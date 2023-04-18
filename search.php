<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
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
      <li><a href="index.php">Back To Projects</a></li>
        <li><a href="people.php">MRC Team</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
    </nav>
  </header>
  <br/>
  <h1>Search Results</h1>
  <?php
  
  $conn = new mysqli('localhost', 'root', 'elaine12', 'operations');
  if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
  } else {
 
    $search_query = $_GET['query'];

    
    $sql = "SELECT * FROM projects WHERE project_title LIKE '%$search_query%' OR project_description LIKE '%$search_query%' OR partner_company LIKE '%$search_query%' OR fund_type LIKE '%$search_query%' OR project_type LIKE '%$search_query%' OR status LIKE '%$search_query%' ORDER BY start_date DESC";

 
    $result = $conn->query($sql);

   
    if (mysqli_num_rows($result) > 0) {
    
      echo "<p>Found " . mysqli_num_rows($result) . " search result(s).</p><br/><br/><br/>";

      while ($row = $result->fetch_assoc()) {
            
    echo '<div class="project">';
    echo '<p style=" font-size: 33px;">' . htmlspecialchars($row['project_title']) . '</p>';

    echo '<p style="font-size: 23px;">' . htmlspecialchars($row['project_description']) . '</p><br/>';

    echo '<p><strong>Partner Company: &nbsp; </strong> ' . htmlspecialchars($row['partner_company']) . '</p>';
    echo '<p><strong>Start Date: &nbsp; </strong> ' . htmlspecialchars($row['start_date']) . '</p>';
    echo '<p><strong>Fund Type: &nbsp; </strong> ' . htmlspecialchars($row['fund_type']) . '</p>';
    echo '<p><strong>Project Type: &nbsp; </strong> ' . htmlspecialchars($row['project_type']) . '</p>';

    
    echo '<p><strong>Project Status: &nbsp; </strong> ' . htmlspecialchars($row['status']) . '</p>';

    if ($row['end_date']) {
      echo '<p><strong>End Date: &nbsp; </strong>  ' . htmlspecialchars($row['end_date']) . '</p>';
    }


    echo '<div class="project-actions">';
    echo '<form method="post" action="edit_project.php">';
    echo '<input type="hidden" name="project_id" value="' . $row['id'] . '">';
    echo '<button type="submit" name="edit_project"><i class="fas fa-edit"></i></button>';
    echo '</form>';

    echo '<form method="post" action="delete_project.php">';
    echo '<input type="hidden" name="project_id" value="' . $row['id'] . '">';
    echo '<button type="submit" name="delete_project"><i class="fas fa-trash"></i></button>';
    echo '</form>';
    echo '</div>';

    echo '</div>';

      }
    } else {
      echo "<p>No results found.</p>";
    }
  }
?>

</body>
</html>
