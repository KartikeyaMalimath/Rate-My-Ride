<?php
session_start();

if(!isset($_SESSION['user']) || $_SESSION['access'] != 'admin') {
  echo "<script>top.window.location = '../functions/logout.php'</script>";
}

include ("components/template.php");
include ("../include/db.php");

?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.sea.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/feedback.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
		
	
		
  </head>
  <body>
    <header class="header">   
      <?php echo $template; ?>
	  
	 <script>
		document.getElementById("litables").classList.add('active');
	</script>
	  
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">To-be Reviewed</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Under Review</li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                <div class="block">
                  <div class="title"><strong>To-be Reviewed</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Auto Number</th>
                          <th>Stars</th>
                          <th><center>Profile</center></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                      $stmt1 = "SELECT * FROM auto WHERE active = 1 AND star BETWEEN 0 AND 2 ";
                      $res1 = $con->query($stmt1);
                      if($res1->num_rows > 0){
                        $i=1;
                        while($row1 = $res1->fetch_assoc()){
                          $temp = $row1['star'];
                          echo "
                              <tr>
                                <th scope='row'>{$i}</th>
                                <td>{$row1['number']}</td>
                                <td>";
                                    
                                    for($k=0; $k <5; $k++){
                                        if($temp <= 0.45 ){
                                            echo "<span class='fa fa-star'></span>";
                                        }
                                        else {
                                            echo "<span class='fa fa-star checked'></span>";
                                        }
                                        $temp--;
                                    }

                                echo "  
                                </td>
                                <td><center><button id='{$row1['aid']}' class='btn btn-info' onclick='profile(this.id)' style='width:70%;'>Check</button></center></td>
                              </tr>";
                              $i++;
                        }
                      }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <?php 
              
              if(isset($_GET['aid'])) {
                  $aaid = $_GET['aid'];
                  $stmt3 = "SELECT number FROM auto WHERE aid = '$aaid'";
                  $res3 = $con->query($stmt3);
                  $row3 = $res3->fetch_assoc();
                  echo "                  
                        <div class='col-lg-6'>
                        <div class='block'>
                          <div class='title'><strong>{$row3['number']}</strong></div>
                          <div class='table-responsive'> 
                            <table class='table table-striped table-hover'>
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Stars</th>
                                  <th>Feedback</th>
                                </tr>
                              </thead>
                              <tbody>";                            

                              $stmt2 = "SELECT * FROM feedback WHERE auto_id = '$aaid' ";
                              $res2 = $con->query($stmt2);
                              if($res2->num_rows > 0){
                                $i=1;
                                while($row2 = $res2->fetch_assoc()){
                                  $temp = $row2['star'];
                                  echo "
                                      <tr>
                                        <th scope='row'>{$i}</th>
                                        <td>";
                                            
                                            for($k=0; $k <5; $k++){
                                                if($temp <= 0.45 ){
                                                    echo "<span class='fa fa-star'></span>";
                                                }
                                                else {
                                                    echo "<span class='fa fa-star checked'></span>";
                                                }
                                                $temp--;
                                            }

                                        echo "  
                                        </td>
                                        <td>{$row2['feed']}</td>
                                      </tr>";
                                      $i++;
                                      
                                }
                              }      echo "                      
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  ";
              }
              
              ?>
              
          </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              <p class="no-margin-bottom">© 2019 copyrights | Designed by: <a href="https://github.com/KartikeyaMalimath/Rate-My-Ride.git">Rate-My-Ride</a> 
              <!-- Thanks to: <a href="https://bootstrapious.com/p/bootstrap-4-dark-admin">Bootstrapious</a>. -->
            </p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
    <script>
    
    function profile(id) {
      window.location.replace("./tables.php?aid="+id);
    }

    </script>

  </body>
</html>