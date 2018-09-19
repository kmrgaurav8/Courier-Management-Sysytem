<?php 
$pageTitle="Dispatch :: Courier Managemenet System";
require_once 'php_action/db_connect.php'; 
require_once('includes/header.php'); ?>
    	<div class="row">
			<?php require_once 'includes/sidebar.php'; ?>
			<div class="col-md-10">
			<?php
				if($_GET['o'] == 'courier') { 
					// add courier
						echo "<div class='div-request div-hide'>courier</div>";
					} else if($_GET['o'] == 'hand') { 
						echo "<div class='div-request div-hide'>hand</div>";
					} // /else manage courier
			?>
			</div>
			<div class="col-md-10">
				<div class="content-box-large">
					<div class="panel-heading">
						<div class="panel-title">
						<?php if($_GET['o'] == 'courier') { ?>
						<i class="fas fa-cubes">&nbsp;</i>Dispatch Details By Courier
						<?php } else if($_GET['o'] == 'hand') { ?>
						<i class="fas fa-hands">&nbsp;</i>Dispatch Details By Hand
						<?php } ?>
						</div>
						<ol class="breadcrumb" style="float: right;">
							  <li><a href="index.php">Home</a></li>
							  <li>Dispatch Details</li>
							  <li class="active">
								<?php if($_GET['o'] == 'courier') { ?>
									By Courier
									<?php } else if($_GET['o'] == 'hand') { ?>
									By hand
									<?php } // /else dispatch Courier ?>
							  </li>
						</ol>
					</div>
					
					<div class="panel-body">
						<?php if($_GET['o'] == 'courier') { 
							// add courier ?>
						<div style="float: right;">
						   <a  class="btn btn-success btn-sm " href="courier.php?o=add"><i class="fas fa-plus-circle">&nbsp;</i>Create New Courier</a>
						</div><br><br>
						<div id="success-messages"></div>
				
						<table class="table table-striped table-hover display" id="dispatchCourierTable">
							<thead>
								<tr>
									<th <a href="#"></a>Dispatch Id</th>
									<th>Requisition Date</th>
									<th>Dispatch Date</th>
									<th>Department</th>
									<th>Dispatch Center</th>
									<th>Courier Service</th>
									<th>POD No.</th>
									<th>Courier Status</th>
									<th>Action</th>


								</tr>
							</thead>
							<tbody>
								<?php 
								$sql = "SELECT d.courier_id, courier.req_date, d.dis_date, courier.dept_name, courier.dispatch_center, d.cour_comp, d.pod, d.courier_status FROM courier, dispatch d WHERE courier.courier_id = d.courier_id and d.mode=1";
								$result = $connect->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$courier_id = $row['courier_id'];
										$req_date = $row['req_date'];
										$dis_date = $row['dis_date'];
										$dept_name = $row['dept_name'];
										$dispatch_center = $row['dispatch_center'];
										$cour_comp = $row['cour_comp'];
										$pod = $row['pod'];
										$courier_status = $row['courier_status'];

										if($courier_status == 1){
											$finalStatus = "<label class='label label-warning'>Dispatched</label>";
										}else if($courier_status == 2){
											$finalStatus = "<label class='label label-info'>In-Transit</label>";
										}else {
											$finalStatus = "<label class='label label-success'>Delivered</label>";
										}
										
										if($cour_comp == 1){
											$courierService = "First Flight";
										}else if($cour_comp == 2){
										   $courierService = "Blue Dart";
										}else if($cour_comp == 3){
											$courierService = "DTDC";
										}else {
											$courierService = "Others";
										}

										echo "<tr>
										<td>$courier_id</td>
										<td>$req_date</td>
										<td>$dis_date</td>
										<td>$dept_name</td>
										<td>$dispatch_center</td>
										<td>$courierService</td>
										<td>$pod</td>
										<td>$finalStatus</td>
										";
										?>
										<td>
												<a href="#edit<?php echo $courier_id;?>" data-toggle="modal"><button type='button' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
											</div>
										</td>






									<!--Edit Item Modal -->
									<div id="edit<?php echo $courier_id; ?>" class="modal fade" role="dialog">
										<form method="post" class="form-horizontal" role="form">
											<div class="modal-dialog modal-lg">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Item</h4>
													</div>
													<div class="modal-body">
														<input type="hidden" name="edit_item_id" value="<?php echo $courier_id; ?>">
														<div class="form-group">
															<label for="finalStatus" class="col-sm-4 control-label">Dispatch Status </label>
															<div class="col-sm-8">
															  <select class="form-control" id="finalStatus" name="finalStatus">
																	<option value="">~~SELECT~~</option>
																	<option value="1" <?php if($finalStatus == 1) {
																			echo "selected";
																		} ?>>Dispatched</option>
																	<option value="2" <?php if($finalStatus == 2) {
																			echo "selected";
																		} ?>>In-Transit</option>
																	<option value="3" <?php if($finalStatus == 3) {
																			echo "selected";
																		} ?>>Delivered</option>
															  </select>
															</div>
														</div> <!-- /form-group-->		
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Update</button>
														<button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									</tr>


									<?php
													}


													//Update Items
													if(isset($_POST['update_item'])){
														$edit_item_id = $_POST['edit_item_id'];
														$finalStatus = $_POST['finalStatus'];
														$sql = "UPDATE dispatch SET 
															courier_status='$finalStatus'
															WHERE courier_id='$edit_item_id' ";
														if ($connect->query($sql) === TRUE) {
															echo '<div class="alert alert-success" id=""><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
															<strong>Successfully Updated.!</strong></div>';
														} else {
															echo "Error updating record: " . $connect->error;
														}
													}
												}



									?>
							</tbody>
						</table>
			
						<?php } else if($_GET['o'] == 'hand') { 
							// manage courier ?>
						<div style="float: right;">
						   <a  class="btn btn-success btn-sm " href="courier.php?o=add"><i class="fas fa-plus-circle">&nbsp;</i>Create New Courier</a>
						</div><br><br>
						<div id="success-messages"></div>
				
						<table class="table table-striped table-hover display" id="dispatchCourierTable">
							<thead>
								<tr>
									<th <a href="#"></a>Dispatch Id</th>
									<th>Requisition Date</th>
									<th>Dispatch Date</th>
									<th>Department</th>
									<th>Dispatch Center</th>
									<th>Emp ID</th>
									<th>Emp Name</th>
									<th>Courier Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$sql = "SELECT d.courier_id, courier.req_date, d.dis_date, courier.dept_name, courier.dispatch_center, d.emp_id, d.emp_name, d.courier_status FROM courier, dispatch d WHERE courier.courier_id = d.courier_id and d.mode=2";
								$result = $connect->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$courier_id = $row['courier_id'];
										$req_date = $row['req_date'];
										$dis_date = $row['dis_date'];
										$dept_name = $row['dept_name'];
										$dispatch_center = $row['dispatch_center'];
										$emp_id = $row['emp_id'];
										$emp_name = $row['emp_name'];
										$courier_status = $row['courier_status'];

										if($courier_status == 1){
											$finalStatus = "<label class='label label-warning'>Dispatched</label>";
										}else if($courier_status == 2){
											$finalStatus = "<label class='label label-info'>In-Transit</label>";
										}else {
											$finalStatus = "<label class='label label-success'>Delivered</label>";
										}
										

										echo "<tr>
										<td>$courier_id</td>
										<td>$req_date</td>
										<td>$dis_date</td>
										<td>$dept_name</td>
										<td>$dispatch_center</td>
										<td>$emp_id</td>
										<td>$emp_name</td>
										<td>$finalStatus</td>
										";
										?>
										<td>
												<a href="#edit<?php echo $courier_id;?>" data-toggle="modal"><button type='button' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
											</div>
										</td>






									<!--Edit Item Modal -->
									<div id="edit<?php echo $courier_id; ?>" class="modal fade" role="dialog">
										<form method="post" class="form-horizontal" role="form">
											<div class="modal-dialog modal-lg">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Item</h4>
													</div>
													<div class="modal-body">
														<input type="hidden" name="edit_item_id" value="<?php echo $courier_id; ?>">
														<div class="form-group">
															<label for="finalStatus" class="col-sm-4 control-label">Dispatch Status </label>
															<div class="col-sm-8">
															  <select class="form-control" id="finalStatus" name="finalStatus">
																	<option value="">~~SELECT~~</option>
																	<option value="1" <?php if($finalStatus == 1) {
																			echo "selected";
																		} ?>>Dispatched</option>
																	<option value="2" <?php if($finalStatus == 2) {
																			echo "selected";
																		} ?>>In-Transit</option>
																	<option value="3" <?php if($finalStatus == 3) {
																			echo "selected";
																		} ?>>Delivered</option>
															  </select>
															</div>
														</div> <!-- /form-group-->		
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Update</button>
														<button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									</tr>


									<?php
													}


													//Update Items
													if(isset($_POST['update_item'])){
														$edit_item_id = $_POST['edit_item_id'];
														$finalStatus = $_POST['finalStatus'];
														$sql = "UPDATE dispatch SET 
															courier_status='$finalStatus'
															WHERE courier_id='$edit_item_id' ";
														if ($connect->query($sql) === TRUE) {
															echo '<script>window.location.href="dispatch.php?o=hand"</script>';
														} else {
															echo "Error updating record: " . $connect->error;
														}
													}
												}



									?>
							</tbody>
							
						</table>
						<?php 
						} // /get order else  ?>
					</div>
				</div>
			</div>
		</div>
	
	
<!-- edit order -->
<div class="modal fade" tabindex="-1" role="dialog" id="dispatchCourierModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-wrench"></i> Update Status</h4>
      </div>      

      <div class="modal-body form-horizontal" style="max-height:500px; overflow:auto;" >

      	<div class="dispatchCourierMessages"></div>

      	     				 				 
			  <div class="form-group">
			    <label for="finalStatus" class="col-sm-3 control-label">Dispatch Status</label>
			    <div class="col-sm-9">
			      <select class="form-control" name="finalStatus" id="finalStatus">
			      	<option value="">Select Dispatch Status</option>
			      	<option value="1">Dispatched</option>
			      	<option value="2">In Transit</option>
			      	<option value="3">Delivered</option>
			      </select>
			    </div>
			  </div> <!--/form-group-->							  				  
      	        
      </div> <!--/modal-body-->
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="updateDispatchCourierBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>	
      </div>           
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /edit order-->

		<!-- remove order -->
		<div class="modal fade" tabindex="-1" role="dialog" id="removeCourierModal">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Order</h4>
			  </div>
			  <div class="modal-body">

				<div class="removeCourierMessages"></div>

				<p>Do you really want to remove ?</p>
			  </div>
			  <div class="modal-footer removeItemFooter">
				<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				<button type="button" class="btn btn-primary" id="removeCourierBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- /remove order-->

<?php require_once 'includes/footer.php'; ?>
