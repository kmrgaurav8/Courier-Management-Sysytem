<?php 
$pageTitle="Report :: Courier Managemenet System";
require_once('includes/header.php'); ?>
    	<div class="row">
			<?php require_once 'includes/sidebar.php'; ?>
		<div class="col-md-10">
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fas fa-clipboard-list"></i>	Courier Report</div>
					<ol class="breadcrumb" style="float: right;">
						<li><a href="index.php">Home</a></li>
						<li>Report</li>
						<li class="active">
							Courier Report
						</li>
					</ol>
				</div>
  				<div class="panel-body">
				<form class="form-horizontal" action="php_action/getOrderReport.php" method="post" id="getOrderReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-4">
				      <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-4">
				      <input type="date" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-4">
				      <button type="submit" class="btn btn-warning" id="generateReportBtn"> <i class="fa fa-check-circle">&nbsp;</i> Generate Report</button>
				      <button type="submit" class="btn btn-primary" id="generateReportBtn"> <i class="fa fa-download">&nbsp;</i> Download Report</button>
				    </div>
				  </div>
				</form><br>
				<div id="reportHint"><p>
		            <div class="widget-content" style="overflow: scroll;">
		              <table class="table table-striped table-bordered text-center">
		                <thead>
		                  <tr>
		                    <th> S.No </th>
		                    <th> Courier Id</th>
		                    <th> POD No.</th>
		                    <th> Item Code</th>
		                    <th> Description</th>
		                    <th> City</th>
		                    <th> Quantity</th>
		                    <th> Status</th>
		                    <th> Received By(Emp_ID)</th>
		                    <th> Received By(Emp_Name)</th>
		                  </tr>
		               </thead>
                       <tbody>

<?php
if(isset($_POST['report']))
{
$startdate = $_POST['startdate'];
$enddate =  $_POST['enddate'];

$sql = "select * from stock,issue where stock.id = issue.stock_id and  issue.issue_date between '$startdate' and '$enddate'";
$c=1;
$result = mysqli_query($conn,$sql) ;

if(mysqli_num_rows($result) >0)
{

while ($datar = mysqli_fetch_array($result))
{
?> 


<tr>
<td> <?php echo $c++; ?> </td>
<td> <?php echo $datar['medicinename']; ?> </td>
<td> <?php echo $datar['category']; ?> </td>
<td> <?php echo $datar['brand']; ?> </td>
<td> <?php echo $datar['purpose']; ?> </td>
<td> <?php echo $datar['receiviedin']; ?> </td>
<td> <?php echo $datar['date_expiry']; ?> </td>
<td> <?php echo $datar['empid']; ?> </td>
<td> <?php echo $datar['empname']; ?> </td>
<td> <?php echo $datar['issued_quantity']; ?> </td>
<td> <?php echo $datar['issue_date']; ?> </td>
</tr>

<?php
}
return;
}
else
{
    echo("Error description: " . mysqli_error($conn));
}


}
?>


                       </tbody>
                   </table>
               </div>
              </p></div>


  				</div>
  			</div>

		 </div>
	</div>
<?php require_once 'includes/footer.php'; ?>
