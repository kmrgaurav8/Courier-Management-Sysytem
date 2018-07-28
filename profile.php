<?php 
$pageTitle="User Profile :: Courier Managemenet System";
require_once('includes/header.php'); ?>

    	<div class="row">
			<?php require_once 'includes/sidebar.php'; ?>
			  <div class="col-md-10">
				<div class="content-box-large">
					<div class="panel-heading">
						<div class="panel-title"><i class="fas fa-user-tie">&nbsp;</i>User Profile</div>

					</div>
					<div class="panel-body">
						<form action="php_action/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
							<fieldset>
								<legend>Change Username</legend>

								<div class="changeUsenrameMessages"></div>			

								<div class="form-group">
								<label for="username" class="col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" id="username" name="username" placeholder="Usename" value=""/>
								</div>
							  </div>

							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="hidden" name="user_id" id="user_id" value="" /> 
								  <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
								</div>
							  </div>
							</fieldset>
						</form>

						<form action="php_action/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
							<fieldset>
								<legend>Change Password</legend>

								<div class="changePasswordMessages"></div>

								<div class="form-group">
								<label for="password" class="col-sm-2 control-label">Current Password</label>
								<div class="col-sm-10">
								  <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
								</div>
							  </div>

							  <div class="form-group">
								<label for="npassword" class="col-sm-2 control-label">New password</label>
								<div class="col-sm-10">
								  <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
								</div>
							  </div>

							  <div class="form-group">
								<label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
								<div class="col-sm-10">
								  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
								</div>
							  </div>

							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<input type="hidden" name="user_id" id="user_id" value="" /> 
								  <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
								  
								</div>
							  </div>


							</fieldset>
						</form>
					</div> <!-- /panel-body -->		
				</div>
			</div>
		</div>
<?php require_once 'includes/footer.php'; ?>
