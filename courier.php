<?php 
$pageTitle="Add/Manage Courier :: Courier Managemenet System";
require_once('includes/header.php'); ?>
    	<div class="row">
			<?php require_once 'includes/sidebar.php'; ?>
			<div class="col-md-10">
			<?php
				if($_GET['o'] == 'add') { 
					// add order
						echo "<div class='div-request div-hide'>add</div>";
					} else if($_GET['o'] == 'mancour') { 
						echo "<div class='div-request div-hide'>mancour</div>";
					} else if($_GET['o'] == 'editcour') { 
						echo "<div class='div-request div-hide'>editcour</div>";
					} // /else manage order
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
									<?php } // /else manage Courier ?>
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
								<div class="form-group">
									<label for="reqDate" class="col-sm-3 control-label">Requisition Date*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="reqDate" name="reqDate"  autocomplete="off" />
									</div>
								</div> <!--/form-group-->
								<div class="form-group">
									<label for="reqBy" class="col-sm-3 control-label">Requisition By*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="reqBy" name="createOrderBtn"  />
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group">
									<label for="deptName" class="col-sm-3 control-label">Department Name*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="deptName" name="deptName" />
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group">
									<label for="compName" class="col-sm-3 control-label">Company Name*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="compName" name="compName" autocomplete="off" />
									</div>
								</div> <!--/form-group-->	
							</div> <!--/col-md-6-->
							<div class="col-md-6">
								<div class="form-group">
									<label for="cityName" class="col-sm-3 control-label">City Name*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="cityName" name="cityName"  />
									</div>
								</div> <!--/form-group-->	
								<div class="form-group">
									<label for="dispatchCenter" class="col-sm-3 control-label">Dispatch Center*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="dispatchCenter" name="dispatchCenter" autocomplete="off"  />
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group">
									<label for="challan" class="col-sm-3 control-label">Challan No.*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="challan" name="challan"  />
									</div>
								</div> <!--/form-group-->		
								<div class="form-group">
									<label for="invValue" class="col-sm-3 control-label">Invoice Value*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="invValue" name="invValue"  />
									</div>
								</div> <!--/form-group-->		
							</div> <!--/col-md-6-->	
						</div>
						<div class="table-responsive">
							<table class="table text-center" id="particularTable">
								<thead>
									<tr>			  			
										<th>Item Code</th>
										<th>Description</th>	
										<th>Amount</th>	
										<th>Unit</th>
										<th>Quantity</th>
										<th>Option</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$arrayNumber = 0;
									for($x = 1; $x < 4; $x++) { ?>
										<tr>			  				
											<td>
												<div class="form-group">
												<input type="number" name="quantity[]" id="srno<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
												</div>
											</td>
											<td>			  					
												<input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off"  class="form-control" />			  					
												<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
											</td>
											<td>
												<div class="form-group">
												<input type="text" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
												</div>
											</td>
											<td>			  					
												<input type="number" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control"  />			  					
												<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
											</td>
											<td>			  					
												<input type="number" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control"  />			  					
												<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
											</td>
											<td>

												<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="fas fa-trash">&nbsp;</i></button>
											</td>
										</tr>
									<?php
									$arrayNumber++;
									} // /for
									?>
								</tbody>		
							</table>
						</div><hr>
						<center>
							<button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="fas fa-plus-circle">&nbsp;</i> Add Row </button>
							<button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="fas fa-check-circle">&nbsp;</i> Save Changes</button>
							<button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="fas fa-times-circle">&nbsp;</i> Reset</button>
						</center>
					</form>
		<?php } else if($_GET['o'] == 'mancour') { 
			// manage order
			?>
			<div id="success-messages"></div>
			
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover " id="example">
						<thead>
							<tr>
								<th>Requisition Date</th>
								<th>Department</th>
								<th>Particular</th>
								<th>Dispatch Center</th>
								<th>POD No.</th>
								<th>Status</th>
								<th>Action</th>


							</tr>
						</thead>
						<tbody >
							<tr class="odd gradeX">
								<td>Trident</td>
								<td>Internet Explorer 4.0</td>
								<td>Win 95+</td>
								<td>4</td>
								<td><a href="index.php">X</td>
								<td><span class="label label-success">In Transit</span></td>
								<td><a class="btn btn-success btn-sm" data-toggle="modal" id="editmodalbtn" data-target="#editmodal"><i class="fas fa-edit">&nbsp;</i>Edit</a>
								<a class="btn btn-danger btn-sm" data-toggle="modal" id="removeModalbtn" href='#removeModal'><i class="fas fa-trash">&nbsp;</i>Delete</a>	
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>Trident</td>
								<td>Internet Explorer 4.0</td>
								<td>Win 95+</td>
								<td class="center"> 8</td>
								<td class="center">X</td>
								<td><span class="label label-danger">Delivered</span></td>
								<td><a class="btn btn-success btn-sm" data-toggle="modal" id="editmodalbtn" data-target="#editmodal " >Edit</a>
								<a class="btn btn-danger btn-sm" data-toggle="modal" id="removeModalbtn" href='#removeModal'>Delete</a>	
								</td>
							</tr>
						</tbody>
					</table>
		<?php 
		// /else manage order
		} else if($_GET['o'] == 'editcour') {
			// get order
			?>
<div class="success-messages"></div> <!--/success-messages-->

						<form class="form-horizontal" role="form">
							<div class="col-md-6">
								<div class="form-group">
									<label for="orderDate" class="col-sm-3 control-label">Requisition Date*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="orderDate" name="orderDate" disabled="true" value="<?php echo date("Y-m-d"); ?>"autocomplete="off" />
									</div>
								</div> <!--/form-group-->
								<div class="form-group">
									<label for="vat" class="col-sm-3 control-label">Requisition By*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="vat" name="vat"  />
									  <input type="hidden" class="form-control" id="vatValue" name="vatValue" />
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group">
									<label for="totalAmount" class="col-sm-3 control-label">Department Name*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="totalAmount" name="totalAmount" />
									  <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group">
									<label for="discount" class="col-sm-3 control-label">Company Name*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="discount" name="discount" onkeyup="discountFunc()" autocomplete="off" />
									</div>
								</div> <!--/form-group-->	
							</div> <!--/col-md-6-->
							<div class="col-md-6">
								<div class="form-group">
									<label for="grandTotal" class="col-sm-3 control-label">City Name*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="grandTotal" name="grandTotal"  />
									  <input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" />
									</div>
								</div> <!--/form-group-->	
								<div class="form-group">
									<label for="paid" class="col-sm-3 control-label">Dispatch Center*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" />
									</div>
								</div> <!--/form-group-->			  
								<div class="form-group">
									<label for="due" class="col-sm-3 control-label">Challan No.*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="due" name="due"  />
									  <input type="hidden" class="form-control" id="dueValue" name="dueValue" />
									</div>
								</div> <!--/form-group-->		
								<div class="form-group">
									<label for="due" class="col-sm-3 control-label">Invoice Value*</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="due" name="due"  />
									  <input type="hidden" class="form-control" id="dueValue" name="dueValue" />
									</div>
								</div> <!--/form-group-->		
							</div> <!--/col-md-6-->	
						</div>
						<div class="col-md-12">
							<table class="table text-center" id="particularTable">
								<thead>
									<tr>			  			
										<th style="width:8%;">#</th>
										<th>Item Code</th>
										<th>Description</th>	
										<th>Amount</th>	
										<th>Unit</th>
										<th>Quantity</th>
										<th>Option</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$arrayNumber = 0;
									for($x = 1; $x < 4; $x++) { ?>
										<tr>			  				
											<td>
												<div class="form-group">
												<input type="number" name="quantity[]" id="srno<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
												</div>
											</td>
											<td>			  					
												<input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off"  class="form-control" />			  					
												<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
											</td>
											<td>
												<div class="form-group">
												<input type="text" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
												</div>
											</td>
											<td>			  					
												<input type="number" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control"  />			  					
												<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
											</td>
											<td>			  					
												<input type="number" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control"  />			  					
												<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
											</td>
											<td>			  					
												<input type="number" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control"  />			  					
												<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
											</td>
											<td>

												<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
											</td>
										</tr>
									<?php
									$arrayNumber++;
									} // /for
									?>
								</tbody>		
							</table>
						</div><hr>
						<center>
							<button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>
							<button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
							<button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-remove"></i> Reset</button>
						</center>
					</form>

			<?php
		} // /get order else  ?>						
					</div>
				</div>
				</div>
<?php require_once 'includes/footer.php'; ?>
