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
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
		
	
	
  </head>
  <body>
    <header class="header">   
      <?php echo $template; ?>
	  
	 <script>
		document.getElementById("liforms").classList.add('active');
	</script>	
	  
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <div class="page-header no-margin-bottom">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Registration forms</h2>
          </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul  class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Registration forms</li>
          </ul>
        </div>
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <!-- Basic Form-->
              <div class="col-lg-6">
                <div class="block">
                  <div class="title"><strong class="d-block">Registration Form</strong></div>
                  <div class="block-body">
                    <form id="user" method="POST" action="../functions/userreg.php">
                      <div class="form-group">
                        <label class="form-control-label">Username</label>
                        <input type="text" name="username" placeholder="Username..." class="form-control" required>
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Password</label>
                        <input type="password" name = "password" placeholder="Password..." class="form-control" required>
                      </div>

                      <div class="form-group">       
                        <label class="form-control-label" required>Type</label>
                          <select name="type" class="form-control mb-3 mb-3" style="width:100%" required>
                            <option value="ticket">ticket</option>
                            <option value="admin">admin</option>
                          </select>
                      </div>
                      <div class="form-group">       
                        <input type="submit" name= "usersbmt" value="Regsiter" class="btn btn-success">
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="block margin-bottom-sm">
                  <div class="title"><strong>Users</strong></div>
                  <div class="table-responsive"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Username</th>
                          <th>Type</th>
                          <th><center>Deactivate</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        
                          $stmt1 = "SELECT * FROM user WHERE flag = 1 AND active = 1";
                          $res1 = $con->query($stmt1);
                          if($res1->num_rows > 0){
                            while($row1 = $res1->fetch_assoc()){
                              $i = 1;
                              echo "
                                    <tr>
                                      <th scope='row'>$i</th>
                                      <td>{$row1['name']}</td>
                                      <td>{$row1['type']}</td>
                                      <td><center><button class='btn btn-danger'>Deactivate</button></center></td>
                                    </tr>   
                              
                              ";
                              $i++;
                            }
                          }
                        
                        ?>                                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
               <!--Form Elements-->
              <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>Auto Registration</strong></div>
                  <div class="block-body">
                    <form id="auto" class="form-horizontal" method="POST" action="../functions/autoreg.php">
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Auto Number</label>
                        <div class="col-sm-9">
                          <input type="text" name = "autono" placeholder="Auto Number" class="form-control" required>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" name = "autodriname" placeholder="Name" class="form-control" required >
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Phone Number</label>
                        <div class="col-sm-9">
                          <input type="tel" name = "phoneno" placeholder="Phone No" pattern="[6-9]{1}[0-9]{9}" class="form-control" maxlength="10" required>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">License Number</label>
                        <div class="col-sm-9">
                          <input type="text" name = "licenseno" placeholder="License Number" class="form-control" required>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Registration Year</label>
                        <div class="col-sm-9">
                          <input type="tel"name = "regyear" placeholder="Registration Year" class="form-control" required>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <div class="col-sm-9 ml-auto">
                          <input type="submit"  name = "autosubmit" value = "Submit" class="btn btn-success">
                          <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end form  -->
              <!-- places  -->
              <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>Add Destination</strong></div>
                  <div class="block-body">
                    <form id="dest" class="form-horizontal" method="POST" action="../functions/destadd.php">
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Destination</label>
                        <div class="col-sm-9">
                          <input type="text" name = "dest" placeholder="Enter Destination Name..." class="form-control" required>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Distance</label>
                        <div class="col-sm-9">
                          <input type="number" name = "dist" placeholder="Enter distance in Kms" class="form-control" required >
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Amount</label>
                        <div class="col-sm-9">
                          <input type="number" name = "amount" placeholder="Enter amount"  class="form-control" min = "0" max = "1000" required>
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <div class="col-sm-9 ml-auto">
                          <input type="submit"  name = "destsubmit" value = "Add" class="btn btn-success">
                          <!--<button type="submit" class="btn btn-primary">Save changes</button>-->
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end places  -->
            </div>
          </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              <p class="no-margin-bottom">Designed by: <a href="https://github.com/KartikeyaMalimath/Rate-My-Ride.git">Rate-My-Ride</a> Thanks to: <a href="https://bootstrapious.com/p/bootstrap-4-dark-admin">Bootstrapious</a>.</p>
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

      var userfrm1 = $('#user');

      userfrm1.submit(function(e) {
          e.preventDefault();
          $.ajax({
              type : "POST",
              url : userfrm1.attr('action'),
              data: userfrm1.serialize(),
              success: function(data) {
                swal({
                  title: "User Created",
                  icon: "success",
                  }).then((value) => {
                      top.window.location = './forms.php';
                });
              },
              error : function(data) {
                  alert('!!! Error Updating feedback !!!');
                  console.log(data);
              }
          });

      });

      var userfrm2 = $('#auto');

      userfrm2.submit(function(e) {
          e.preventDefault();
          $.ajax({
              type : "POST",
              url : userfrm2.attr('action'),
              data: userfrm2.serialize(),
              success: function(data) {
                swal({
                  title: "Auto Created",
                  icon: "success",
                  }).then((value) => {
                      top.window.location = './forms.php';
                });
              },
              error : function(data) {
                  alert('!!! Error Updating feedback !!!');
                  console.log(data);
              }
          });

      });

      var userfrm3 = $('#dest');

      userfrm3.submit(function(e) {
          e.preventDefault();
          $.ajax({
              type : "POST",
              url : userfrm3.attr('action'),
              data: userfrm3.serialize(),
              success: function(data) {
                swal({
                  title: "Destination added",
                  icon: "success",
                  }).then((value) => {
                      top.window.location = './forms.php';
                });
              },
              error : function(data) {
                  alert('!!! Error Updating feedback !!!');
                  console.log(data);
              }
          });

      });

    </script>


  </body>
</html>