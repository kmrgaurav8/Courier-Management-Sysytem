<?php 
$pageTitle="Add/Manage Courier :: Courier Managemenet System";
require_once 'php_action/db_connect.php'; 
require_once('includes/header.php'); ?>
    	<div class="row">
			<?php require_once 'includes/sidebar.php'; ?>
			<div class="col-md-10">
			<?php
				if($_GET['o'] == 'add') { 
					// add courier
						echo "<div class='div-request div-hide'>add</div>";
					} else if($_GET['o'] == 'mancour') { 
						echo "<div class='div-request div-hide'>mancour</div>";
					} else if($_GET['o'] == 'editcour') { 
						echo "<div class='div-request div-hide'>editcour</div>";
					} else if($_GET['o'] == 'dispatchcour') { 
						echo "<div class='div-request div-hide'>dispatchcour</div>";
					} // /else manage courier
			?>
			</div>
			<div class="col-md-10">
				<div class="content-box-large">
					<div class="panel-heading">
						<div class="panel-title">
						<?php if($_GET['o'] == 'add') { ?>
						<i class="fas fa-plus-circle"></i>	Create Courier
						<?php } else if($_GET['o'] == 'mancour') { ?>
						<i class="fas fa-edit"></i> Manage Courier
						<?php } else if($_GET['o'] == 'editcour') { ?>
						<i class="fas fa-edit"></i> Edit Courier
						<?php } else if($_GET['o'] == 'dispatchcour') { ?>
						<i class="fas fa-truck-moving"></i> Dispatch Courier
						<?php } ?>
						</div>
						<ol class="breadcrumb" style="float: right;">
							  <li><a href="index.php">Home</a></li>
							  <li>Courier</li>
							  <li class="active">
								<?php if($_GET['o'] == 'add') { ?>
									Create Courier
									<?php } else if($_GET['o'] == 'mancour') { ?>
										Manage Courier
									<?php } else if($_GET['o'] == 'dispatchcour') { ?>
										Dispatch Courier
									<?php } // /else dispatch Courier ?>
							  </li>
						</ol>
					</div>
					
					<div class="panel-body">
						<?php if($_GET['o'] == 'add') { 
							// add courier
						?>			
							<div class="success-messages"></div> <!--/success-messages-->
						<form class="form-horizontal" method="POST" action="php_action/createCourier.php" id="createCourierForm">
							<div class="col-md-6">
								<div class="form-group required">
									<label for="reqDate" class="col-sm-4 control-label">Requisition Date</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="reqDate" name="reqDate"  autocomplete="off" />
									</div>
								</div> <!--/form-group-->
								<div class="form-group required">
									<label for="reqBy" class="col-sm-4 control-label">Requisition By</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="reqBy" name="reqBy"  />
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group required">
									<label for="deptName" class="col-sm-4 control-label">Department Name</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="deptName" name="deptName" />
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group required">
									<label for="compName" class="col-sm-4 control-label">Company Name</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="compName" name="compName" autocomplete="off" />
									</div>
								</div> <!--/form-group-->
								<div class="form-group required">
									<label for="cityName" class="col-sm-4 control-label">City Name</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="cityName" name="cityName"  />
									</div>
								</div> <!--/form-group-->	
								
							</div> <!--/col-md-6-->
							<div class="col-md-6">
								<div class="form-group required">
									<label for="particularType" class="col-sm-4 control-label">Particular Type </label>
									<div class="col-sm-8">
									  <select class="form-control" id="particularType" name="particularType">
										<option value="">~~Select Type of Courier~~</option>
										<option value="1">Documents</option>
										<option value="2">Assets</option>
										<option value="3">Mixed</option>
									  </select>
									</div>
								</div> <!-- /form-group-->	   								
								<div class="form-group required">
									<label for="dispatchCenter" class="col-sm-4 control-label">Dispatch Center</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="dispatchCenter" name="dispatchCenter" autocomplete="off"  />
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group required">
									<label for="challan" class="col-sm-4 control-label">Challan No.</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="challan" name="challan"  />
									</div>
								</div> <!--/form-group-->		
								<div class="form-group required">
									<label for="invValue" class="col-sm-4 control-label">Invoice Value</label>
									<div class="col-sm-8">
									  <input type="number" class="form-control" id="invValue" name="invValue" step="0.01" min="0"  />
									</div>
								</div> <!--/form-group-->	
								<div class="form-group required">
									<label for="courierStatus" class="col-sm-4 control-label">Status </label>
									<div class="col-sm-8">
									  <select class="form-control" id="courierStatus" name="courierStatus">
										<option value="">Select Packing Status</option>
										<option value="1">Packed</option>
										<option value="2">Initiated</option>
									  </select>
									</div>
								</div> <!-- /form-group-->	   								
							</div> <!--/col-md-6-->							<div class="table-responsive">
							<table class="table" id="particularTable">
								<thead>
									<tr>			  			
										<th style="width:40%;">Description</th>
										<th>Item Code</th>	
										<th>Amount</th>	
										<th>Unit</th>
										<th>Quantity</th>
										<th>Option</th>
									</tr>
								</thead>
								<tbody>
			  		<?php
			  		$arrayNumber = 0;
			  		for($x = 1; $x < 2; $x++) { ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
										<td >
														  					<select class="form-control" name="description[]" id="description<?php echo $x; ?>" onchange="getItemData(<?php echo $x; ?>)" >
			  						<option value="">~~SELECT~~</option>
			  						<?php
			  							$itemSql = "SELECT * FROM item_master";
			  							$itemData = $connect->query($itemSql);

			  							while($row = $itemData->fetch_array()) {									 		
			  								echo "<option value='".$row['item_id']."' id='changeItem".$row['item_id']."'>".$row['description']."</option>";
										 	}
			  						?>
									</select>
									
										</td>
										<td>			  					
											<input type="text" name="itemcode[]" id="itemcode<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" />
											
											<input type="hidden" name="itemcodeValue[]" id="itemcodeValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
											
										</td>
										<td>
											<input type="number" name="amount[]" id="amount<?php echo $x; ?>"  autocomplete="off" class="form-control" min="1" />
										</td>
										<td>			  					
											<input type="number" name="unit[]" id="unit<?php echo $x; ?>" autocomplete="off" class="form-control" min="1" />
										</td>
										<td>			  					
											<input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" autocomplete="off" class="form-control"  />
										</td>
										<td>
											<button class="btn btn-default removeItemRowBtn " type="button"  onclick="removeItemRow(<?php echo $x; ?>)"><i class="fas fa-trash">&nbsp;</i></button>
										</td>
									</tr>
											  			<?php
		  			$arrayNumber++;
			  		} // /for
			  		?>

								</tbody>
							</table>
						</div><hr>
						 <div class="form-group submitButtonFooter">

						<center>
							<button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add More </button>

							<button type="submit" id="createCourierBtn" data-loading-text="Loading..." class="btn btn-success"><i class="fas fa-check-circle">&nbsp;</i> Save Changes</button>

							<button type="reset" class="btn btn-default" onclick="resetCourierForm()"><i class="fas fa-times-circle">&nbsp;</i> Reset</button>
						</center>
						</div>
						
					</form>
		<?php } else if($_GET['o'] == 'mancour') { 
			// manage courier
			?>
			<div id="success-messages"></div>
			
			<table class="table table-striped table-hover " id="manageCourierTable">
						<thead>
							<tr>
								<th>#</th>
								<th>Requisition Date</th>
								<th>Requisition By</th>
								<th>Department</th>
								<th>Particular Type</th>
								<th>Dispatch Center</th>
								<th>Total Item</th>
								<th>Courier Status</th>
								<th>Action</th>


							</tr>
						</thead>
					</table>
		<?php 
		// /else manage courier
		} else if($_GET['o'] == 'editcour') {
			// get courier
			?>
<div class="success-messages"></div> <!--/success-messages-->

						<form class="form-horizontal" method="POST" action="php_action/editCourier.php" id="editCourierForm">
  			<?php $courierId = $_GET['i'];
  			$sql = "SELECT courier.courier_id, courier.req_date, courier.req_by, courier.dept_name, courier.comp_name, courier.city_name, courier.part_name, courier.dispatch_center, courier.challan_no, courier.inv_value,  courier.courier_status FROM courier 	
					WHERE courier.courier_id = {$courierId}";
//echo($courierId);
				$result = $connect->query($sql);
				$data = $result->fetch_row();	
  			?>
							<div class="col-md-6">
								<div class="form-group required">
									<label for="reqDate" class="col-sm-4 control-label">Requisition Date</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="reqDate" name="reqDate"  autocomplete="off" value="<?php echo $data[1] ?>" />
									</div>
								</div> <!--/form-group-->
								<div class="form-group required">
									<label for="reqBy" class="col-sm-4 control-label">Requisition By</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="reqBy" name="reqBy" value="<?php echo $data[2] ?>"  />
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group required">
									<label for="deptName" class="col-sm-4 control-label">Department Name</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="deptName" name="deptName"  value="<?php echo $data[3] ?>"/>
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group required">
									<label for="compName" class="col-sm-4 control-label">Company Name</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="compName" name="compName" autocomplete="off" value="<?php echo $data[4] ?>" />
									</div>
								</div> <!--/form-group-->
								<div class="form-group required">
									<label for="cityName" class="col-sm-4 control-label">City Name</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="cityName" name="cityName"   value="<?php echo $data[5] ?>"/>
									</div>
								</div> <!--/form-group-->	
							</div>
							<div class="col-md-6">
								<div class="form-group required">
									<label for="particularType" class="col-sm-4 control-label">Particular Type </label>
									<div class="col-sm-8">
									  <select class="form-control" id="particularType" name="particularType">
										<option value="">~~SELECT~~</option>
										<option value="1" <?php if($data[6] == 1) {
				      		echo "selected";
				      	} ?>>Documents</option>
										<option value="2" <?php if($data[6] == 2) {
				      		echo "selected";
				      	} ?>>Assets</option>
										<option value="3" <?php if($data[6] == 3) {
				      		echo "selected";
				      	} ?>>Mixed</option>
									  </select>
									</div>
								</div> <!-- /form-group-->		
								<div class="form-group required">
									<label for="dispatchCenter" class="col-sm-4 control-label">Dispatch Center</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="dispatchCenter" name="dispatchCenter" autocomplete="off" value="<?php echo $data[7] ?>"  />
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group required">
									<label for="challan" class="col-sm-4 control-label">Challan No.</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="challan" name="challan"   value="<?php echo $data[8] ?>"/>
									</div>
								</div> <!--/form-group-->		
								<div class="form-group required">
									<label for="invValue" class="col-sm-4 control-label">Invoice Value</label>
									<div class="col-sm-8">
									  <input type="number" class="form-control" id="invValue" name="invValue"  value="<?php echo $data[9] ?>" />
									</div>
								</div> <!--/form-group-->	
								<div class="form-group required">
									<label for="courierStatus" class="col-sm-4 control-label">Status </label>
									<div class="col-sm-8">
									  <select class="form-control" id="courierStatus" name="courierStatus">
										<option value="">Select Packing Status</option>
										<option value="1" <?php if($data[10] == 1) {
				      		echo "selected";
				      	} ?>>Packed</option>
										<option value="2" <?php if($data[10] == 2) {
				      		echo "selected";
				      	} ?>>Initiated</option>
									  </select>
									</div>
								</div> <!-- /form-group-->
								</div> <!--/col-md-6-->
							<table class="table text-center" id="particularTable">
								<thead>
									<tr>			  			
										<th style="width:40%;">Description</th>
										<th>Item Code</th>	
										<th>Amount</th>	
										<th>Unit</th>
										<th>Quantity</th>
										<th>Option</th>
									</tr>
								</thead>
								<tbody>
									<?php

			  		$courierItemSql = "SELECT courier_item.courier_item_id, courier_item.courier_id, courier_item.item_id, courier_item.item_code, courier_item.amount, courier_item.unit ,courier_item.quantity FROM courier_item WHERE courier_item.courier_id = {$courierId}";
						$courierItemResult = $connect->query($courierItemSql);
						 //$courierItemData = $courierItemResult->fetch_all();						
						
						//print_r($courierItemData);
			  		$arrayNumber = 0;
			  		$x = 1;
			  		while($courierItemData = $courierItemResult->fetch_array()) { 
			  			// print_r($courierItemData); ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">
							<td >			  					
								<select class="form-control" name="description[]" id="description<?php echo $x; ?>" onchange="getItemData(<?php echo $x; ?>)" >
									<option value="">~~SELECT~~</option>
									<?php
										$itemSql = "SELECT * FROM item_master";
										$itemData = $connect->query($itemSql);

										while($row = $itemData->fetch_array()) {									 		
											$selected = "";
											if($row['item_id'] == $courierItemData['item_id']) {
												$selected = "selected";
											} else {
												$selected = "";
											}

											echo "<option value='".$row['item_id']."' id='changeItem".$row['item_id']."' ".$selected." >".$row['description']."</option>";
											} // /while 

									?>
								</select>
							</td>
							<td>			  					
								<input type="text" name="itemcode[]" id="itemcode<?php echo $x; ?>" disabled="true" autocomplete="off"  class="form-control" min="1" value="<?php echo $courierItemData['item_code']; ?>" />	
								<input type="hidden" name="itemcodeValue[]" id="itemcodeValue<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $courierItemData['item_code']; ?>" />			
							</td>
							<td>
								<input type="text" name="amount[]" id="amount<?php echo $x; ?>"  autocomplete="off" class="form-control" min="1" value="<?php echo $courierItemData['amount']; ?>" />
							</td>
							<td>			  					
								<input type="number" name="unit[]" id="unit<?php echo $x; ?>" autocomplete="off" class="form-control" min="1" value="<?php echo $courierItemData['unit']; ?>" />
							</td>
							<td>			  					
								<input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" autocomplete="off" class="form-control"  value="<?php echo $courierItemData['quantity']; ?>"/>	
							</td>
							<td>	<button class="btn btn-default removeItemRowBtn " type="button"  onclick="removeItemRow(<?php echo $x; ?>)"><i class="fas fa-trash">&nbsp;</i></button>

							</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
		  			$x++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>

						<hr>
						 <div class="form-group editButtonFooter">

						<center>
							<button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add More </button>
							
							<input type="hidden" name="courierId" id="courierId" value="<?php echo $_GET['i']; ?>" />
							
							<button type="submit" id="editCourierBtn" data-loading-text="Loading..." class="btn btn-success"><i class="fas fa-check-circle">&nbsp;</i> Save Changes</button>

						</center>
					</div>
					</form>
		<?php } else if($_GET['o'] == 'dispatchcour') { 
			// manage courier
			?>
<div class="success-messages"></div> <!--/success-messages-->
			
						<form class="form-horizontal" method="POST" action="php_action/dispatchDetails.php" id="dispatchCourierForm">
  			<?php $courierId = $_GET['i'];
  			$sql = "SELECT courier.courier_id, courier.req_date, courier.req_by, courier.dept_name, courier.comp_name, courier.city_name, courier.part_name, courier.dispatch_center, courier.challan_no, courier.inv_value,  courier.courier_status FROM courier 	
					WHERE courier.courier_id = {$courierId}";
//echo($courierId);
				$result = $connect->query($sql);
				$data = $result->fetch_row();	
  			?>			
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="reqDate" class="col-sm-4 control-label">Requisition Date</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="reqDate" name="reqDate"  disabled="true" autocomplete="off" value="<?php echo $data[1] ?>" />
									</div>
								</div> <!--/form-group-->
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="reqBy" class="col-sm-4 control-label">Requisition By</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="reqBy" name="reqBy" disabled="true" value="<?php echo $data[2] ?>"  />
									</div>
								</div> <!--/form-group-->		
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">								
								<div class="form-group">
									<label for="deptName" class="col-sm-4 control-label">Department Name</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="deptName" name="deptName"  disabled="true" value="<?php echo $data[3] ?>"/>
									</div>
								</div> <!--/form-group-->			  
							</div> <!--/form-group-->			  
							<div class="col-md-6">								
								<div class="form-group">
									<label for="compName" class="col-sm-4 control-label">Company Name</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="compName" name="compName" disabled="true" autocomplete="off" value="<?php echo $data[4] ?>" />
									</div>
								</div> <!--/form-group-->
							</div> <!--/form-group-->
						</div> <!--/form-group-->
						<div class="row">
							<div class="col-md-6">								
								<div class="form-group">
									<label for="cityName" class="col-sm-4 control-label">City Name</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="cityName" name="cityName"   disabled="true" value="<?php echo $data[5] ?>"/>
									</div>
								</div> <!--/form-group-->	
							</div> <!--/form-group-->			  
							<div class="col-md-6">								
								<div class="form-group">
									<label for="particularType" class="col-sm-4 control-label">Particular Type </label>
									<div class="col-sm-8">
									  <select class="form-control" id="particularType" name="particularType" disabled="true" >
										<option value="">~~SELECT~~</option>
										<option value="1" <?php if($data[6] == 1) {
				      		echo "selected";
				      	} ?>>Documents</option>
										<option value="2" <?php if($data[6] == 2) {
				      		echo "selected";
				      	} ?>>Assets</option>
										<option value="3" <?php if($data[6] == 3) {
				      		echo "selected";
				      	} ?>>Mixed</option>
									  </select>
									</div>
								</div> <!-- /form-group-->		
							</div> <!--/form-group-->
						</div> <!--/form-group-->
						<div class="row">
							<div class="col-md-6">								
								<div class="form-group">
									<label for="challan" class="col-sm-4 control-label">Challan No.</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="challan" name="challan" disabled="true"  value="<?php echo $data[8] ?>"/>
									</div>
								</div> <!--/form-group-->		
							</div> <!--/form-group-->			  
							<div class="col-md-6">								
								<div class="form-group">
									<label for="invValue" class="col-sm-4 control-label">Invoice Value</label>
									<div class="col-sm-8">
									  <input type="number" class="form-control" id="invValue" name="invValue" disabled="true"  value="<?php echo $data[9] ?>" />
									</div>
								</div> <!--/form-group-->	
							</div> <!--/form-group-->
						</div> <!--/form-group-->
						<div class="row">
							<div class="col-md-6">								
								<div class="form-group">
									<label for="dispatchCenter" class="col-sm-4 control-label">Dispatch Center</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="dispatchCenter" name="dispatchCenter" disabled="true" autocomplete="off" value="<?php echo $data[7] ?>"  />
									</div>
								</div> <!--/form-group-->			  
							</div> <!--/form-group-->			  
							<div class="col-md-6">								
								<div class="form-group">
									<label for="courierStatus" class="col-sm-4 control-label">Packing Status </label>
									<div class="col-sm-8">
									  <select class="form-control" id="courierStatus" name="courierStatus" disabled="true" >
										<option value="">~~SELECT~~</option>
										<option value="1" <?php if($data[10] == 1) {
												echo "selected";
											} ?>>Packed
										</option>
										<option value="2" <?php if($data[10] == 2) {
												echo "selected";
											} ?>>Initiated
										</option>
									  </select>
									</div>
								</div> <!-- /form-group-->
							</div> <!--/form-group-->
						</div> <!--/form-group-->
  			<?php $courierId = $_GET['i'];
  			$usql = "SELECT dispatch.courier_id, dispatch.dis_date, dispatch.mode, dispatch.cour_comp, dispatch.pod, dispatch.emp_id, dispatch.emp_name, dispatch.weight, dispatch.courier_status FROM dispatch WHERE dispatch.courier_id = {$courierId}";
				$uresult = $connect->query($usql);
				$datar = $uresult->fetch_row();	
  			?>			
						<div class="row">
							<div class="col-md-6">								
								<div class="form-group required">
									<label for="disDate" class="col-sm-4 control-label">Dispatch Date</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="disDate" name="disDate"  autocomplete="off" placeholder="Enter Dispatch Date" value="<?php echo $datar[1] ?>" />
									</div>
								</div> <!--/form-group-->
							</div> <!--/form-group-->			  
							<div class="col-md-6">								
								  <div class="form-group required">
									<label for="mode" class="col-sm-4 control-label">Mode of Dispatch</label>
									<div class="col-sm-8">
									  <select class="form-control" name="mode" id="mode" onchange="fun_showtextbox()">
										<option value="">Select Mode of Dispatch</option>
										<option value="1" <?php if($datar[2] == 1) {
				      		echo "selected";
				      	} ?>>By Courier</option>
										<option value="2" <?php if($datar[2] == 2) {
				      		echo "selected";
				      	} ?>>By Hand</option>
									  </select>
									</div>
								</div> <!--/form-group-->
							</div> <!--/form-group-->
						</div> <!--/form-group-->							  
						<div class="row" style= "display:none" id="byCourier">
							<div class="col-md-6">								
							  <div class="form-group required">
								<label for="courierComp" class="col-sm-4 control-label">Courier Service</label>
								<div class="col-sm-8">
								  <select class="form-control" name="courierComp" id="courierComp" >
									<option value="">Select Courier Service</option>
									<option value="1" <?php if($data[3] == 1) {
										echo "selected";
									} ?>>FirstFlight</option>
													<option value="2" <?php if($datar[3] == 2) {
										echo "selected";
									} ?>>BlueDart</option>
													<option value="3" <?php if($datar[3] == 3) {
										echo "selected";
									} ?>>DTDC</option>
													<option value="4" <?php if($datar[3] == 3) {
										echo "selected";
									} ?>>DTDC</option>
								  </select>
								</div>
							  </div> <!--/form-group-->
							</div> <!--/form-group-->			  
							<div class="col-md-6">								
								  <div class="form-group required">
									<label for="pod" class="col-sm-4 control-label">POD No.</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="pod" name="pod" placeholder="Enter POD No." value="<?php echo $datar[4] ?>"/>					      
									</div>
								  </div> <!--/form-group-->		
							</div> <!--/form-group-->
						</div> <!--/form-group-->							  
						<div class="row" style= "display:none" id="byHand">
							<div class="col-md-6">								
								<div class="form-group required">
									<label for="empId" class="col-sm-4 control-label">Employee Id</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="empId" name="empId" placeholder="Enter Employee Id (e.g.E0001234)" value="<?php echo $datar[5] ?>" />
									</div>
								</div> <!--/form-group-->	
							</div> <!--/form-group-->			  
							<div class="col-md-6">								
								  <div class="form-group required">
									<label for="empName" class="col-sm-4 control-label">Employee Name</label>
									<div class="col-sm-8">
									  <input type="text" class="form-control" id="empName" name="empName" placeholder="Enter Emloyee Name" value="<?php echo $datar[6] ?>"/>					      
									</div>
								  </div> <!--/form-group-->		
							</div> <!--/form-group-->
						</div> <!--/form-group-->
						<div class="row">
							<div class="col-md-6">								
								<div class="form-group required">
									<label for="weight" class="col-sm-4 control-label">Weight of Courier</label>
									<div class="col-sm-8">
									  <input type="number" class="form-control" id="weight" name="weight" step="0.01" min="0.01" placeholder="in KGs.(e.g. 1.07)" value="<?php echo $datar[7] ?>"/>
									</div>
								</div> <!--/form-group-->	
							</div> <!--/form-group-->			  
							<div class="col-md-6">								
								  <div class="form-group required">
									<label for="finalStatus" class="col-sm-4 control-label">Dispatch Status</label>
									<div class="col-sm-8">
									  <select class="form-control" name="finalStatus" id="finalStatus">
										<option value="">Select Dispatch Status</option>
										<option value="1" <?php if($datar[8] == 1) {
											echo "selected";
										} ?>>Dispatched</option>
														<option value="2" <?php if($datar[8] == 2) {
											echo "selected";
										} ?>>In Transit</option>
														<option value="3" <?php if($datar[8] == 3) {
											echo "selected";
										} ?>>Delivered</option>
									  </select>
									</div>
								  </div> <!--/form-group-->							  				  
							</div> <!--/form-group-->
						</div> <!--/form-group-->							  
						<br><hr>
						 <div class="form-group editButtonFooter">
							<center>
								<input type="hidden" name="courierId" id="courierId" value="<?php echo $_GET['i']; ?>" />
							
								<button type="submit" id="dispatchCourierBtn" onclick="return dateCheck()"data-loading-text="Loading..." class="btn btn-success"><i class="fas fa-check-circle">&nbsp;</i> Submit</button>
							<button type="reset" class="btn btn-default" onclick="resetdispatchCourierForm()"><i class="fas fa-times-circle">&nbsp;</i> Reset</button>
							</center>
						</div>
					</form>
		<?php 
		} // /get order else  ?></div>
			</div>
		</div>
	</div>
	
	

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
