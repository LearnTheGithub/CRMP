<?php 
include('dbcon.php');
if($conn->connect_error){
    die("Connection failed : ".$connet_error);
}
else
{
    $query = "SELECT * FROM requests where status = 'NO'";
    $result = mysqli_query($conn, $query);
    
    echo '<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">New Request</th>
      <th scope="col">Requested by</th>
      <th scope="col">Add</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>';
    while($array = mysqli_fetch_array($result)){
       
        echo '
  <tbody>
    <tr>
      <th scope="row">'.$array['type'].'</th>
      
      <td>'.$array['email'].'</td>
      
      <td><form action = "HomeDatabase.php" method = "post"><button type = "submit" class = "btn btn-primary" value="'.$array['type'].'" name ="AddThisService">Change</button>
    </form></td>
    
    <td><form action = "HomeDatabase.php" method = "post">
    
        <button type = "submit" class = "btn btn-danger" value="'.$array['type'].'" name = "deleteThisService" >Delete Service</button>
    </form></td>
    
    </tr>';
    
    }
    mysqli_close($conn);
}
?>