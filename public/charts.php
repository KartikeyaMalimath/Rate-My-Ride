<?php
session_start();

if(!isset($_SESSION['user']) || $_SESSION['access'] != 'admin') {
  echo "<script>top.window.location = '../function/logout.php'</script>";
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
		document.getElementById("licharts").classList.add('active');
	</script>	 
	 
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Recent Reviews</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Recent Reviews</li>
          </ul>
        </div>
        <section>
          <div class="container-fluid">

          <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>To-be Reviewed</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Auto Number</th>
                          <th>Stars</th>
                          <th>Review</th>                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                      $stmt1 = "SELECT * FROM feedback WHERE flag = 1";
                      $res1 = $con->query($stmt1);
                      if($res1->num_rows > 0){
                        $i=1;
                        while($row1 = $res1->fetch_assoc()){
                          $temp = $row1['star'];
                          $tempid = $row1['auto_id'];
                          $stmt2 = "SELECT number FROM auto WHERE aid = '$tempid'";
                          $res2 = $con->query($stmt2);
                          $row2 = $res2->fetch_assoc();
                          echo "
                              <tr>
                                <th scope='row'>{$i}</th>
                                <td>{$row2['number']}</td>
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
                                <td>{$row1['feed']}</td>
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
    <script src="js/charts-custom.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>