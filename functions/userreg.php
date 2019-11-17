<?php
//function to register new users
//session_start();
include ('../include/db.php');
 //echo "test";
 if(isset($_POST['type']))  
 {  
        //echo "submit";
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
            //echo "else";
            //create time stamp
            date_default_timezone_set('Asia/Kolkata'); 
            $t=time();
            $time = date("d-m-Y G:i:s", $t);
            //Create unique User Id
            $prefix = "RMR";
            $userid = uniqid($prefix);
            $username = mysqli_real_escape_string($con, $_POST["username"]);  
            $password = mysqli_real_escape_string($con, $_POST["password"]);
            $type = mysqli_real_escape_string($con, $_POST["type"]); 
            //active / inactive
            $flag = 1;
            $active = 1;
            //password Hashing
            $password = password_hash($password, PASSWORD_DEFAULT);  
            //Inserting to database
            $query = "INSERT INTO user (uid,name,password,type,flag,last_login,active) VALUES(?,?,?,?,?,?,?)";  
            $stmt = $con->prepare($query);
            $stmt->bind_param('ssssdsd',$userid, $username, $password, $type, $flag, $time, $active);
            //echo "line1";
            if ($stmt->execute()) {
                //echo "line2";
                echo "<script type='text/javascript'>alert('User Created');</script>";
                // echo "<script>top.window.location = '../public/forms.php'</script>";
                exit();
            }  else {
                
            echo "Error : " . $con->error; // on dev mode only
            // echo "<script>top.window.location = '../public/forms.php'</script>";
            
            // echo "Error, please try again later"; //live environment
            }
      }
      
      $con->close();
 }  else {
    //  echo "Error3";
      // echo "<script>top.window.location = '../public/forms.php'</script>";
 }
?>