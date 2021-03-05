<?php
session_start();
if(isset($_SESSION["user"]))
{   
  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <script>  
function validateForm(){  
var name=document.myform.email.value;  
    var contact=document.myform.contact.value;
var password=document.myform.password.value;  
 var password2=document.myform.confirmPassword.value;  
if (name==null || name==""){  
  alert("Name can't be blank"); 
    
  return false;  
}
    else if(contact.length>10 || contact.length<10){
            alert("Contact must contain 10 digits.")
            }
    else if(password.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  
  }
    else if(password!=password2){
        alert("Both Password must be same!!");
        return false;
    }
    
}  
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
              <h2>Welcome,</h2>
                 
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
                <p><a href="#" style="color:white"><span class="glyphicon glyphicon-pencil"></span>  Change Password</a></p>
                
                <button class="btn btn-danger" style="color:white"><span class="glyphicon glyphicon-off"></span>  logout</button>
            </div>
          </div>
        </div>
        <div class="col-lg-10" style="background-color: #added7;height:550px;">
          
          <a href="#"><button style="margin-top:5px"><span class="glyphicon glyphicon-home"></span> Home</button></a>
            <!-- view area-->
            <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="User.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
  </ol>
</nav>
           
            
                <div class="Form" style="margin-left:50px;"><form name="myform" action="HomeDatabase.php" method="post" onsubmit = "return validateForm()">
  <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="email" type="text" class="form-control" name="email" placeholder="Email" required>
  </div>
                     <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="contact" type="varchar" class="form-control" name="contact" placeholder="contact" required>
  </div>
  <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
  </div>
  <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="msg" type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required>
  </div>
      <button type="submit" style="margin-top:15px;margin-bottom:10px;" class="btn btn-primary"  name="submit" >Change Now!</button>
    
</form></div>
            

        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
  </body>
</html>

<?php 
}
else 
{
    header('location:index.php');
}
?>