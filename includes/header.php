<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $pageTitle; ?></title>
    <?php require_once 'php_action/core.php'; 
	?>
	

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.ico">
    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <!-- styles -->
    <link href="assets/css/styles.css" rel="stylesheet">
	<link href="assets/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
	<!--link href="assets/vendors/datatables/css/jquery.dataTables.min.css" rel="stylesheet" media="screen"-->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php"><img src="assets/images/mahendras.png"  height="30" alt="Mahendra's" />&nbsp;Courier Management System</a></h1>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Enter POD No.">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-3">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-map-marked-alt"></i>Track Your Courier <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="http://firstflight.net/" target="_blank">FirstFlight</a></li>
	                          <li><a href="http://www.dtdc.in/tracking/shipment-tracking.asp" target="_blank">DTDC</a></li>
	                          <li><a href="http://www.bluedarttrackings.in/" target="_blank">BlueDart</a></li>
	                          <li><a href="https://www.aftership.com/couriers" target="_blank">Others</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i>My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.php"><i class="fa fa-user-tie">&nbsp;</i>Profile</a></li>
	                          <li><a href="logout.php"><i class="fa fa-sign-out-alt">&nbsp;</i>Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
    <div class="page-content">
