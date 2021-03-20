<?php 
include('dbcon.php');
if($conn->connect_error){
    die("Connection failed : ".$connet_error);
}
else
{
    $query = "SELECT * FROM services";
    $result = mysqli_query($conn, $query);
    
    echo '<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Service Name</th>
      <th scope="col">Available</th>
      
      <th scope="col">Remove</th>
    </tr>
  </thead>';
    while($array = mysqli_fetch_array($result)){
       
        echo '
  <tbody>
    <tr>
      <th scope="row">'.$array['Sno'].'</th>
      <td>'.$array['type'].'</td>
      <td>'.$array['current_status'].'
      <form action = "HomeDatabase.php" method = "post">
        <input type ="text" name = "available" value = "'.$array['current_status'].'" hidden>
        <button type = "submit" value="'.$array['Sno'].'" id ="suspendService" name = "suspendService">Change</button>
    </form></td>
    <td><form action = "HomeDatabase.php" method = "post">
        <button type = "submit" value="'.$array['Sno'].'" id = "deleteService" name = "deleteService")">Delete Service</button>
    </form></td>
    
    </tr>';
    
    }
    mysqli_close($conn);
}
?>