
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
    $query = "SELECT * FROM ticket";
    $result =  mysqli_query($conn, $query);
    $id = 0;
    $status ='';
    while($array = mysqli_fetch_array($result)){
        if($array['status']=='open'){
            $type = "danger";
            $status = "Open";
        }
        else{
            $type = "success";
            $status = "Closed";
        }
        
        echo '<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="heading'.$id.'">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$id.'" aria-expanded="true" aria-controls="collapse'.$id.'">
          <span style="color:blue"><b>Ticket#'.$array['ticket_id'].'</b> <span class="badge badge-pill badge-'.$type.'">'.$status.'</span><br><small>Created on: '.$array['posting_tIme'].'</small></span>
        </button>
      </h5>
    </div>

    <div id="collapse'.$id.'" class="collapse" aria-labelledby="heading'.$id.'" data-parent="#accordionExample">
      <div class="card-body">
        <p><b>Email: </b>'.$array['email'].'</p>
        <p><b>Urgency: </b>'.$array['priority'].'</p>
        <p><b>Subject: </b>'.$array['subject'].'</p>
        <p><b>Ticket: </b>'.$array['ticket'].'</p>
        
        <form action = "HomeDatabase.php" method = "post">
  <div class="form-group">
    <label for="remark"><span style="font-weight: bold">Remark</span></label>
    <textarea name = "remark" class="form-control" id="remark" rows="3" placeholder = "'.$array['status'].', Your Remark : '.$array['remark'].'" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name = "AdminRemarkButton" value = "'.$array['ticket_id'].'">Update</button>
</form>
        
      </div>
    </div>
  </div>
  
  
</div>';
        $id = $id+1;
    }
}

?>
      
    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>