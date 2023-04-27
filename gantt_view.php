
<!DOCTYPE html>
<html>
<head>
  <title>MRC Studio Projects Gantt View</title>
  <link rel="stylesheet" href="index.css">
  <link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
    <div class="logo">
     
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_aEwjE_hEdGeBWihBJaTIRDG2XSiSNbAlwlPB-iRhxBJsqL7DEnbuGaQmbTBWHhLim-A&usqp=CAU" alt="MRC Studio Operations Logo">
    </div>
    <h1>MRC Studio Projects(Gantt View)</h1>
    
    <nav>
      <ul>
      <li><a href="index.php">Back To Projects</a></li>
        <li><a href="people.php">MRC Team</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
    </nav>
  </header>
  <br/>



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
    ['task1', 'Immersive Dining Experience Design', new Date(2023, 2, 6), new Date(2023, 3, 21), 46, 0, null],
    ['task2', 'Immersive Dining Animation and Sequencing', new Date(2023, 3, 24), new Date(2023, 5, 10), 46, 0, 'task1'],
    ['task4', 'Mining Game Support', new Date(2023, 2, 6), new Date(2023, 3, 21), 46, 0, null],
    ['task5', 'Realistic Digital Creature Avatar', new Date(2023, 3, 10), new Date(2023, 4, 26), 46, 0, 'task4'],
    ['task9', 'Wrestling Motion Capture', new Date(2023, 2, 6), new Date(2023, 2, 31), 25, 0, null],
    ['task12', 'Reactor Fire Response VR Training', new Date(2023, 3, 3), new Date(2023, 3, 3), 0, 0, null],
    ['task13', 'Motion Capture and Animation', new Date(2023, 0, 30), new Date(2023, 3, 14), 74, 0, null],
    ['task14', 'Meditation PreProduction', new Date(2023, 0, 16), new Date(2023, 2, 31), 74, 0, null],
    ['task15', 'RT3D for Film Backgrounds', new Date(2023, 0, 30), new Date(2023, 2, 31), 60, 0, null],
    ['task16', '2d Rigging and Animation for RT3D', new Date(2023, 0, 23), new Date(2023, 2, 17), 53, 0, null],
    ['task17', 'Game User Analytics', new Date(2023, 0, 23), new Date(2023, 2, 17), 53, 0, null],
    ['18', 'Environment Art', new Date(2022, 2, 7), new Date(2022, 4, 13), 67, 0, ''],
  ['19', 'Discord Development (FP)', new Date(2022, 3, 11), new Date(2022, 4, 6), 25, 0, ''],
  ['20', 'Issue Tracker (FP)', new Date(2022, 3, 11), new Date(2022, 4, 6), 25, 0, ''],
  ['21', '3D Rigging and Animation', new Date(2022, 1, 7), new Date(2022, 3, 11), 63, 0, ''],
  ['22', 'Rhythm Game Preparation', new Date(2022, 0, 10), new Date(2022, 2, 18), 67, 0, ''],
  ['23', 'Meditation Experience', new Date(2022, 0, 31), new Date(2022, 2, 31), 59, 0, ''],
  ['24', 'Technical Art in Unity3D', new Date(2022, 0, 24), new Date(2022, 2, 25), 60, 0, ''],
  ['25', 'Promo Pre-Production', new Date(2022, 0, 10), new Date(2022, 2, 18), 67, 0, ''],
  ['26', 'Animation Systems', new Date(2022, 0, 10), new Date(2022, 2, 11), 60, 0, ''],
  ['27', 'Diagnosis Game Design', new Date(2022, 0, 10), new Date(2022, 1, 25), 46, 0, ''],
  ['28', 'Environment Art', new Date(2022, 0, 10), new Date(2022, 1, 25), 46, 0, ''],
  ['29', 'Web Series Animation Techniques', new Date(2021, 10, 1), new Date(2022, 0, 21), 81, 0, ''],
  ['30', 'Environment Art', new Date(2021, 11, 6), new Date(2022, 0, 21), 46, 0, ''],
  ['31', 'Meditation Experience', new Date(2021, 11, 1), new Date(2022, 0, 21), 51, 0, ''],
  ['32', 'Vtuber Workflows', new Date(2021, 7, 30), new Date(2021, 11, 3), 95, 0, ''],
  ['33', 'Creation of Environment', new Date(2021, 9, 18), new Date(2021, 11, 24), 67, 0, ''],
    
    




  ])

    var options = {
      height: 1200,
      gantt: {
        trackHeight: 30
      }
    };

    var chart = new google.visualization.Gantt(document.getElementById('gantt_chart'));
    chart.draw(data, options);
  }
</script>
