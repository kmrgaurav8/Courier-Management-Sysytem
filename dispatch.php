<?php 
$pageTitle="Transfer :: Courier Managemenet System";
require_once('includes/header.php'); ?>
    	<div class="row">
			<?php require_once 'includes/sidebar.php'; ?>

		  		  <div class="col-md-10">
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fas fa-truck-moving">&nbsp;</i>Dispatch Courier</div>
					<div style="float: right;">
			           <a  class="btn btn-success " href="courier.php?o=add"><i class="fas fa-plus-circle">&nbsp;</i>Create New Courier</a>
			        </div>

				</div>
  				<div class="panel-body table-responsive">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-bordered " id="example">
						<thead>
							<tr>
								<th>Req. Date</th>
								<th>Req. By</th>
								<th>Courier Id</th>
								<th>Deptartment</th>
								<th>Company Name</th>
								<th>Disptach Center</th>
								<th>Challan No.</th>
								<th>Disptach Center</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr class="odd gradeX">
								<td>Trident</td>
								<td>Internet
									 Explorer 4.0</td>
								<td>Win 95+</td>
								<td class="center"> 4</td>
								<td class="center">X</td>
								<td class="center">X</td>
								<td class="center">X</td>
								<td class="center">X</td>
								<td class="center">X</td>
							</tr>
						</tbody>
					</table>
  				</div>
  			</div>

		 </div>
	</div>
<?php require_once 'includes/footer.php'; ?>
