<?php
session_start();

if(!isset($_SESSION['user']) || $_SESSION['access'] != 'ticket') {
  echo "<script>top.window.location = '../functions/logout.php'</script>";
}

include ("components/tktcomponent.php");
include ("../include/db.php");
?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rate My Ride - Feedback</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
		
	
	
  </head>
  <body>
    <header class="header">   
      <?php echo $tkttemplate; ?>
	  
	 <script>
		document.getElementById("lihome").classList.add('active');
	</script>	
	  
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Generate Ticket</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul  class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Ticket</li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <!-- Basic Form-->
              <div class="col-lg-6">
                <div class="block">
                  <div class="title"><strong class="d-block">Ticket Form</strong></div>
                  <div class="block-body">
                    <form id="user" method="POST" action="../functions/tktgen.php">
                      <div class="form-group">
                        <label class="form-control-label">Auto Number</label>
                        <input type="text" name="autono" placeholder="eg : KA-09-xx-xxxx" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Source</label>
                        <input type="text" name="from" value="Mys - Rail Station" class="form-control" disabled>
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label" required>Destination</label>
                          <select id="dest" name="dest" class="form-control mb-3 mb-3" onchange="amount()" style="width:100%" required>
                          <option disabled selected value> -- Select Destination -- </option>
                            <?php
                            
                            $stmt1 = "SELECT * FROM destination WHERE did != 'MYS001'";
                            $res1 = $con->query($stmt1);                            

                            if($res1->num_rows > 0){
                                while($row1 = $res1->fetch_assoc()){
                                    echo "<option value='{$row1['amount']}||{$row1['did']}'>{$row1['destination']}</option>";
                                }
                            }
                            ?>
                          </select>
                      </div>
                      <br>
                      <center><h3 id="amount"></h3></center>
                      <br>
                      <div class="form-group">       
                        <input type="submit" style="width:100%" name= "tkt" value="submit" class="btn btn-success">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
               <!--Form Elements-->
               <div class="col-lg-6">
               <div class="block">
                  <div class="title"><strong>Available autos</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Auto Number</th>
                          <th>Stars</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                      $stmt1 = "SELECT * FROM auto WHERE active = 1";
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
    <script src="js/front.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script type="text/javascript">

        function amount() {
            var did = document.getElementById("dest").value;
            var amt = did.split("||");
            document.getElementById("amount").innerHTML = "Amount : ₹ "+amt[0];
            console.log(amt[0]);
        }               

    </script>


  </body>
</html>