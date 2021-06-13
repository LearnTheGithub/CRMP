<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
        
        
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Service', 'TOTAL'],
          <?php 
include('dbcon.php');
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        $query = "SELECT type, COUNT(type) as total FROM requests GROUP BY type;";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
    ?>
            
    ['<?php echo $row['type']; ?>', <?php echo $row['total']; ?> ],

<?php   
}
        mysqli_close($conn);
        
    }

?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
      <button type="button" onclick = "location.href = 'admin.php'">GO BACK</button>
 
    <div id="piechart" style="width: 900px; height: 500px;"></div>
       </body>
</html>
