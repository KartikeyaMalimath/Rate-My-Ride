<?php
include ("components/feedtemplate.php");
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->	
	
  </head>
  <body>
    <header class="header">   
      <?php echo $feedtemplate;?>
	 
	 <script>
		document.getElementById("lihome").classList.add('active');
	</script>
	 
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Feedback</h2>
          </div>
        </div>
        <section class="no-padding-bottom">
          <div class="container-fluid">
            <!-- Deleted 2 charts  -->
            <!-- feedback form  -->
            <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>Provide Feedback</strong></div>
                  <div class="block-body text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Feedback </button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Auto No : KA-09-M-9089</strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Share your Rating and Experince.</p>
                            <!-- Feedback form  -->
                            <form>
                                <div class="form-group">
                                    <label>Rating</label>
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rate" value="5"/>
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                </div>
                                <div class="form-group">       
                                    <label>Password</label>
                                    <input type="password" placeholder="Password" class="form-control">
                                </div>
                                <div class="form-group">       
                                    <input type="submit" value="Signin" class="btn btn-primary">
                                </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- form end  -->
          </div>
        </section>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <!-- Deleted 3 cards -->
            <div class="row">
              <div class="col-lg-4">
                <div class="bar-chart block">
                    <h5>KA-09-R-1654</h5>
                    <span class="heading">User Rating&nbsp&nbsp</span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <hr>
                    <p>4.1 average based on 254 reviews.</p>
                    <span class="heading">Last Review</span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="block margin-bottom-sm">
                <!-- For per star rating  -->
                    <div class="title"><strong>Basic Table</strong></div>
                        <div class="table-responsive"> 
                            <table class="table">
                            <tbody>
                                <tr>
                                <th scope="row">5 Star</th>
                                <td>
                                    <div class="bar-container">
                                        <div class="bar-5" style="width: 70%;"></div>
                                    </div>
                                </td>
                                <td style="float:right;">153</td>
                                </tr>
                                <tr>
                                <th scope="row">4 Star</th>
                                <td>
                                    <div class="bar-container">
                                        <div class="bar-4" style="width: 40%;"></div>
                                    </div>
                                </td>
                                <td style="float:right;">72</td>
                                </tr>
                                <tr>
                                <th scope="row">3 Star</th>
                                <td>
                                    <div class="bar-container">
                                        <div class="bar-3" style="width: 20%;"></div>
                                    </div>
                                </td>
                                <td style="float:right;">41</td>
                                </tr>
                                <tr>
                                <th scope="row">2 Star</th>
                                <td>
                                    <div class="bar-container">
                                        <div class="bar-2" style="width: 10%;"></div>
                                    </div>
                                </td>
                                <td style="float:right;">16</td>
                                </tr>
                                <tr>
                                <th scope="row">1 Star</th>
                                <td>
                                    <div class="bar-container">
                                        <div class="bar-1" style="width: 5%;"></div>
                                    </div>
                                </td>
                                <td style="float:right;">2</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                <!-- end  -->
              </div>
            </div>
          </div>
        </section>
        
        <section class="no-padding-bottom">
          <div class="container-fluid">
            <!-- Deleted 3 charts  -->
          </div>
        </section>
        <section class="no-padding-bottom">
          <div class="container-fluid">
            <!-- Deleted user cards  -->
          </div>
        </section>
        <section class="margin-bottom-sm">
          <div class="container-fluid">
            <!-- Deleted charts-->
          </div>
        </section>
        <section class="no-padding-bottom">
          <div class="container-fluid">
            <!-- Deleted to-do and table  -->
          </div>
        </section>
        <section>
          <div class="container-fluid">
            <!-- Deleted charts  -->
          </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <p class="no-margin-bottom">2019 &copy; Rate My Ride. Developed by <a href="https://github.com/KartikeyaMalimath/Rate-My-Ride">Rate-My-Ride Team</a>. Thanks to <a href="https://bootstrapious.com/p/bootstrap-4-dark-admin">Bootstrapious</a>!</p>
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