
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
        $_SESSION["TITLE"] = 'ADDED';
        $_SESSION["TEXT"] = 'A New Service has been added.';
        $_SESSION["ICON"] = 'success';
        $_SESSION["ButtonText"] = 'ADD ANOTHER';
        $_SESSION["STATUS"] = 'TRUE';
        
        header('location: admin.php');
        
    }
}
   
// USER SERVICE REQUEST FORM
else if(isset($_POST['submitService'])){
   session_start();
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
        $_SESSION["TITLE"] = 'Sent';
        $_SESSION["TEXT"] = 'Your request For new Service has been sent.';
        $_SESSION["ICON"] = 'success';
        $_SESSION["ButtonText"] = 'OK';
        $_SESSION["STATUS"] = 'TRUE';
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
        $_SESSION["TITLE"] = 'Sent';
        $_SESSION["TEXT"] = 'Your request has been sent successfully.';
        $_SESSION["ICON"] = 'success';
        $_SESSION["ButtonText"] = 'OK';
        $_SESSION["STATUS"] = 'TRUE';
           header('location: user.php');
       }
        
        mysqli_close($conn);
    }
  }
   
}


//USER PASSWORD CHANGE FORM
else if(isset($_POST['submit'])){ 
    session_start();
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
            $_SESSION["TITLE"] = 'Changed';
        $_SESSION["TEXT"] = 'Password Updated successfully.';
        $_SESSION["ICON"] = 'success';
        $_SESSION["ButtonText"] = 'OK';
        $_SESSION["STATUS"] = 'TRUE';
           header('location: user.php');
            
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
        
        $_SESSION["TITLE"] = 'Sent';
        $_SESSION["TEXT"] = 'Your Complaint has been sent.';
        $_SESSION["ICON"] = 'success';
        $_SESSION["ButtonText"] = 'OK';
        $_SESSION["STATUS"] = 'TRUE';
        header('location: User.php');
        mysqli_close($conn);
        
    }
}

//suspend service button clicked
else if(isset($_POST['suspendService'])){
    session_start();
    $sno = $_POST['suspendService'];
    include('dbcon.php');

    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        $status = $_POST['available'];
        if($status==='yes'){
            $status = 'No';
             $_SESSION["TITLE"] = 'Not Available';
            $_SESSION["TEXT"] = 'This service is temporary unavailable now.';
            $_SESSION["ICON"] = 'error';
        }
        else{
            $status = 'yes';
             $_SESSION["ICON"] = 'success';
             $_SESSION["TITLE"] = 'Available';
            $_SESSION["TEXT"] = 'This service is now available.';
            
        }
        $query = "UPDATE services SET current_status = '$status' where Sno = $sno";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        
       
        $_SESSION["ButtonText"] = 'OK';
        $_SESSION["STATUS"] = 'TRUE';
        
        header('location: admin_iframe3.php');
        
    }
}

//remove service
else if(isset($_POST['deleteService'])){
    session_start();
    $sno = $_POST['deleteService'];
    include('dbcon.php');

    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        
        $query = "DELETE FROM services where Sno = $sno";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $_SESSION["TITLE"] = 'Deleted';
        $_SESSION["TEXT"] = 'This Service has been removed.';
        $_SESSION["ICON"] = 'success';
        $_SESSION["ButtonText"] = 'OK';
        $_SESSION["STATUS"] = 'TRUE';
        
        header('location: admin_iframe3.php');
        
    }
}

//admin add requested service
else if(isset($_POST['AddThisService'])){
    $type = $_POST['AddThisService'];
    echo $type;
    include('dbcon.php');

    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        $insert = "INSERT INTO services(type) value('$type')";
        $result = mysqli_query($conn, $insert);
        $update = "UPDATE requests SET available = 'yes' WHERE type = '$type'";
        mysqli_query($conn, $update);
        mysqli_close($conn);
        header('location: addNewRequests.php');
        
    }
}

//admin remove requested service
else if(isset($_POST['deleteThisService'])){
    $type = $_POST['deleteThisService'];
    include('dbcon.php');

    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        
        $query = "DELETE FROM requests where type = '$type'";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        header('location: addNewRequests.php');
        
    }
}




else if(isset($_POST['AdminRemarkButton'])){
    session_start();
    $ticket_id = $_POST['AdminRemarkButton'];
    $remark = $_POST['remark'];
    include('dbcon.php');

    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        
        $query = "UPDATE ticket set remark = '$remark', remark_time = CURRENT_TIMESTAMP, status = 'close' where ticket_id = $ticket_id";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        $_SESSION["TITLE"] = 'Updated';
        $_SESSION["TEXT"] = 'Remark has been added to Ticket#'.$ticket_id.'.';
        $_SESSION["ICON"] = 'success';
        $_SESSION["ButtonText"] = 'OK';
        $_SESSION["STATUS"] = 'TRUE';
        header('location: admin_iframe1.php');
    }
}

else if(isset($_POST['CheckRequest'])){
    
    $request_id = $_POST['CheckRequest'];
    
    include('dbcon.php');

    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    else{
        
        $query = "UPDATE requests set Seen = 'yes' where request_id = $request_id";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
       
        header('location: admin_iframe2.php');
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





if(isset($_POST['submitUpdate'])){ //check if form was submitted
 
  
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
        session_start();
        
        $sql = "update user set contact = '$contact', name = '$name', address ='$address'  where email = '$email'";
        $result = mysqli_query($conn, $sql);
       
        $_SESSION["TITLE"] = 'Updated';
        $_SESSION["TEXT"] = 'Successfully changed your profile.';
        $_SESSION["ICON"] = 'success';
        $_SESSION["ButtonText"] = 'OK';
        $_SESSION["STATUS"] = 'TRUE';
      header('location: User.php');
      mysqli_close($conn);
} 
}
    
?>
