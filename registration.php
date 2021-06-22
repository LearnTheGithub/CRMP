<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  
  </head>
  <body>
    <div class="row" style="align-content:center;">
      
      <div class="col-lg-4" style="align-content:center;margin-left:20px;margin-top:20px">
        <h3>FILL THIS FORM COMPLETELY.</h3>
          <form action="" method="post">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
   
  </div>
          <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
    
  </div>  
         <div class="form-group">
    <label for="contact">contact</label>
    <input type="text"  name="contact" class="form-control" id="contact" aria-describedby="contact" placeholder="Enter contact" required>
    
  </div>   
            <div class="form-group">
    <label for="address">address</label>
    <input type="text"  name="address" class="form-control" id="address" aria-describedby="address" placeholder="Enter address" required>
    
  </div>  
            <label for="gender">GENDER</label><br>
           <div class="form-check">
               
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="M" checked>
  <label class="form-check-label" for="exampleRadios1">
      MALE
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="F">
  <label class="form-check-label" for="exampleRadios2">
    FEMALE
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="O">
  <label class="form-check-label" for="exampleRadios3">
    Other
  </label>
</div>
            
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  
  <button type="submit" name = "SubmitButton" class="btn btn-primary">Submit</button>
</form>
        </div>
      </div>      

      <?php
$message = "";
if(isset($_POST['SubmitButton'])){ //check if form was submitted
  $email = $_POST['email']; //get input text
  $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $gender = $_POST['exampleRadios'];
    
    include('dbcon.php');
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
    else{
        $checkFirst = "select * from user where email ='$email' and contact = '$contact'";
        $result = mysqli_query($conn, $checkFirst);
        
        if(mysqli_num_rows($result)>0){
            echo "record exists <a href='index.php'>CLICK HERE TO LOGIN</a>";
        }
        
        else{
            $insert = "insert into user(email, contact, name, address, password, gender) values('$email','$contact','$name','$address','$password','$gender')";
            mysqli_query($conn, $insert);
            echo "Successfully Registered! <a href='index.php'>CLICK HERE TO LOGIN</a> ";
        }
        
        mysqli_close($conn);
        
        
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

