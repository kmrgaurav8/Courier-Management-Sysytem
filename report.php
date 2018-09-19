<?php 
$pageTitle="Report :: Courier Managemenet System";
require_once 'php_action/db_connect.php';
require_once('includes/header.php'); ?>
<script>
function valid()
{
if(document.getElementById('startDate').value=="")
{
alert("Please Enter Start Date");
//document.getElementById("todate").focus();
return false;
}
else if(document.getElementById('endDate').value=="")
{
alert("Please Enter End Date");
//document.getElementById("fromdate").focus();
return false;
}
else
{
return true;
}
}
</script>

<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>
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
				<form class="form-horizontal"  method="post" enctype="multipart/form-data" id="getCourierReportForm">
				<div class="row">
					<div class="col-md-5">
					  <div class="form-group">
						<label for="startDate" class="col-sm-3 control-label">Start Date</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
						</div>
					  </div>
					</div>
					<div class="col-md-5">
					  <div class="form-group">
						<label for="endDate" class="col-sm-3 control-label">End Date</label>
						<div class="col-sm-9">
						  <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
						</div>
					  </div>
					</div>
					<div class="col-md-2">
					  <div class="form-group">
						<div class=" col-sm-4">
						  <button type="submit" class="btn btn-warning" name="show" > <i class="fa fa-check-circle">&nbsp;</i> Generate Report</button>
						</div>
					  </div>
					</div>
				</div>
				</form><br><br>
						<?php 
		if(isset($_REQUEST['show']))
		{
		if(!empty($_REQUEST['startDate']) && !empty($_REQUEST['endDate']))
		{
	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");
		
	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
				
		}
		?>
		
		<!-- Second content After Submit Button-->
        <section class="content">
                       
					  
					   
<table  class='table table-bordered table-striped display' id='testTable'>
<?php                   
if(!empty($_REQUEST['startDate']) && !empty($_REQUEST['startDate'])  )
{
	$sql = "SELECT c.req_date, d.dis_date, c.req_by, c.dept_name, c.dispatch_center, c.challan_no, (SELECT count(*) FROM courier_item WHERE courier_item.courier_id = c.courier_id)'Total Item', d.mode, d.cour_comp, d.pod, d.weight, d.courier_status FROM courier c, dispatch d WHERE c.courier_id = d.courier_id and d.mode=1 and req_date >= '$start_date' and req_date <= '$end_date' union SELECT c.req_date, d.dis_date, c.req_by, c.dept_name, c.dispatch_center, c.challan_no, (SELECT count(*) FROM courier_item WHERE courier_item.courier_id = c.courier_id), d.mode, d.emp_name, d.emp_id, d.weight, d.courier_status FROM courier c, dispatch d WHERE c.courier_id = d.courier_id and d.mode=2 and req_date >= '$start_date' and req_date <= '$end_date' ORDER BY req_date ASC ";
}
$query = $connect->query($sql); //run the query


if(mysqli_num_rows($query)==0)
{
echo '<tr><th colspan="18" style="text-align:center;font-size:20px;padding:18px;" >' .  'Report from '.$start_date.' To '.$end_date.' </th></tr><tr><th colspan="18" style="text-align:center;font-size:20px;padding:18px;" > No Data found for the selected date </th></tr>';	
}
else
{
?>
<tr>
<th colspan="11" style="text-align:center;font-size:20px;padding:18px;" >  Report from <?php echo $start_date." To ".$end_date; ?> </th>
<td colspan="1" style="text-align:center;">
	<button  type="button" class="btn btn-danger" onClick="tableToExcel('testTable', 'Courier Datewise Report')"   title="Export to Excel"><i class="fa fa-download">&nbsp;</i>Export</button>
</td>
</tr>
<?php

//	echo "select * from expense where  EXTRACT(MONTH FROM date)='$_POST[mon]'";
echo "<tr>
			
			<th>Req Date</th>
			<th>Dispatch Date</th>
			<th>Req By</th>
			<th>Department</th>
			<th>Dispatch Center</th>
			<th>Challan No.</th>
			<th>Total No. of Item</th>
			<th>Mode of Dispatch</th>
			<th>Courier Comp / Emp Name</th>
			<th>POD / Emp ID</th>
			<th>Weight</th>
			<th>Final Status</th>
		</tr>";
		while ($result = $query->fetch_assoc()) {
			if($result['mode']=='1') { $by="By Courier"; } else { $by="By Hand"; }
			
			if($result['cour_comp'] == 1){
				$courierService = "First Flight";
			}else if($result['cour_comp'] == 2){
			   $courierService = "Blue Dart";
			}else if($result['cour_comp'] == 3){
				$courierService = "DTDC";
			}else {
				$courierService = $result['cour_comp'];
			}	
										
			if($result['courier_status'] == 1){
				$courierStatus = "<label class='label label-warning'>Dispatched</label>";
			}else if($result['courier_status'] == 2){
			   $courierStatus = "<label class='label label-info'>In-Transit</label>";
			}else {
				$courierStatus = "<label class='label label-success'>Delivered</label>";
			}
?>
					<tr class="center">
						<td>
							<?php echo $result['req_date'];  ?>
						</td>
						<td>
							<?php echo $result['dis_date'];  ?>
						</td>
						<td> 
							<?php echo $result['req_by'];  ?>
						</td>
						<td> 
							<?php echo $result['dept_name'];  ?>
						</td>
						<td> 
							<?php echo $result['dispatch_center'];  ?>
						</td>
						<td> 
							<?php echo $result['challan_no'];  ?>
						</td>
						<td>
							<?php echo $result['Total Item'];  ?>
						</td>
						<td>
							<?php echo $by;  ?>
						</td>
						<td>
							<?php echo $courierService;  ?>
						</td>
						<td>
							<?php echo $result['pod'];  ?>
						</td>
						<td>
							<?php echo $result['weight'];  ?>
						</td>
						<td>
							<?php echo $courierStatus;  ?>
						</td>
					</tr>
					<?php } ?>
					<?php } ?>
					</table>				
					</section><!-- /.content -->
					<?php } ?>		

				</div>
			</div>
		</div>
	</div>
<?php require_once 'includes/footer.php'; ?>
