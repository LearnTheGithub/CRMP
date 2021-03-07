
 <?php
session_start();
$message = "";


if(isset($_POST['login'])){
   
    //check if form was submitted
  $username = $_POST['username']; //get input text
  $password = $_POST['UserPassword'];
    
 // Create connection
include('dbcon.php');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        
        $query = "select * from user where email = '$username' and password = '$password'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_num_rows($result);
        if($row==1){
            $_SESSION["user"] = $username;
        
           header("location:user.php");
             
            
        }
        else{
            echo 'Wrong User Password!! try Again';
           
        }
        mysqli_close($conn);
    }
} 
else if(isset($_POST['AdminLogin'])){
    $username = $_POST['username']; //get input text
  $password = $_POST['UserPassword'];
    
 // Create connection
include('dbcon.php');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        
        $query = "select * from admin where id = '$username' and password = '$password'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_num_rows($result);
        if($row==1){
            $_SESSION["admin"] = $username;
        
           header("location:admin.php");
             
            
        }
        else{
            echo 'Wrong Admin password';
           
        }
        mysqli_close($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <style>
        
      #Title {
          text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
        text-align: center;
        font-size: 40px;
        font-weight: bold;
        color:chartreuse;
      }

      .container {
        margin-top: 10px;
        background-color: bisque;
      }

      .row {
        padding-bottom: 20px;
      }

      .form-group {
      }

      #avtar {
        width: 250px;
        height: 250px;
        padding-top: 20px;
        padding-bottom: 50px;
      }
      #login-form {
        font-family: "Varela Round", sans-serif;
        font-size: 20px;
        align-content: center;
      }

      #username,
      #UserPassword {
        width: 250px;
      }

      #top-div {
        background-color: aquamarine;
      }

      #login-form {
        background-color: bisque;
      }
      .responsive {
        padding-top: 10px;
        width: 100%;
        height: auto;
      }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <title>Login page</title>
  </head>
  <body>
    <!-- image color #00BFA6-->
    <div class="container">
      <div class="row" id="top-div">
        <div class="col-lg-12">
          <p id="Title">CUSTOMER RELATIONSHIP MANAGEMENT PORTAL</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <img src="images/image.jpg" alt="Icon" class="responsive" />
           <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
ADMIN LOGIN
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admin Login </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Admin ID</label>
    <input type="text" name = "username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Admin ID" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="UserPassword" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
 
  <button type="submit" name = "AdminLogin" class="btn btn-primary">Login</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <img
            src="images/undraw_personalization_triu%20(1).svg"
            alt="Icon"
            class="responsive"
          />
        </div>

        <div class="col-lg-6" style="padding-left: 150px;">
          <div id="login-form">
            <form action="" method="post">
              <div class="form-group">
                <img
                  id="avtar"
                  src="images/undraw_profile_pic_ic5t.svg"
                  alt="Avtar.svg"
                /><br />
                <label for="exampleInputEmail1">Email address</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                       name="username"
                  aria-describedby="emailHelp"
                  placeholder="Enter email"
                       required 
                />
              </div>
              <div class="form-group">
                <label for="UserPassword">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="UserPassword"
                       name="UserPassword"
                  placeholder="Password"
                       required
                />
              </div>

              <button
                type="submit"
                class="btn btn-primary"
                style="margin-bottom: 50px;"
                      name="login"
                      
              >
                LOGIN
              </button>
            </form>
          </div>
        </div>
      </div>
 

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    
      
  </body>
    
</html>



