<?php
session_start();
if(isset($_SESSION["user"]))
{   
  include('HomeDatabase.php');

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
            <div class="col-lg-12"  style="background-color: #2e8277;height:250px;align-content:center"><img class="img-fluid" src="images/user.svg" style="width:150px;margin-top:10px" alt="USER"/>
              <h2>Welcome</h2>
                 
              </div>
          </div>
          <div class="row" >
            <div class="col-lg-12" style="font-size:20px;background-color: #00bfa6;height:320px">
             <p style="padding-top:15px;"><a href="#" style="color:white;"><span class="glyphicon glyphicon-dashboard"></span>  Dashboard</a></p> 
                <p> <a data-toggle="modal" href="#profileModal" style="color:white"><span class="glyphicon glyphicon-list-alt"></span>  Profile</a></p>


<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align:center">
        <h3 class="modal-title" id="exampleModalLabel">Hi <?php echo $array["name"] ?>, Your Profile</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-left:50px">
          
          <form name="myform" action="" method="post" onsubmit="return validateForm()">
                    
  <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input id="email" type="text" class="form-control" name="email" value ="<?php echo $array["email"] ?>" placeholder="Email" disabled required>
  </div>
                     <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
    <input id="contact" name = "contact" type="text" class="form-control" value ="<?php echo $array["contact"] ?>" placeholder="Contact" required>
  </div>
  <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="name" type="text" class="form-control" name="name" value ="<?php echo $array["name"] ?>" placeholder="Name"required>
  </div>
  <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
    <input id="address" type="text" class="form-control" name="address" value ="<?php echo $array["address"] ?>"  placeholder="Address" required>
  </div>
      <button type="submit" style="margin-top:15px;margin-bottom:10px;" class="btn btn-primary"  name="submit" >Update Now!</button>
    
</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                
                <p> <a href="#" style="color:white"><span class="glyphicon glyphicon-edit"></span>  Request</a></p>
               
                <p><a  data-toggle="modal" href="#exampleModalLong" style="color:white"><span class="glyphicon glyphicon-pencil"></span>  Create Ticket</a></p>
                
                <!--Create Ticket Modal here -->
                <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Create Ticket </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="modal-body">
       <form action="HomeDatabase.php" method="post">
           
  <div class="form-group col-sm-12">
    <label for="subject">Subject</label>
       <input type="text"  name ="subject" class="form-control" id="subject" aria-describedby="emailHelp" placeholder="Write subject">
    </div>
            <div class="form-group col-sm-6">
      <label for="tasktype">Task Type</label>
      <select name ="type" id="tasktype" class="form-control">
        <option selected>Choose</option>
          <option>Billing</option>
        <option>Option 1</option>
          <option>Option 2</option>
          <option>Option 3</option>
      </select>
    </div>
  
           <div class="form-group col-sm-6">
      <label for="priority">Priority</label>
      <select id="priority" name="priority" class="form-control">
        <option selected>Non Urgent</option>
        <option>Urgent</option>
          <option>Important</option>
         
      </select>
    </div>
            <div class="form-group col-sm-12">
    <label for="description">Description</label>
    <textarea name ="ticket" class="form-control" id="description" rows="3"></textarea>
  </div>
  
  <button type="submit" name="submitPost" class="btn btn-primary" style="margin-left:15px;"><span class="glyphicon glyphicon-pencil"></span> Post</button> 
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
                
                <p><a href="#" style="color:white"><span class="glyphicon glyphicon-eye-open"></span>  View Ticket</a>
                </p>
                <p><a data-toggle="modal" href="#exampleModal" style="color:white"><span class="glyphicon glyphicon-pencil"></span>  Change Password</a></p>
                


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center">
        <h3 class="modal-title" id="exampleModalLabel">Change password Now! </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-left:50px">
       <form name="myform" action="HomeDatabase.php" method="post" onsubmit = "return validateForm()">
  <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input id="email" type="text" class="form-control" name="email" placeholder="Email" required>
  </div>
                     <div class="input-group col-lg-10" style="padding-top: 15px">
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
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
    
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                <a href="logout.php"> <button type="submit"  class="btn btn-danger" style="color:white;" name= "logout"><span class="glyphicon glyphicon-off"></span>  logout</button></a>
               
            </div>
          </div>
        </div>
        <div class="col-lg-10" style="background-color: #added7;height:570px">
          <a href="#"><button style="margin-top:5px"><span class="glyphicon glyphicon-home"></span> Home</button></a>
           
            
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" >
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>
            
            <div class="row" style="align-content:center;">
            <div class="col-lg-5" style="background-color: TOMATO; height:100px"><a data-toggle="modal" href="#profileModal" style="color:white;text-decoration: none;"><h3><span class="glyphicon glyphicon-user"></span>  Profile</h3><div class="progress">
  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div></a></div>
            <div class="col-lg-5" style="background-color: ORANGE;height:100px"><a href="#" style="color:white;text-decoration: none;"><h3><span class="glyphicon glyphicon-comment"></span>  Suggestion</h3><div class="progress">
  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div></a></div>
            </div>
            
            <div class="row">
            <div class="col-lg-5" style="background-color: violet;height:100px"><a  data-toggle="modal" href="#exampleModalLong" style="color:white;text-decoration: none;"><h3><span class="glyphicon glyphicon-pencil"></span>  Create Ticket</h3><div class="progress">
  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div></a></div>
            <div class="col-lg-5" style="background-color: MEDIUMSEAGREEN;height:100px"><a href="" style="color:white;text-decoration: none;"><h3><span class="glyphicon glyphicon-eye-open"></span>  View Ticket</h3><div class="progress">
  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div></a></div>
            </div>
        </div>
      </div>
    </div>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="index.js"></script>
  </body>
</html>

<?php 
}
else 
{
    header('location:index.php');
}
?>
