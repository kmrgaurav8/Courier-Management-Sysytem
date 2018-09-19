<?php 
$pageTitle="Dashboard :: Courier Managemenet System";
require_once 'php_action/db_connect.php'; 
require_once('includes/header.php'); ?>
<?php 

$sql = "SELECT * FROM dispatch WHERE courier_status = 1";
$query = $connect->query($sql);
$dispatchCourier = $query->num_rows;

$dispatchSql = "SELECT * FROM dispatch WHERE courier_status = 2";
$dispatchQuery = $connect->query($dispatchSql);
$countdispatch = $dispatchQuery->num_rows;

$delSql = "SELECT * FROM dispatch WHERE courier_status = 0";
$delQuery = $connect->query($delSql);
$delCourier = $delQuery->num_rows;

$connect->close();

?>

    	<div class="row">
			<?php require_once 'includes/sidebar.php'; ?>
			<div class="col-md-10">
				<div class="col-md-4">
					<div class="card">
					  <div class="cardHeader"style="background-color:#ffc107;">
						<h2><a href="courier.php?o=mancour" style="text-decoration:none;color:white;"><?php echo $dispatchCourier; ?></a></h2>
					  </div>

					  <div class="cardContainer">
						<h4>Total In Transit Courier</h4>
					  </div>
					</div> 
				</div> <!--/col-md-4-->
				<div class="col-md-4">
					<div class="card">
					  <div class="cardHeader" style="background-color:#4CAF50;">
						<h2><a href="courier.php?o=mancour" style="text-decoration:none;color:white;"><?php echo $countdispatch; ?></a></h2>
					  </div>
					  <div class="cardContainer">
						<h4>Total Delivered Courier</h4>
					  </div>
					</div> 
				</div> <!--/col-md-4-->
				<div class="col-md-4">
					<div class="card">
					  <div class="cardHeader" style="background-color:#245580;">
						<h2><a href="courier.php?o=mancour" style="text-decoration:none;color:white;"><?php echo $delCourier; ?></a></h2>
					  </div>

					  <div class="cardContainer">
						<h4>Total Initiated Courier</h4>
					  </div>
					</div> 
				</div> <!--/col-md-4-->
			</div>
		</div>
<?php require_once 'includes/footer.php'; ?>
