<?php
//function to register new users
//session_start();
include ('../include/db.php');
 //echo "test";
if(isset($_POST['rate']))  
{  
    //echo "submit";
    if(empty($_POST["rate"]))  
    {  
        echo '<script>alert("Rating is required")</script>';  
    }  
    else  
    {  
        $aid = $_GET['aid'];
        $tid = $_GET['tid'];
        //create time stamp
        date_default_timezone_set('Asia/Kolkata'); 
        $t=time();
        $time = date("d-m-Y G:i:s", $t);
        
        $rating = mysqli_real_escape_string($con, $_POST["rate"]);  
        $feed = mysqli_real_escape_string($con, $_POST["feed"]);
        //active / inactive
        $flag = 1;
        //Inserting to database
        $query = "INSERT INTO feedback (auto_id, tktid, star, feed, time, flag ) VALUES(?,?,?,?,?,?)";  
        $stmt = $con->prepare($query);
        $stmt->bind_param('ssdssd',$aid, $tid, $rating, $feed, $time, $flag);
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