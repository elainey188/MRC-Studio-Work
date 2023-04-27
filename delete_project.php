<!DOCTYPE html>
<html>
<head>
	<title>Delete Project</title>
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
        <li><a href="people.php">MRC Team</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
    </nav>
</header>





<?php
// Database connection
$conn = new mysqli('localhost', 'root', 'elaine12', 'operations');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!empty($_POST['project_id'])) {
  $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);
  
  if (isset($_POST['confirm_delete'])) {
    $sql = "DELETE FROM projects WHERE id='$project_id'";
    if ($conn->query($sql) === TRUE) {
      header('Location: index.php');
      exit;
    } else {
      echo "Error deleting project: " . $conn->error;
    }
  } elseif (isset($_POST['cancel_delete'])) {
    header('Location: index.php');
    exit;
  }
} else {
  echo "Project ID not provided";
}
?>

<?php if (!empty($_POST['project_id'])): ?>
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }
    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      font-size: 24px;
    }
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    .close:hover, .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>

  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>Are you sure you want to delete this project?</p>
      <form method="POST">
        <button style="font-size: 15px;" type="submit" name="confirm_delete">Yes</button>
        <button style="font-size: 15px;" type="submit" name="cancel_delete">No</button>
        <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
      </form>
    </div>
  </div>

  <script>
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    modal.style.display = "block";

    span.onclick = function() {
      modal.style.display = "none";
      window.location.href = "index.php";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
        window.location.href = "index.php";
      }
    }
  </script>
<?php endif; ?>
