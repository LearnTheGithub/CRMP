
<?php

//ADMIN PASSWORD CHANGE FORM

if(isset($_POST['SubmitP'])){
    session_start();
  $id = $_SESSION["admin"];
  $password = $_POST['ConfirmPassword'];
  include('dbcon.php');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else{
      $sql = "update admin set password = '$password' where id = '$id'";
    $result = mysqli_query($conn, $sql);
       print "<h3>Successfull updation</h3><a href = 'admin.php'>Return to Dashboard</a>";

mysqli_close($conn);
}
}


//Admin Service Add Button clicked
else if(isset($_POST['AdminServiceAddButton'])){
    session_start();
    $service = $_POST['service'];
    include('dbcon.php');
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
    else{
        $query = "INSERT INTO services(type) value('$service')";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        header('location: admin.php');
        
    }
}
   
// USER SERVICE REQUEST FORM
else if(isset($_POST['submitService'])){
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $other = $_POST['other'];
    if($other !=''){
        include('dbcon.php');
        $q2 = "INSERT INTO requests(type, name, email, contact, city, available) values('$other','$name', '$email', '$contact', '$city', 'not')";
        mysqli_query($conn, $q2);
        mysqli_close($conn);
        header('location: user.php');
    }
    
    else if(isset($_POST['list']) && $other == ''){
        $services = $_POST['list'];
        include('dbcon.php');
    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }
    else{
       for($i = 0; $i < sizeof($services); $i++) {
           $sql = "INSERT INTO requests(type, name, email, contact, city) values('$services[$i]','$name', '$email', '$contact', '$city')";
           mysqli_query($conn, $sql);
       }
        
        mysqli_close($conn);
    }
  }
   
}


//USER PASSWORD CHANGE FORM
else if(isset($_POST['submit'])){ 
    $email = $_POST['email']; 
    $contact = $_POST['contact'];
    $confirmPassword = $_POST['confirmPassword'];
    include('dbcon.php');
     if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
        }
         else{
        $q1 = "select * from user where email = '$email' && contact = '$contact'";
        $res=mysqli_query($conn,$q1);
	    $num=mysqli_num_rows($res);
        if($num===1){
           
        $sql = "update user set password = '$confirmPassword' where email = '$email' && contact = '$contact'";
        $result = mysqli_query($conn, $sql);
           print "<p>Successfull updation</p>";
      }
        else{
            echo 'Something is wrong;';
        }
    mysqli_close($conn);
} 
}


//user create ticket 
else if(isset($_POST['submitPost'])){
    
    session_start();
    $id = $_SESSION['user'];
    $subject = $_POST['subject'];
    $ticket = $_POST['ticket'];
    $priority = $_POST['priority'];
    $type = $_POST['type'];
    include('dbcon.php');
    
    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }
    
    else{
        $query = "insert into ticket(ticket, email, subject, type, priority) values('$ticket', '$id', '$subject', '$type', '$priority');";
        $result = mysqli_query($conn, $query);
        header('location: User.php');
        mysqli_close($conn);
        
    }
}

//registered users count
include('dbcon.php');

    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        $q1 = "select * from user";
        $res = mysqli_query($conn, $q1);
	    $num = mysqli_num_rows($res);
        
        $q2 = "SELECT * FROM user WHERE Date(time) = CURRENT_DATE()";
        $res2 = mysqli_query($conn, $q2);
        $today = mysqli_num_rows($res2);
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
      header('location: User.php');
      mysqli_close($conn);
} 
}
    
?>
