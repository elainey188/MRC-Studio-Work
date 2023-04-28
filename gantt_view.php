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
<h3>Year: 2023</h3>
</div>
<div style="text-align: right;">
  <p style="font-size: 20px;" >Older charts -> <a href="gantt_view_2022.php" style="font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2022</a>, <a href="gantt_view_2021.php" style="font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2021</a>, <a href="gantt_view_2020.php" style=" font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2020</a></p>
</div>


<br/>
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
        ['1', 'Immersive Dining Experience Design', null, null, 0, 0, null],
        ['2', 'Immersive Dining Animation and Sequencing', null, null, 0, 0, null],
        ['3', 'Surgery Game Avatar Creation', null, null, 0, 0, null],
        ['4', 'Mining Game Support', new Date(2023, 2, 6), new Date(2023, 3, 21), 46, 50, null],
        ['5', 'Realistic Digital Creature Avatar', new Date(2023, 3, 10), new Date(2023, 4, 26), 46, 0, null],
        ['6', 'User Flow and Mechanics Prototype', null, null, 0, 0, null],
        ['7', 'Metahuman Digital Actors', null, null, 0, 0, null],
        ['8', 'Meditation Experience', null, null, 0, 0, null],
        ['9', 'Wrestling Motion Capture', new Date(2023, 2, 6), new Date(2023, 2, 31), 25, 0, null],
        ['10', 'Technical Animation Pipeline', null, null, 0, 0, null],
        ['11', 'VR Training', null, null, 0, 0, null],
        ['12', 'Reactor Fire Response VR Training', new Date(2023, 3, 3), new Date(2023, 3, 4), 1, 50, null],
        ['13', 'Motion Capture and Animation', new Date(2023, 0, 30), new Date(2023, 3, 14), 74, 100, null],
        ['14', 'Meditation PreProduction', new Date(2023, 0, 16), new Date(2023, 2, 31), 74, 100, null],
        ['15', 'RT3D for Film Backgrounds', new Date(2023, 0, 30), new Date(2023, 2, 31), 60, 100, null],
        ['16', '2d Rigging and Animation for RT3D', new Date(2023, 0, 23), new Date(2023, 2, 17), 53, 100, null],
        ['17', 'Game User Analytics', new Date(2023, 0, 23), new Date(2023, 2, 17), 53, 100, null],
        ['18', 'Story Systems', new Date(2023, 0, 23), new Date(2023, 2, 17), 53, 100, null]
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
