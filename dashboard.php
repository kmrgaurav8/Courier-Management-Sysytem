<?php 
$pageTitle="Dashboard :: Courier Managemenet System";
require_once('includes/header.php'); ?>

    	<div class="row">
			<?php require_once 'includes/sidebar.php'; ?>
			<div class="col-md-10">
				<div class="col-md-4">
					<div class="card">
					  <div class="cardHeader"style="background-color:#ffc107;">
						<h2><a href="courier.php?o=mancour" style="text-decoration:none;color:white;"><?php echo date('l') .' '.date('d').', '.date('Y'); ?></a></h2>
					  </div>

					  <div class="cardContainer">
						<h4>Total In Transit Courier</h4>
					  </div>
					</div> 
				</div> <!--/col-md-4-->
				<div class="col-md-4">
					<div class="card">
					  <div class="cardHeader" style="background-color:#4CAF50;">
						<h2><a href="courier.php?o=mancour" style="text-decoration:none;color:white;"><?php echo date('l') .' '.date('d').', '.date('Y'); ?></a></h2>
					  </div>
					  <div class="cardContainer">
						<h4>Total Delivered Courier</h4>
					  </div>
					</div> 
				</div> <!--/col-md-4-->
				<div class="col-md-4">
					<div class="card">
					  <div class="cardHeader" style="background-color:#245580;">
						<h2><a href="courier.php?o=mancour" style="text-decoration:none;color:white;"><?php echo date('l') .' '.date('d').', '.date('Y'); ?></a></h2>
					  </div>

					  <div class="cardContainer">
						<h4>Total Initiated Courier</h4>
					  </div>
					</div> 
				</div> <!--/col-md-4-->
			</div>
		</div>
<?php require_once 'includes/footer.php'; ?>
