<?php
//session
session_start();
$_SESSION = array();
include ('../include/db.php');
if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
           echo "<script>top.window.location = '../'</script>";
      }  
      else  
      {     
          //prepare timestamp to update last login
            date_default_timezone_set('Asia/Kolkata'); 
            $t=time();
            $time = date("d-m-Y G:i:s", $t);
           $username = mysqli_real_escape_string($con, $_POST["username"]);  
           $password = mysqli_real_escape_string($con, $_POST["password"]);  
           $query = "SELECT * FROM user WHERE name = '$username' AND flag = 1 AND active = 1";  
           $result = mysqli_query($con, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                    //check hashed password
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;   
                          $sqql = "SELECT * FROM user WHERE name = '$username' AND active = 1 AND flag = 1";
                          $result3 = $con->query($sqql);
                          if (!$result3) {
                              trigger_error('Invalid query: '.$con->error);
                          }
                          while($row =$result3->fetch_assoc()) {
                            $permission = $row['type'];
                            $setUser = $row['name'];
                            $UID = $row['uid'];
                            $flag = $row['flag'];
                            if($flag === '0'){
                                   echo "<script type='text/javascript'>alert('User Invalid');</script>";
                                   echo "<script>top.window.location = '../'</script>";
                            }
                            //Set Sessions based on access Rights and Username
                            $_SESSION['access'] = $permission;
                            $_SESSION['user'] = $setUser;
                            $_SESSION['userID'] = $UID;
                            
                            
                          }
                        //Update last login Timestamp
                        $loginTimeUpdate = "UPDATE user SET last_login = '$time' WHERE name = '$username'";
                        if($con->query($loginTimeUpdate) === TRUE) {
                          //login
                            //Admin Login
                            if($permission == 'admin') {
                                echo "<script>top.window.location = '../public/'</script>";
                            }
                            //User Login (Ticket Vendor)
                            else if($permission == 'ticket') {
                                echo "<script>top.window.location = '../public/ticket.php'</script>";
                            }
                            else {
                                echo "<script>alert('Invalid permission');</script>";
                                echo "<script>top.window.location = '../'</script>";
                            }
                        } 
                        else {
                            echo "<script>alert('User error');</script>";
                        }
                     }  
                     else  
                     {  
                          //return false;  
                          echo "<script>alert('Invalid password');</script>";
                          echo "<script>top.window.location = '../'</script>";  
                     }  
                }  
           }  
           else  
           {  
               echo "<script>alert('User Doesnot exsist');</script>";
               echo "<script>top.window.location = '../'</script>";    
           }  
      }  
 }  else {
    echo "<script>alert('Username/password is Invalid');</script>";
     echo "<script>top.window.location = '../'</script>";
 }
 ?>  