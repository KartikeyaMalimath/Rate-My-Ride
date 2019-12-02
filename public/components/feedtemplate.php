<?php 

	$feedtemplate = "
		<nav class='navbar navbar-expand-lg'>
        <div class='search-panel'>
          <div class='search-inner d-flex align-items-center justify-content-center'>
            <div class='close-btn'>Close <i class='fa fa-close'></i></div>
            <form id='searchForm' action='#'>
              <div class='form-group'>
                <input type='search' name='search' placeholder='What are you searching for...'>
                <button type='submit' class='submit'>Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class='container-fluid d-flex align-items-center justify-content-between'>
          <div class='navbar-header'>
            <!-- Navbar Header--><a href='./' class='navbar-brand'>
              <div class='brand-text brand-big visible text-uppercase'><strong class='text-primary'>Rate</strong><strong>My</strong><strong>Ride</strong></div>
              <div class='brand-text brand-sm'><strong class='text-primary'>R</strong><strong>MR</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class='sidebar-toggle'><i class='fa fa-long-arrow-left'></i></button>
          </div>
          <div class='right-menu list-inline no-margin-bottom'>    
            <div class='list-inline-item'><a href='#' class='search-open nav-link'><i class='icon-magnifying-glass-browser'></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class='d-flex align-items-stretch'>
      <!-- Sidebar Navigation-->
      <nav id='sidebar'>
        <!-- Sidebar Header-->
        <div class='sidebar-header d-flex align-items-center'>
          <!--div class='avatar'><img src='img/avatar-6.jpg' alt='...' class='img-fluid rounded-circle'></div>-->
          <div class='title'>
            <h1 class='h5'>{$autorow['name']}</h1>
            <p>Service Excellence</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class='heading'>Main</span>
        <ul class='list-unstyled'>
          <li id = 'lihome' ><a href='./feedback.php'> <i class='icon-home'></i>Home </a></li>
          <li id='about'><a href='aboutfeed.php'> <i class='icon-logout'></i>About Us</a></li>
        
      </nav>
	";

?>

<!-- use sidemenus if required -->

<!-- <li id = 'litables'><a href='tables.php'> <i class='icon-grid'></i>To be Reviwed</a></li>
<li id = 'licharts'><a href='charts.php'> <i class='fa fa-bar-chart'></i>Recent Reviews</a></li>
<li id = 'liforms'><a href='forms.php'> <i class='icon-padnote'></i>Registrations</a></li>
<li><a href='#exampledropdownDropdown' aria-expanded='false' data-toggle='collapse'> <i class='icon-windows'></i>Auto Details</a>
  <ul id='exampledropdownDropdown' class='collapse list-unstyled '>
    <li><a href='#'>Active Autos</a></li>
    <li><a href='#'>Blacklisted Autos</a></li>
    <li><a href='#'>Deactivated Autos</a></li>
  </ul>
</li> -->