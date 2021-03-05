<?php

if(isset($_POST['SubmitP'])){
    session_start();
    //collect form inputs
  $id = $_SESSION["admin"];
  $password = $_POST['ConfirmPassword'];

  //connect database
  include('dbcon.php');

  //print erro if connection failed
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

else if(isset($_POST['submit'])){ //check if form was submitted
  $email = $_POST['email']; //get input text
    $contact = $_POST['contact'];
    $confirmPassword = $_POST['confirmPassword'];
 // Create connection
include('dbcon.php');

// Check connection
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


include('dbcon.php');

    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        $q1 = "select * from user";
        $res = mysqli_query($conn,$q1);
	    $num = mysqli_num_rows($res);
    mysqli_close($conn);
} 
    
?>
