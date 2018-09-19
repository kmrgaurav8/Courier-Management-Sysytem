<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
//print_r($valid);
if($_POST) {	
	$courierId = $_POST['courierId'];

  $reqDate 					= date('Y-m-d', strtotime($_POST['reqDate']));	
  $reqBy 					= $_POST['reqBy'];
  $deptName 				= $_POST['deptName'];
  $compName 				= $_POST['compName'];
  $cityName 				= $_POST['cityName'];
  $particularType     		= $_POST['particularType'];
  $dispatchCenter 			= $_POST['dispatchCenter'];
  $challan 					= $_POST['challan'];
  $invValue 				= $_POST['invValue'];
  $courierStatus			= $_POST['courierStatus'];

				
	$sql = "UPDATE courier SET req_date = '$reqDate', req_by = '$reqBy', dept_name = '$deptName', comp_name = '$compName', city_name = '$cityName', part_name = '$particularType', dispatch_center = '$dispatchCenter', challan_no = '$challan', inv_value = '$invValue', courier_status = '$courierStatus', Status = 1 WHERE courier_id = {$courierId}";	
	$connect->query($sql);
	
	$readyToUpdateCourierItem = true;
	// remove the courier item data from courier item table
	for($x = 0; $x < count($_POST['description']); $x++) {			
		$removeCourierSql = "DELETE FROM courier_item WHERE courier_id = {$courierId}";
		$connect->query($removeCourierSql);	
	} // /for quantity

	if($readyToUpdateCourierItem) {
			// insert the courier item data 
		for($x = 0; $x < count($_POST['description']); $x++) {			
		
					// add into courier_item
				$courierItemSql = "INSERT INTO courier_item (courier_id, item_id, item_code, amount, unit, quantity, courier_item_status) 
				VALUES ({$courierId}, '".$_POST['description'][$x]."', '".$_POST['itemcodeValue'][$x]."', '".$_POST['amount'][$x]."', '".$_POST['unit'][$x]."', '".$_POST['quantity'][$x]."', 1)";

				$connect->query($courierItemSql);	
					
			} // while	
		} // /for quantity

	

	$valid['success'] = true;
	$valid['messages'] = "Successfully Updated";		
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);