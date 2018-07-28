<?php 
$pageTitle="Configuration :: Courier Managemenet System";
require_once('includes/header.php'); ?>
    	<div class="row">
			<?php require_once 'includes/sidebar.php'; ?>

		  <div class="col-md-10">
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="glyphicon glyphicon-list"></i> Courier Statistics</div>
					<div style="float: right;">
			           <a  class="btn btn-success " href="add_courier.php">Create New Courier</a>
			        </div>

				</div>
  				<div class="panel-body">
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
								<td>X</td>
								<td><span class="label label-success">In Transit</span></td>
								<td><a class="btn btn-success btn-sm" data-toggle="modal" id="editmodalbtn" data-target="#editmodal " ><i class="fas fa-edit">&nbsp;</i>Edit</a>
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
  				</div>

				<div class="modal fade" id="editmodal">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
				            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              	<span aria-hidden="true">&times;</span>
				                </button>
				                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Edit Category-Master</h4>
				            </div>
				            <div class="modal-body">
				                <form action="inside/updatecategory.php" method="POST" role="form" name="updatemasterbranch">

				                    <div class="form-group">
				                        <label for="">Category Name
				                        </label>
				                        <input type="hidden" class="form-control" id="id" name="id" value="">
				                        <input type="text" class="form-control" name="editcategory" value="" required>
				                    </div>
				                    
				                </form>
				            </div>
				            <div class="modal-footer">
				                <button type="submit" class="btn btn-primary" name="updatecategory">Submit</button>
				                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				            </div>
				        </div>
				    </div>
				</div>
				<div class="modal fade" tabindex="-1" role="dialog" id="removeModal">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Courier</h4>
				      </div>
				      <div class="modal-body">
				        <p>Do you really want to remove ?</p>
				      </div>
				      <div class="modal-footer">
				                <button type="submit" class="btn btn-primary" name="updatecategory">Submit</button>
				                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				            </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->


			</div>
		</div>
	</div>
<?php require_once 'includes/footer.php'; ?>
