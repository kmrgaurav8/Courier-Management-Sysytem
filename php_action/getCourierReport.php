<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT c.req_date, d.dis_date, c.req_by, c.dept_name, c.dispatch_center, c.challan_no, (SELECT count(*) FROM courier_item WHERE courier_item.courier_id = c.courier_id)'Total Item', d.mode, d.cour_comp, d.pod, d.weight, d.courier_status FROM courier c, dispatch d WHERE c.courier_id = d.courier_id and d.mode=1 and req_date >= '$start_date' and req_date <= '$end_date' union SELECT c.req_date, d.dis_date, c.req_by, c.dept_name, c.dispatch_center, c.challan_no, (SELECT count(*) FROM courier_item WHERE courier_item.courier_id = c.courier_id), d.mode, d.emp_name, d.emp_id, d.weight, d.courier_status FROM courier c, dispatch d WHERE c.courier_id = d.courier_id and d.mode=2 and req_date >= '$start_date' and req_date <= '$end_date' ORDER BY 'req_date' ASC";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			
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
		</tr>

		<tr>';
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
				$courierStatus = "Dispatched";
			}else if($result['courier_status'] == 2){
			   $courierStatus = "In-Transit";
			}else {
				$courierStatus = "Delivered";
			}
			
		$table .= '<tr>
				<td><center>'.$result['req_date'].'</center></td>
				<td><center>'.$result['dis_date'].'</center></td>
				<td><center>'.$result['req_by'].'</center></td>
				<td><center>'.$result['dept_name'].'</center></td>
				<td><center>'.$result['dispatch_center'].'</center></td>
				<td><center>'.$result['challan_no'].'</center></td>
				<td><center>'.$result['Total Item'].'</center></td>
				<td><center>'.$by.'</center></td>
				<td><center>'.$courierService.'</center></td>
				<td><center>'.$result['pod'].'</center></td>
				<td><center>'.$result['weight'].'</center></td>
				<td><center>'.$courierStatus.'</center></td>
			</tr>';	
		}
		$table .= '
		</tr>

	</table>
	';	

	echo $table;

}

?>