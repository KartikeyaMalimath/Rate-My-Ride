<?php
session_start();

if(!isset($_SESSION['user']) || $_SESSION['access'] != 'admin') {
  echo "<script>top.window.location = '../functions/logout.php'</script>";
}
include ("components/feedtemplate.php");
?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rate My Ride - Admin</title>
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
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->		
  </head>
  <body>
    <header class="header">   
      <?php echo $feedtemplate;?>
	 
	 <script>
		document.getElementById("about").classList.add('active');
	</script>
	 
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">About</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
          <section class="no-padding-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="user-block block text-center">
                            <center><h3>Rate My Ride</h3></center>
                            <hr>
                            <p style="text-align: justify">Rate My Ride is a application to provide a better prepaid auto system by taking commuters feedback so as to improve the quality of service and train the auto drivers for the better interaction with the passengers.
                                <br>
                                Rate My Ride was Developed by Kartikeya P. Malimath, Keerthi V Trimal, Nisarga K under the guidance of Asst. prof. Usha C S and Assoc. Prof. Hamsaveni M.
                                <br>
                                <center>© 2019 | All Rights Reserved.</center>   
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            
          <section class="no-padding-bottom">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-4">
                    <div class="user-block block text-center">
                    <div class="avatar"><img src="img/km.jpg" alt="..." class="img-fluid">
                        <!-- <div class="order dashbg-2">1st</div> -->
                    </div><a href="#" class="user-title">
                        <h3 class="h5">Kartikeya Malimath</h3><span>@KartikeyaMalimath</span></a>
                    <div class="contributions">Developer & Designer</div>
                    <div class="details d-flex">
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="user-block block text-center">
                    <div class="avatar"><img src="img/kvt.jpg" alt="..." class="img-fluid">
                        <!-- <div class="order dashbg-1">2nd</div> -->
                    </div><a href="#" class="user-title">
                        <h3 class="h5">Keerthi V Trimal</h3><span>@KeerthiTrimal</span></a>
                    <div class="contributions">Developer</div>
                    <div class="details d-flex">
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="user-block block text-center">
                    <div class="avatar"><img src="img/nk.jpg" alt="..." class="img-fluid">
                        <!-- <div class="order dashbg-4">3rd</div> -->
                    </div><a href="#" class="user-title">
                        <h3 class="h5">Nisarga K</h3><span>@nisargakrishna5</span></a>
                    <div class="contributions">Developer</div>
                    <div class="details d-flex">
                        
                    </div>
                    </div>
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
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>