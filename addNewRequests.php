<?php
session_start();
if(isset($_SESSION["admin"]))
{   
 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <style>
          .container{
              box-shadow: 10px 10px 5px #aaaaaa;
          }
          .card{
               box-shadow: 5px 10px #888888;
          }
          
          
          .card-text{
              padding:10px;
          }
          
          .col-lg-5{
             box-shadow: 10px 10px 8px #888888;
              margin: 10px;
               
          }
          
      </style>
     
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
  
<script>  
function PasswordValidation(){  

var password = document.myform.UserPassword.value;  
 var password2 = document.myform.ConfirmPassword.value;  
 if(password.length<6 || password2.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  
  }
    else if(password!=password2){
        alert("Both Password must be same!!");
        return false;
    }
    
}  
</script>  
      
    <!-- Bootstrap CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet"/>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>User Home Page</title>
  </head>
  <body>
    <div class="container" style="margin-top:5px;">
      <div class="row">
        <div class="col-lg-2" style="background-color: green;">
          <div class="row">
            <div class="col-lg-12"  style="background-color: #2e8277;height:250px;align-content:center"><img class="img-fluid" src="images/admin.jpg" style="width:150px;margin-top:10px" alt="USER"/>
              <h2 style="color:white">Welcome<strong> Admin</strong></h2>
                 
              </div>
          </div>
          <div class="row" >
            <div class="col-lg-12" style="font-size:20px;background-color: #00bfa6;height:300px">
              <p>  <a href="#changePassword" data-toggle ="modal"> <button type="submit"  class="btn btn-danger" style="color:white" name= "change_password"><span class="glyphicon glyphicon-off"></span>  Change Password</button></a></p>
                <!-- Button trigger modal -->

<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="HomeDatabase.php" name = "myForm" method="post" onsubmit="return PasswordValidation()">
  
           <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="UserPassword" class="form-control" id="exampleInputPassword1" placeholder="New Password" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name="ConfirmPassword" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" required>
  </div>
 
  <button type="submit" name = "SubmitP" class="btn btn-primary">Change</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                
                
                <p>  <a href="logout.php"> <button type="submit"  class="btn btn-danger" style="color:white" name= "logout"><span class="glyphicon glyphicon-off"></span>  logout</button></a></p>
              
               
            </div>
          </div>
        </div>
        <div class="col-lg-10" style="background-color: #added7;height:550px">
          <a href="admin.php"><button style="margin-top:5px"><span class="glyphicon glyphicon-home"></span> Home</button></a>
           
            
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" >
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>
            <div class="row">
                
                <div class="col-sm-12">
                    <div class="jumbotron jumbotron-fluid">
 
    <h3 class="display-4">New Requests</h3>
     <h4>These services are not provided by our company, would you like to add these new services....</h4>

</div>
                   
                <?php 
include('dbcon.php');
if($conn->connect_error){
    die("Connection failed : ".$connet_error);
}
else
{
    $query = "SELECT * FROM requests where available = 'not'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)=='0'){
        echo "No new Requests.";
    }
    else
    {
      
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
      
      <td><form action = "HomeDatabase.php" method = "post"><button type = "submit" class = "btn btn-primary" value="'.$array['type'].'" name ="AddThisService">Add Service</button>
    </form></td>
    
    <td><form action = "HomeDatabase.php" method = "post">
    
        <button type = "submit" class = "btn btn-danger" value="'.$array['type'].'" name = "deleteThisService" >Delete Service</button>
    </form></td>
    
    </tr>';  
    }
    
    }
    mysqli_close($conn);
}
?>
                
                </div>
            </div>
        </div>
      </div>
    </div>
      <!-- add requested services Modal -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </body>
</html>

<?php 
}

else 
{
    header('location:index.php');
}

?>
