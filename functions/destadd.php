<?php

//session_start();
include ('../include/db.php');
 //echo "test";
if(isset($_POST['dest']))  
{  
    //echo "submit";
    if(empty($_POST["dest"]))  
    {  
        echo '<script>alert("Rating is required")</script>';  
    }  
    else  
    {  

        //create time stamp
        date_default_timezone_set('Asia/Kolkata'); 
        $t=time();
        $time = date("d-m-Y G:i:s", $t);
        
        $prefix = "MYS";
        $did = uniqid($prefix);

        $dest = mysqli_real_escape_string($con, $_POST["dest"]);  
        $dist = mysqli_real_escape_string($con, $_POST["dist"]);
        $amount = mysqli_real_escape_string($con, $_POST["amount"]);
        //active / inactive
        $flag = 1;
        //Inserting to database
        $query = "INSERT INTO destination (did, destination, flag, amount, kms ) VALUES(?,?,?,?,?)";  
        $stmt = $con->prepare($query);
        $stmt->bind_param('sssdd',$did, $dest, $flag, $amount, $dist);
        //echo "line1";
        if ($stmt->execute()) {
            //echo "line2";
            echo "<script type='text/javascript'>alert('Rating given');</script>";
            // echo "<script>top.window.location = '../public/feedback.php'</script>";
            exit();
        }  else {
            
        echo "Error : " . $con->error; // on dev mode only
        // echo "<script>top.window.location = '../public/feedback.php'</script>";
        
        // echo "Error, please try again later"; //live environment
        }
    }
    
    $con->close();
}  else {
//  echo "Error3";
    // echo "<script>top.window.location = '../public/feedback.php'</script>";
}
?>