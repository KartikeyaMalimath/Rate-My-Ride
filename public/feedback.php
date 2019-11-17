<?php
include ("../include/db.php");


if(isset($_GET['ticket'])){
    $tid = $_GET['ticket'];
    //Ticket table
    $tktstmt = "SELECT * FROM ticket WHERE tid = '$tid'";
    $tktres = $con->query($tktstmt);
    $tktrow = $tktres->fetch_assoc();
    //Auto table
    $aid = $tktrow['autoid'];
    $autostmt = "SELECT * FROM auto WHERE aid = '$aid'";
    $autores = $con->query($autostmt);
    $autorow = $autores->fetch_assoc();

    $sumstarstmt = "SELECT *, SUM(star) as starsum, count(*) as cnt from feedback where auto_id = '$aid'";
    $sumres = $con->query($sumstarstmt);
    $sumrow = $sumres->fetch_assoc();

    $sum = $sumrow['starsum'];
    $count = $sumrow['cnt'];
    if ($count > 0) {
      $avgstar = $sum /$count;
      $disavg = $avgstar;
    } else {
      $avgstar = 0;
      $disavg = 0;
      $count = 1;
    }
    
}

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
            <h2 class="h5 no-margin-bottom">Feedback for : <?php echo $autorow['name']; ?></h2>
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
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" style="width: 30vh;">Feedback </button>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Auto No : <?php echo $autorow['number']; ?></strong>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <p>Share your Rating and Experince.</p>
                            <!-- Feedback form  -->
                            <form id="feedform" method="POST" action="../functions/feed.php?aid=<?php echo $aid; ?>&tid=<?php echo $tid; ?>">
                                Rating
                                <div class="form-group" style="margin-bottom:0px;">
                                <label for="feed">&nbsp</label>
                                        <div class="rate">                                            
                                            <input type="radio" id="star5" name="rate" value="5"/>
                                            <label for="star5" title="5 Star">5 stars</label>                                            
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="4 star">4 stars</label>                                            
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="3 Star">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="2 star">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1" />    
                                            <label for="star1" title="1 star">1 star</label>                                        
                                        </div>
                                </div>
                                <div class="form-group">       
                                    <label for="feed">Feedback</label>
                                    <textarea row="3" name="feed" id="feed" placeholder="Share your experience..." class="form-control"></textarea>
                                </div>
                                <div class="form-group" style="text-align:center;">       
                                    <input type="submit" style="width: 20vh;" name="submitfeedback" value="Submit" class="btn btn-primary">
                                </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <!-- <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button> -->
                            Rate My Ride | Thank You!
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
                    <h5><?php echo $autorow['number']; ?></h5>
                    <span class="heading">User Rating&nbsp:&nbsp</span>
                    <?php
                    for($k=0; $k <5; $k++){
                        if($avgstar <= 0.45 ){
                            echo "<span class='fa fa-star'></span>";
                        }
                        else {
                            echo "<span class='fa fa-star checked'></span>";
                        }
                        $avgstar--;
                    }

                    ?>
                    <hr>
                    <p><?php echo round($disavg,2)." average based on ".$count." reviews."; ?> </p>
                    <p>You should Pay : </p>
                    <h2>₹ <?php echo $tktrow['amount'];?> only</h2>
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
                                <?php 
                                    $star5 = "SELECT count(*) as cnt5 from feedback where auto_id = '$aid' and star = 5";
                                    $star5res = $con->query($star5);
                                    $star5row = $star5res->fetch_assoc();
                                    $star5per = ($star5row['cnt5'] / $count) * 100;
                                ?>
                                <th scope="row">5 Star</th>
                                <td>
                                    <div class="bar-container">
                                        <div class="bar-5" style="width: <?php echo $star5per; ?>%;"></div>
                                    </div>
                                </td>
                                <td style="float:right;"><?php echo $star5row['cnt5']; ?></td>
                                </tr>
                                <tr>
                                <?php 
                                    $star4 = "SELECT count(*) as cnt4 from feedback where auto_id = '$aid' and star = 4";
                                    $star4res = $con->query($star4);
                                    $star4row = $star4res->fetch_assoc();
                                    $star4per = ($star4row['cnt4'] / $count) * 100;
                                ?>
                                <th scope="row">4 Star</th>
                                <td>
                                    <div class="bar-container">
                                        <div class="bar-4" style="width: <?php echo $star4per; ?>%;"></div>
                                    </div>
                                </td>
                                <td style="float:right;"><?php echo $star4row['cnt4']; ?></td>
                                </tr>
                                <tr>
                                <?php 
                                    $star3 = "SELECT count(*) as cnt3 from feedback where auto_id = '$aid' and star = 3";
                                    $star3res = $con->query($star3);
                                    $star3row = $star3res->fetch_assoc();
                                    $star3per = ($star3row['cnt3'] / $count) * 100;
                                ?>
                                <th scope="row">3 Star</th>
                                <td>
                                    <div class="bar-container">
                                        <div class="bar-3" style="width: <?php echo $star3per; ?>%;"></div>
                                    </div>
                                </td>
                                <td style="float:right;"><?php echo $star3row['cnt3']; ?></td>
                                </tr>
                                <tr>
                                <?php 
                                    $star2 = "SELECT count(*) as cnt2 from feedback where auto_id = '$aid' and star = 2";
                                    $star2res = $con->query($star2);
                                    $star2row = $star2res->fetch_assoc();
                                    $star2per = ($star2row['cnt2'] / $count) * 100;
                                ?>
                                <th scope="row">2 Star</th>
                                <td>
                                    <div class="bar-container">
                                        <div class="bar-2" style="width: <?php echo $star2per; ?>%;"></div>
                                    </div>
                                </td>
                                <td style="float:right;"><?php echo $star2row['cnt2']; ?></td>
                                </tr>
                                <tr>
                                <?php 
                                    $star1 = "SELECT count(*) as cnt1 from feedback where auto_id = '$aid' and star = 1";
                                    $star1res = $con->query($star1);
                                    $star1row = $star1res->fetch_assoc();
                                    $star1per = ($star1row['cnt1'] / $count) * 100;
                                ?>
                                <th scope="row">1 Star</th>
                                <td>
                                    <div class="bar-container">
                                        <div class="bar-1" style="width: <?php echo $star1per; ?>%;"></div>
                                    </div>
                                </td>
                                <td style="float:right;"><?php echo $star1row['cnt1']; ?></td>
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
        
        <section>
            <div class="container-fluid">
            <!-- Deleted 3 charts  -->
            <!-- User reviews  -->
            <?php
                            
                $feedstmt = "SELECT * FROM feedback where auto_id = '$aid' AND feed != ''";
                $feedres = $con->query($feedstmt);
                if($feedres->num_rows > 0) {
                    while ($feedrow = $feedres->fetch_assoc()){
                        $star = $feedrow['star'];
                        $feed = $feedrow['feed'];
                        $id = $feedrow['fid'];
                        $addtime = strtotime($feedrow['time']);
                        $addtime = date("d/m/Y");
                        echo "
                            <div class='public-user-block block'>
                                <div class='row d-flex align-items-center'>                   
                                    <div class='col-lg-3 d-flex align-items-center'>
                                        <div class='order'>{$id}</div>
                                            <div class='avatar'> <img src='img/avatar-1.png' alt='...' class='img-fluid'></div>
                                            <a href='#' class='name'>
                                                <strong class='d-block'>User Review</strong> 
                                                <span class='d-block'>";
                                                for($i=0; $i<5; $i++){
                                                    if($star <= 0){
                                                        echo "<span class='fa fa-star'></span>";
                                                    } else {
                                                        echo "<span class='fa fa-star checked'></span>";
                                                    }
                                                    $star--;
                                                }
                                                echo "
                                                </span>
                                            </a>
                                        </div>
                                        <div class='col-lg-7'>
                                            <div class='contributions'>{$feed}</div>
                                        </div>
                                        <div class='col-lg-2'>
                                            <div class='details d-flex'>
                                            <div class='item'><i class='icon-light-bulb'></i><strong>{$addtime}</strong></div>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        ";
                    }
                }
            
            ?>                 
            <!-- review end -->
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

    <!-- AJAX Queries -->
    <script type="text/javascript">
    var userfrm = $('#feedform');

    userfrm.submit(function(e) {

        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type : "POST",
            url : userfrm.attr('action'),
            data: userfrm.serialize(),
            success: function(data) {
                top.window.location = './feedback.php?ticket=<?php echo $tid;?>';
                console.log(data);
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