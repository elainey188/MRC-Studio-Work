<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css">
  <link rel="stylesheet" href="index.css">
  <title>Projects Gantt View</title>
	<link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<header>
    <div class="logo">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_aEwjE_hEdGeBWihBJaTIRDG2XSiSNbAlwlPB-iRhxBJsqL7DEnbuGaQmbTBWHhLim-A&usqp=CAU" alt="MRC Studio Operations Logo">
    </div>
    <h1>MRC Projects (Gantt View)</h1>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="people.php">MRC Team</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
    </nav>
</header>
<br/>
<div style="text-align: center;">
<h3>Year: 2020</h3>
</div>
<div style="text-align: right;">
  <p style="font-size: 20px;" >Other charts -> <a href="gantt_view.php" style="font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2023</a>, <a href="gantt_view_2022.php" style="font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2022</a>, <a href="gantt_view_2021.php" style=" font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2021</a></p>
</div>

<br/><br/>
<script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div id="gantt_chart"></div>


<script type="text/javascript">
  google.charts.load('current', {'packages':['gantt']});
  google.charts.setOnLoadCallback(drawChart);


  function drawChart() {
 
  
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Task ID');
    data.addColumn('string', 'Task Name');
    data.addColumn('date', 'Start Date');
    data.addColumn('date', 'End Date');
    data.addColumn('number', 'Duration');
    data.addColumn('number', 'Percent Complete');
    data.addColumn('string', 'Dependencies');

    data.addRows([
    ['1', 'Human Interface Catch Driver VR', new Date(2020, 7, 3), new Date(2020, 10, 13), 102, 100, ''],
    ['2', 'Digital Asset Pipeline Improvements', new Date(2020, 7, 3), new Date(2020, 10, 6), 95, 100, '']
]);




    

    var options = {
      height: 900,
      gantt: {
        trackHeight: 35,
        barCornerRadius: 5,
        barHeight: 30,
        labelStyle: {
          fontName: 'sans-serif',
          fontSize: 14,
          color: 'white'
        }
      }
    };


var chart = new google.visualization.Gantt(document.getElementById('gantt_chart'));
chart.draw(data, options);


   } 
</script>

</body>
</html>
