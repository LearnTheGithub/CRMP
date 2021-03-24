
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
    die("Connection Error: ".connect_error);
}
else{
    $query = "SELECT * FROM requests ";
    $result =  mysqli_query($conn, $query);
    $id = 1;
    $status ='';
    echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">EMAIL</th>
      <th scope="col">NAME</th>
      <th scope="col">CONTACT</th>
      <th scope="col">SERVICE REQUESTED</th>
      <th scope="col">CHECK</th>
    </tr>
  </thead><tbody>';
    while($array = mysqli_fetch_array($result)){
       if($array['Seen']=='not'){
           $type = "danger";
           $submit = "Look it";
       }
        else 
        {
           $type = "success";
           $submit = "Seen"; 
        }
        echo '
            
  
    <tr>
      <td>'.$id.'</td>
      <td>'.$array['email'].'</td>
      <td>'.$array['name'].'</td>
      <td>'.$array['contact'].'</td>
       <td>'.$array['type'].'</td>
       <td><form action = "HomeDatabase.php" method = "post">
  
  <button name = "CheckRequest" value ="'.$array['request_id'].'" type="submit" class="btn btn-'.$type.'">'.$submit.'</span></button>
</form></td>
    </tr>
    
  
        ';
        $id = $id+1;
    }
    echo '</tbody>
</table>';
}

?>
      
    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>