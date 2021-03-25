
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>iframe</title>
  </head>
  <body>
      
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
      <th scope="col">Change</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>';
     $serial = 1;
    while($array = mysqli_fetch_array($result)){
      
        echo '
  <tbody>
    <tr>
      <th scope="row">'.$serial.'</th>
      <td>'.$array['type'].'</td>
      <td>'.$array['current_status'].'</td>
      <td><form action = "HomeDatabase.php" method = "post">
        <input type ="text" name = "available" value = "'.$array['current_status'].'" hidden>
        <button type = "submit" class ="btn btn-primary" value="'.$array['Sno'].'" id ="suspendService" name = "suspendService">Change</button>
    </form></td>
    <td><form action = "HomeDatabase.php" method = "post">
        <button type = "submit" class ="btn btn-danger" value="'.$array['Sno'].'" id = "deleteService" name = "deleteService")">Delete Service</button>
    </form></td>
    </tr>';
    $serial = $serial+1;
    }
    mysqli_close($conn);
}
?>
    
       
      
    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>