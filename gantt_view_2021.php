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

<div style="text-align:center;">
  <h3>Year: 2021</h3><br/>
</div>
<div style="text-align: right;">
  <p style="font-size: 20px;" >Other charts -> <a href="gantt_view.php" style="font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2023</a>, <a href="gantt_view_2022.php" style="font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2022</a>, <a href="gantt_view_2020.php" style=" font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2020</a></p>
</div>

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
      ['1', 'Vtuber Workflows', new Date(2021, 7, 30), new Date(2021, 11, 3), 95, 100, null],
      ['2', 'Creation of Environment', new Date(2021, 9, 18), new Date(2021, 11, 24), 67, 100, null],
      ['3', 'Graphics Assisted Illustration', new Date(2021, 7, 3), new Date(2021, 8, 24), 52, 100, null],
      ['4', 'Background Animation in Unity3D', new Date(2021, 8, 20), new Date(2021, 9, 22), 32, 100, null],
      ['5', 'Wobbly Knight VR', new Date(2021, 5, 21), new Date(2021, 8, 3), 74, 100, null],
      ['6', 'Fire Tonight UX', new Date(2021, 4, 3), new Date(2021, 6, 2), 60, 100, null],
      ['7', 'The Big Con Testing', new Date(2021, 2, 1), new Date(2021, 3, 30), 60, 100, null],
      ['8', 'Fire Tonight Testing', new Date(2021, 0, 11), new Date(2021, 2, 26), 74, 100, null],
      ['9', 'Wildwood Graphic Fidelity', new Date(2021, 0, 9), new Date(2021, 2, 24), 74, 100, null],
      ['10', 'Web Series Animation Techniques', new Date(2021, 10, 1), new Date(2022, 0, 21), 100, 100, null],
      ['11', 'Environment Art', new Date(2021, 11, 6), new Date(2022, 0, 21), 100, 100, null],
      ['12', 'Meditation Experience', new Date(2021, 11, 1), new Date(2022, 0, 21), 100, 100, null]
    ]);

    var options = {
      height: 600,
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
