<?php
session_start();
$message = "";
$USER = $_SESSION['user'];
 //check if form was submitted
  
 // Create connection
include('dbcon.php');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        
        $q1 = "select * from user where email = '$USER'";
        $res=mysqli_query($conn,$q1);
        $array = mysqli_fetch_array($res);
 mysqli_close($conn);
} 

if(isset($_POST['submit'])){ //check if form was submitted
 
  
    $contact = $_POST['contact'];
    $name  = $_POST['name'];
    $address = $_POST['address'];
    
    $email = $_SESSION['user'];
    
 // Create connection
include('dbcon.php');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        
        
        $sql = "update user set contact = '$contact', name = '$name', address ='$address'  where email = '$email'";
        $result = mysqli_query($conn, $sql);
           print "<p>Successfull updation</p>";
      header('location: userProfile.php');
      mysqli_close($conn);
} 
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <script>  
</script>  
      
      <style>
          .container{
              box-shadow: 10px 10px 5px #aaaaaa;
          }
          
          .Form{
              padding-left: 50px;
              background-color: #4da397;
              width: 400px;
              box-shadow: 10px 10px 8px #888888;
          }
      </style>
     
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
            <div class="col-lg-12"  style="background-color: #2e8277;height:250px;align-content:center"><img class="img-fluid" src="images/user.svg" style="width:150px;margin-top:10px" alt="USER"/>
              <h2 style="color:white">Welcome</h2><p style="color:white"><?php echo $array["name"]?></p>
                 
              </div>
          </div>
          <div class="row">
            <div class="col-lg-12" style="font-size:20px;background-color: #00bfa6;height:300px">
             <p style="padding-top:15px;"><a href="User.php" style="color:white;"><span class="glyphicon glyphicon-dashboard"></span>  Dashboard</a></p> 
                <p> <a href="#" style="color:white"><span class="glyphicon glyphicon-list-alt"></span>  Profile</a></p>
               
                <p> <a href="#" style="color:white"><span class="glyphicon glyphicon-edit"></span>  Request</a></p>
               
                <p><a href="#" style="color:white"><span class="glyphicon glyphicon-pencil"></span>  Create Ticket</a></p>
                
                <p><a href="#" style="color:white"><span class="glyphicon glyphicon-eye-open"></span>  View Ticket</a>
                </p>
                <p><a href="passwordChange.php" style="color:white"><span class="glyphicon glyphicon-pencil"></span>  Change Password</a></p>
                
                <a href="logout.php"> <button type="submit"  class="btn btn-danger" style="color:white" name= "logout"><span class="glyphicon glyphicon-off"></span>  logout</button></a>
            </div>
          </div>
        </div>
        <div class="col-lg-10" style="background-color: #added7;height:550px;">
          
          <a href="#"><button style="margin-top:5px"><span class="glyphicon glyphicon-home"></span> Home</button></a>
            <!-- view area-->
            <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="User.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $array["name"] ?>'s Profile</li>
  </ol>
</nav>
           
            
                <div class="Form" style="margin-left:50px;"><form name="myform" action="" method="post" onsubmit="return validateForm()">
                    
  <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="email" type="text" class="form-control" name="email" value ="<?php echo $array["email"] ?>" placeholder="Email" disabled required>
  </div>
                     <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="contact" name = "contact" type="text" class="form-control" value ="<?php echo $array["contact"] ?>" placeholder="Contact" required>
  </div>
  <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="name" type="text" class="form-control" name="name" value ="<?php echo $array["name"] ?>" placeholder="Name"required>
  </div>
  <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="address" type="text" class="form-control" name="address" value ="<?php echo $array["address"] ?>"  placeholder="Address" required>
  </div>
      <button type="submit" style="margin-top:15px;margin-bottom:10px;" class="btn btn-primary"  name="submit" >Update Now!</button>
    
</form></div>
            

        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
  </body>
</html>
