<?php

session_start();

include('../include/phpqrcode/qrlib.php');
include('../include/db.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Print Ticket</title>
        <script>
        function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        }
        </script>
    </head>


<?php

if(isset($_POST['autono']))
{
    $autono = $_POST['autono'];
    $src = "Mys - Rail Station";
    $destid = $_POST['dest'];
    $temp = explode("||",$destid);
    $destid = $temp[1];

    $stmt1 = "SELECT * FROM auto WHERE number = '$autono'";
    $res1 = $con->query($stmt1);
    $row1 = $res1->fetch_assoc();
    $aid = $row1['aid'];
    

    $stmt2 = "SELECT * FROM destination WHERE did = '$destid'";
    $res2 = $con->query($stmt2);
    $row2 = $res2->fetch_assoc();
    $amt = $row2['amount'];
    $srcid = "MYS001";

    //create time stamp
    date_default_timezone_set('Asia/Kolkata'); 
    $t=time();
    $time = date("d-m-Y G:i:s", $t);
    
    $prefix = "TKT";
    $tid = uniqid($prefix);
    $flag = 1;
    //Inserting to database
    $query = "INSERT INTO ticket (tid, autoid, source, destination, amount, flag, time ) VALUES(?,?,?,?,?,?,?)";  
    $stmt = $con->prepare($query);
    $stmt->bind_param('sssssds',$tid, $aid, $srcid, $destid, $amt, $flag, $time);
        //echo "line1";
        if ($stmt->execute()) {
            $trid = $_SERVER['SERVER_NAME']."/Rate-My-Ride/public/feedback.php?ticket=".$tid;
            $tempDir = '../dump/';
            QRcode::png($trid, $tempDir.'temp.png', QR_ECLEVEL_L, 3);

            echo "
                
                <div id='printmaadu' style='width:235px; background-color: white;'>
                ==========================
                <center><h4 style='margin: 5px 5px 5px 5px;'>Prepaid Auto</h4></center>
                ==========================
                    <div style='padding:0px;'>
                    <center><img src='../dump/temp.png' ></center>
                        <center><table style='width:95%'>
                            <tr>
                                <td>Auto No.</td><td> : </td><td>".$autono."</td> 
                            </tr>                            
                            <tr>
                                <td>From</td><td> : </td><td>".$src."</td>
                            </tr>
                            <tr>
                                <td>Destination</td><td> : </td><td>".$row2['destination']."</td>
                            </tr> 
                            <tr>
                                <td>Amount</td><td> : </td><td>₹ ".$amt."</td>
                            </tr>
                                            
                        </table></center>
                    </div>
                    ==========================
                    <div id='info'>
                        <p style='text-align: justify; text-justify: inter-word;'>Thank you for choosing Prepaid auto.                        
                        <br>
                        Scan the QR Code to know more about your ride and do provide feedback to provide a better and quality service</p>
                    </div>
                    ==========================
                    <center><p>---Powered By : Rate My Ride ---</p></center>
                    
                </div>
                <script>printDiv('printmaadu')</script>
                <script>setTimeout(function() {top.window.location = '../public/ticket.php'}, 1000);</script>
                </body>
                </html>
                ";
        }
}

?>


