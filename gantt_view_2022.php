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
<h3>Year: 2022</h3>
</div>
</div>
<div style="text-align: right;">
  <p style="font-size: 20px;" >Other charts -> <a href="gantt_view.php" style="font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2023</a>, <a href="gantt_view_2021.php" style="font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2021</a>, <a href="gantt_view_2020.php" style=" font-size: 20px; color: #0077cc; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">2020</a></p>
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
    ['1', 'Testing', new Date(2022, 9, 31), new Date(2023, 0, 20), 81, 100, null],
    ['2', 'Testing', new Date(2022, 9, 11), new Date(2023, 0, 6), 87, 100, null],
    ['3', 'Concept Art with Point Clouds', new Date(2022, 9, 31), new Date(2023, 0, 6), 67, 100, null],
    ['4', 'Virtual World Partition', new Date(2022, 9, 17), new Date(2022, 11, 23), 67, 100, null],
    ['5', 'Efficacy of Interactive Meditation Formats', new Date(2022, 9, 11), new Date(2022, 11, 16), 66, 100, null],
    ['6', 'Testing', new Date(2022, 9, 31), new Date(2022, 11, 2), 32, 100, null],
    ['7', 'MRC Arcade', new Date(2022, 8, 26), new Date(2022, 8, 30), 4, 100, null],
    ['8', 'Don Christmas Special', null, null, 0, 100,null],
    ['9', 'Narrative Animation System', new Date(2022, 7, 22), new Date(2022, 10, 11), 81, 100, null],
    ['10', 'Promo Capture', new Date(2022, 7, 15), new Date(2022, 9, 7), 53, 100, null],
    ['11', 'UE5 Environment Art', new Date(2022, 6, 25), new Date(2022, 8, 16), 53, 100, null],
    ['12', 'Development of Visual Prototyping Process', new Date(2022, 5, 20), new Date(2022, 7, 26), 67, 100, null],
    ['13', 'Unity Issue Tracker', null, null, 0, 100, null],
    ['14', 'Early Access Commercialization', new Date(2022, 4, 30), new Date(2022, 6, 29), 60, 100, null],
    ['15', 'Android Phone Port', new Date(2022, 4, 30), new Date(2022, 6, 22), 53, 100, null],
    ['16', 'Diagnosis Game Systems Exploration', new Date(2022, 4, 30), new Date(2022, 6, 22), 53, 100, null],
    ['17', 'Environment Art', new Date(2022, 2, 7), new Date(2022, 4, 13), 67, 100, null],
    ['18', 'Discord Development (FP)', new Date(2022, 3, 11), new Date(2022, 4, 6), 25, 100, null],
    ['19', 'Issue Tracker (FP)', new Date(2022, 3, 11), new Date(2022, 4, 6),25,100,null],
    ['20', '3D Rigging and Animation', new Date(2022, 1, 7), new Date(2022, 3, 11), 63, 100, null],
['21', 'Rhythm Game Preparation', new Date(2022, 0, 10), new Date(2022, 2, 18), 67, 100, null],
['22', 'Meditation Experience', new Date(2022, 0, 31), new Date(2022, 2, 31), 59, 100, null],
['23', 'Technical Art in Unity3D', new Date(2022, 0, 24), new Date(2022, 2, 25), 60, 100, null],
['24', 'Promo Pre-Production', new Date(2022, 0, 10), new Date(2022, 2, 18), 67, 100, null],
['25', 'Animation Systems', new Date(2022, 0, 10), new Date(2022, 2, 11), 60, 100, null],
['26', 'Diagnosis Game Design', new Date(2022, 0, 10), new Date(2022, 1, 25), 46, 100, null],
['27', 'Environment Art', new Date(2022, 0, 10), new Date(2022, 1, 25), 46, 100, null],
]
    )
    







    

    var options = {
      height: 1500,
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

gantt.config.tooltip = {
  template: function (task) {
    var durationInWeeks = Math.round(gantt.calculateDuration(task.start_date, task.end_date) / 7);
    return "<div class='gantt_tooltip'>" +
      "<div><strong>Task:</strong> " + task.text + "</div>" +
      "<div><strong>Start Date:</strong> " + gantt.templates.tooltip_date_format(task.start_date) + "</div>" +
      "<div><strong>End Date:</strong> " + gantt.templates.tooltip_date_format(task.end_date) + "</div>" +
      "<div><strong>Duration:</strong> " + durationInWeeks + " weeks</div>" +
      "</div>";
  }
};

var chart = new google.visualization.Gantt(document.getElementById('gantt_chart'));
chart.draw(data, options);


   } 
</script>

</body>
</html>
