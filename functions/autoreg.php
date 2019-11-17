<?php
//function to register new users
//session_start();
include ('../include/db.php');
 //echo "test";
 if(isset($_POST['autono']))  
 {  
            //create time stamp
            date_default_timezone_set('Asia/Kolkata'); 
            $t=time();
            $time = date("d-m-Y G:i:s", $t);
            //Create unique auto reg
            $prefix = "RMR";
            $autoid = uniqid($prefix);
            $autodriname = mysqli_real_escape_string($con, $_POST["autodriname"]);  
            $autono = mysqli_real_escape_string($con, $_POST["autono"]);
            $phoneno = mysqli_real_escape_string($con, $_POST["phoneno"]); 
            $licenseno = mysqli_real_escape_string($con, $_POST["licenseno"]); 
            $regyear = mysqli_real_escape_string($con, $_POST["regyear"]); 
            //active / inactive
            $active = 1;
            $blacklist = 0;
            $review = 0;
            $star = 0;
            //Inserting to database
            $query = "INSERT INTO auto (aid,number,name,phone,license,regyear,active,blacklist,review,star) VALUES(?,?,?,?,?,?,?,?,?,?)";  
            $stmt = $con->prepare($query);
            $stmt->bind_param('sssssddddd',$autoid,$autono,$autodriname,$phoneno,$licenseno,$regyear,$active,$blacklist,$review,$star);
            //echo "line1";
            if ($stmt->execute()) {
                //echo "line2";
                echo "<script type='text/javascript'>alert('User Created');</script>";
                echo "<script>top.window.location = '../public/forms.php'</script>";
                exit();
            }  
            else {
                
            echo "Error : " . $con->error; // on dev mode only
            // echo "<script>top.window.location = '../public/forms.php'</script>";
            
            // echo "Error, please try again later"; //live environment
            }
      //}
      
      $con->close();
 } 
  else {
    //  echo "Error3";
      echo "<script>top.window.location = '../public/forms.php'</script>";
 }
?>