<!DOCTYPE html>

<?php
// Database connection
$conn = new mysqli('localhost','root','elaine12','operations');
if ($conn->connect_error) {
  echo "$conn->connect_error";
  die("Connection Failed: " . $conn->connect_error);
} else {
  
  $sql = "SELECT * FROM projects ORDER BY start_date DESC";
  $result = $conn->query($sql);
}
$filter = isset($_GET['status-filter']) ? $_GET['status-filter'] : 'all';
if ($filter !== 'all') {
  $sql = "SELECT * FROM projects WHERE status='$filter' ORDER BY start_date DESC";
} else {
  $sql = "SELECT * FROM projects ORDER BY start_date DESC";
}
$result = $conn->query($sql);
?>


<html>
<head>
  <title>MRC Studio Operations</title>
  <link rel="stylesheet" href="index.css">
  <link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script>


    window.addEventListener('DOMContentLoaded', () => {

      
      const addProjectButton = document.getElementById('add-project-button');
      const modalContainer = document.getElementById('modal-container');
      const closeButton = document.getElementById('close-button');

      addProjectButton.addEventListener('click', () => {
        modalContainer.style.display = 'block';
      });

      closeButton.addEventListener('click', () => {
        modalContainer.style.display = 'none';
      });

      var projectCount = document.getElementsByClassName('project').length;
      var projectCountElement = document.getElementById('project-count');
      projectCountElement.textContent = '(' + projectCount + ')';

    
const completedRadioButton = document.getElementById('completed');
const endDateInput = document.getElementById('end-date');


completedRadioButton.addEventListener('change', function() {
  if (this.checked) {
    endDateInput.disabled = false;
  } else {
    endDateInput.disabled = true;
  }
});
const pendingRadioButton = document.getElementById('pending');
pendingRadioButton.addEventListener('change', function() {
  if (this.checked) {
    endDateInput.disabled = true;
  } else {
    endDateInput.disabled = true;
  }
});
const discoveryRadioButton = document.getElementById('discovery');
discoveryRadioButton.addEventListener('change', function() {
  if (this.checked) {
    endDateInput.disabled = true;
  } else {
    endDateInput.disabled = true;
  }
});
const inProgressRadioButton = document.getElementById('in-progress');
inProgressRadioButton.addEventListener('change', function() {
  if (this.checked) {
    endDateInput.disabled = true;
  } else {
    endDateInput.disabled = true;
  }
});
const scopingRadioButton = document.getElementById('scoping');
scopingRadioButton.addEventListener('change', function() {
  if (this.checked) {
    endDateInput.disabled = true;
  } else {
    endDateInput.disabled = true;
  }
});
const considerationRadioButton = document.getElementById('consideration');
considerationRadioButton.addEventListener('change', function() {
  if (this.checked) {
    endDateInput.disabled = true;
  } else {
    endDateInput.disabled = true;
  }
});

   


    });
  



    

  </script>

</head>
<body>
  <header>
    <div class="logo">
     
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_aEwjE_hEdGeBWihBJaTIRDG2XSiSNbAlwlPB-iRhxBJsqL7DEnbuGaQmbTBWHhLim-A&usqp=CAU" alt="MRC Studio Operations Logo">
    </div>
    <h1>MRC Studio Operations</h1>
    
    <nav>
      <ul>
      <li><a href="gantt_view.php">Projects Gantt View</a></li>
        <li><a href="people.php">MRC Team</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
    </nav>
  </header>

  <h2 id="projects-heading">Our Projects<span id="project-count"></span> &nbsp;<button id="add-project-button" class="add-project-button">+</button><br/></h2>

 
 <div id="filter-container" style="display: flex; justify-content: center;">
  <form id="filter-form" action="" method="GET" style="width: 500px;">
    <label for="status-filter" style="font-family: Cabin, sans-serif; font-size: 20px;">Project Status</label>
    <select id="status-filter" name="status-filter" style="font-size: 20px; font-family: Cabin, sans-serif; padding: 10px; margin: 5px;">
      <option value="all">All</option>
      <option value="completed">Completed</option>
      <option value="pending">Pending</option>
      <option value="discovery">Discovery</option>
      <option value="in-progress">In Progress</option>
      <option value="scoping">Scoping</option>
      <option value="consideration">Consideration</option>
    </select>
    <button type="submit" style=" font-family: Cabin, sans-serif; font-size: 20px; padding: 10px; margin: 5px;">Filter</button>
  </form>
</div>


  
 <form action="search.php" method="get" style="width: 500px;">
  <input type="text" name="query" placeholder="Search Projects..." style="font-size: 20px; font-family: Cabin, sans-serif; padding: 10px;">
  <button type="submit" style=" font-family: Cabin, sans-serif; font-size: 20px; padding: 10px;">Go</button>
</form>

<br/>





  <div id="modal-container" class="modal-container">
    <div id="modal-content" class="modal-content">
    <form id="add-project-form" class="add-project-form" action="process_form.php" method="post">
  <label for="project-title">Project Title:</label>
  <input type="text" id="project-title" name="project-title" required>
  <br/>
  <label for="project-description">Project Description:</label>
<textarea id="project-description" name="project-description" rows="4" cols="50" maxlength="200" required></textarea>
<span id="description-message" style="color: gray; font-size: 12px;">Max length allowed: 200 characters</span>


  <br/>
  <label for="partner-company">Partner Company:</label>
  <input type="text" id="partner-company" name="partner-company" required>
  <br/>
  <label for="start-date">Start Date:</label>
  <input type="date" id="start-date" name="start-date" required>
  <br/>
  <label for="fund-type">Fund Type:</label>
  <input type="text" id="fund-type" name="fund-type" required>
  <br/>
  <label for="project-type">Project Type:</label>
  <input type="text" id="project-type" name="project-type" required>
  <br/>
  <label for="project-status">Project Status:</label>
  <br>
  <input type="radio" id="discovery" name="project-status" value="discovery" checked>
  <label for="discovery">Discovery</label>
  <br>
  <input type="radio" id="pending" name="project-status" value="pending">
  <label for="pending">Pending</label>
  <br>
  <input type="radio" id="scoping" name="project-status" value="scoping">
  <label for="scoping">Scoping</label>
  <br>
  <input type="radio" id="in-progress" name="project-status" value="in-progress">
  <label for="in-progress">In-progress</label>
  <br>
  <input type="radio" id="consideration" name="project-status" value="consideration">
  <label for="consideration">Consideration</label>
  <br>
  <input type="radio" id="completed" name="project-status" value="completed">
  <label for="completed">Completed</label>
  <br>
  <br>

  <label for="end-date">End Date:</label>
  <input type="date" id="end-date" name="end-date" disabled>
<br/><br/>
  
  <label for="assigned-to">Assigned To:</label>
<div id="selected-names"></div>
<div id="people-list">
  <?php
    $people_query = mysqli_query($conn, "SELECT * FROM people ORDER BY first_name ASC, last_name ASC");
    while ($row = mysqli_fetch_assoc($people_query)) {
      $full_name = $row['first_name'] . ' ' . $row['last_name'];
      echo '<label><input type="checkbox" name="assigned-to[]" value="' . $row['id'] . '">' . $full_name . '</label>';
    }
  ?>
</div>
<script>
  const peopleList = document.getElementById("people-list");
  const selectedNamesDiv = document.getElementById("selected-names");

  const updateSelectedNames = () => {
    const selectedNames = Array.from(
      peopleList.querySelectorAll("input:checked"),
      (checkbox) => checkbox.parentNode.textContent.trim()
    );

    if (selectedNames.length === 0) {
      selectedNamesDiv.innerHTML = "No one selected yet.";
    } else {
      selectedNamesDiv.innerHTML = "";
      selectedNames.forEach((name) => {
        const selectedName = document.createElement("div");
        selectedName.classList.add("selected-name");
        const nameSpan = document.createElement("span");
        nameSpan.textContent = name;
        const removeButton = document.createElement("button");
        
        removeButton.addEventListener("click", (event) => {
          const checkbox = peopleList.querySelector(`input[value="${name}"]`);
          checkbox.checked = false;
          updateSelectedNames();
        });
        selectedName.appendChild(nameSpan);
        selectedName.appendChild(removeButton);
        selectedNamesDiv.appendChild(selectedName);
      });
    }
  };

  peopleList.addEventListener("change", (event) => {
    updateSelectedNames();
  });

  updateSelectedNames();
</script>


  <br/> 

  <input type="submit" value="Add Project">
  <button id="close-button" class="close-button">×</button>
</form>

    </div>
  </div>
  <div id="project-list">
  <?php
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    
    echo '<div class="project">';
    echo '<p style=" font-size: 33px;">' . htmlspecialchars($row['project_title']) . '</p>';

    echo '<p style="font-size: 23px;">' . htmlspecialchars($row['project_description']) . '</p><br/>';

    echo '<p><strong>Partner Company: &nbsp; </strong> ' . htmlspecialchars($row['partner_company']) . '</p>';
    echo '<p><strong>Start Date: &nbsp; </strong> ' . htmlspecialchars($row['start_date']) . '</p>';
    echo '<p><strong>Fund Type: &nbsp; </strong> ' . htmlspecialchars($row['fund_type']) . '</p>';
    echo '<p><strong>Project Type: &nbsp; </strong> ' . htmlspecialchars($row['project_type']) . '</p>';

    if ($row['assigned_to'] == "") {
      echo '<p><strong>Assigned To: &nbsp; </strong> No people assigned yet</p>';
    } else {
      echo '<p><strong>Assigned To: &nbsp; </strong> ';
    
      $assignedTo = json_decode($row['assigned_to']);
    
      $totalPeople = count($assignedTo);
      $counter = 0;
    
      foreach ($assignedTo as $personId) {
        $personQuery = "SELECT first_name, last_name FROM people WHERE id = $personId";
        $personResult = $conn->query($personQuery);
        if ($personResult->num_rows > 0) {
          while ($personRow = $personResult->fetch_assoc()) {
            echo htmlspecialchars($personRow['first_name'] . ' ' . $personRow['last_name']);
    
            $counter++;
            if ($counter != $totalPeople) {
              echo ', ';
            }
          }
        }
      }
    
      echo '</p>';
    }
    
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
  echo '<p>No projects found.</p>';
}


  ?>
</div>


  


</body>
</html>