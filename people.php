<!DOCTYPE html>
<html>
<head>
	<title>MRC Team</title>
    <link rel="stylesheet" href="index.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<script>
		function toggleForm() {
			var form = document.getElementById("addPersonForm");
			form.style.display = (form.style.display === "none") ? "block" : "none";
		}
        function closeForm() {
			document.getElementById("addPersonForm").style.display = "none";
			document.getElementById("open-form-btn").style.display = "block";
		}
       

	</script>
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
  <form method="get" style="width: 500px;">
  <input type="text" id="query" name="query" placeholder="Search Members..." style=" font-family: Cabin, sans-serif; font-size: 20px; padding: 10px;">
  <button type="submit" style="font-family: Cabin, sans-serif; font-size: 20px; padding: 10px;">Go</button>
</form><br/>
	<button type="button" onclick="toggleForm()" style="font-size: 44px;">+</button>


	<form id="addPersonForm" action="add_person.php" method="POST" style="display:none;">
		<label for="first_name">First Name:</label>
		<input type="text" name="first_name" required>

		<label for="last_name">Last Name:</label>
		<input type="text" name="last_name" required>

	  <label for="employee_type">Employee Type:</label>
    <select name="employee_type" required>
    <option value="" disabled selected class="faded">Select...</option>
        <option value="PI">PI</option>
        <option value="Associate">Associate</option>
        <option value="Assistant">Assistant</option>
        <option value="WorkStudy">WorkStudy</option>
        <option value="PAS">PAS</option>
    </select>

        <button type="submit" id="add-person-btn">Add Person</button>


        <button type="button" onclick="closeForm()">X</button>
	</form>
  <table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Employee Type</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

  
  <?php
// Database connection code
$host = 'localhost'; 
$user = 'root';
$password = 'elaine12';
$database = 'operations';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$search_query = isset($_GET['query']) ? $_GET['query'] : '';
$sql = "SELECT * FROM people";
if ($search_query) {
  $sql .= " WHERE first_name LIKE '%" . $search_query . "%' OR last_name LIKE '%" . $search_query . "%'";
}

$sql .= " ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
  echo "No search results found.";
} else {

  
  while ($row = mysqli_fetch_assoc($result)) {
    if (!$search_query || stripos($row['first_name'], $search_query) !== false || stripos($row['last_name'], $search_query) !== false) {
      echo "<tr>";
      echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
      echo "<td>" . $row['employee_type'] . "</td>";
      echo "<td>
        <a href=\"view_person.php?id=" . $row['id'] . "\"><i class=\"fa fa-eye\"></i></a> &nbsp;
        <a href=\"delete_person.php?id=" . $row['id'] . "\"><i class=\"fa fa-trash\"></i></a> &nbsp;
        <a href=\"edit_person.php?id=" . $row['id'] . "\"><i class=\"fa fa-edit\"></i></a>
      </td>";
      echo "</tr>";
    }
  }
}

mysqli_close($conn);
?>

  </tbody>
</table>



</body>
</html>
