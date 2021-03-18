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
              <button type="button" name = "logout" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><span class="glyphicon glyphicon-pencil"></span> 
Change Password
</button>
                <p>  <a href="logout.php"> <button type="submit"  class="btn btn-danger" style="color:white" name= "logout"><span class="glyphicon glyphicon-off"></span>  logout</button></a></p>
              
               
            </div>
          </div>
        </div>
        <div class="col-lg-10" style="background-color: #added7;height:550px">
          <a href="#"><button style="margin-top:5px"><span class="glyphicon glyphicon-home"></span> Home</button></a>
           
            
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" >
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>
            
            <div class="row" style="align-content:center;">
            <div class="col-lg-5" style="background-color: #f55538; height:100px"><a href="" style="color:white;text-decoration: none;"><h3><span class="glyphicon glyphicon-user"></span>  Overall Visitors</h3></a><br>
                <div class="col-sm-6" style="border-right: 2px solid #d93214;text-align: center;">Div1</div><div class="col-sm-6" style="text-align: center;">Div2</div>
                </div>
            <div class="col-lg-5" style="background-color: ORANGE;height:100px"><a href="#" style="color:white;text-decoration: none;"><h3><span class="glyphicon glyphicon-comment"></span>  Registered Users</h3></a><br>
                <div class="col-sm-6" style="border-right: 2px solid #c78202;text-align: center;">Overall: <span class="badge badge-secondary"><?php require('HomeDatabase.php');
                    echo $num;
                    ?></span></div><div class="col-sm-6" style="text-align: center;">Today: <span class="badge badge-secondary"><?php require('HomeDatabase.php');
                    echo $today;
                    ?></span></div></div>
            </div>
            
            <div class="row">
            <div class="col-lg-5" style="background-color: violet;height:100px"><a href="" style="color:white;text-decoration: none;"><h3><span class="glyphicon glyphicon-pencil"></span>  Quotes requests</h3></a><br>
                <div class="col-sm-6" style="border-right: 2px solid #c225bd;text-align: center;">Div1</div><div class="col-sm-6" style="text-align: center;">Div2</div></div>
            <div class="col-lg-5" style="background-color: #25d976;height:100px"><a href="" style="color:white;text-decoration: none;"><h3><span class="glyphicon glyphicon-eye-open"></span> Overall Tickets </h3></a><br>
                <div class="col-sm-6" style="border-right: 2px solid #17a356;text-align: center;">Div1</div><div class="col-sm-6" style="text-align: center;">Div2</div></div>
            </div>
            
             <div class="row">
            <div class="col-lg-5" style="background-color: orange;height:100px"><a href="#AddNewService" data-toggle="modal"style="color:white;text-decoration: none;"><h3><span class="glyphicon glyphicon-pencil"></span>  Add New Service</h3></a><br>
                <div class="col-sm-6" style="border-right: 2px solid #c225bd;text-align: center;">Div1</div><div class="col-sm-6" style="text-align: center;">Div2</div></div>
                <!-- New service add modal -->
                
<!-- Modal -->
<div class="modal fade" id="AddNewService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel" style="text-align:center">Add New Service</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="HomeDatabase.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Add Service</label>
    <input type="text" name = "service" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type service here">
    
  </div>
 
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button name = "AdminServiceAddButton" type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
          
            </div>
        </div>
      </div>
    </div>
      
<!--Change password -->
      
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password </h5>
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
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
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
