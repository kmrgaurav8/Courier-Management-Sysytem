<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'courier_id' => '');
//print_r($valid);
if($_POST) {	

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

  /*$itemcode 				= $_POST['itemcode'];
  $desc 					= $_POST['desc'];
  $amount 					= $_POST['amount'];
  $unit 					= $_POST['unit'];
  $quantity 				= $_POST['quantity'];*/

				
	$sql = "INSERT INTO courier (req_date, req_by, dept_name, comp_name , city_name, part_name, dispatch_center, challan_no, inv_value, courier_status, Status) VALUES ('$reqDate', '$reqBy', '$deptName', '$compName', '$cityName', '$particularType', '$dispatchCenter', '$challan', '$invValue', '$courierStatus', 1)";
	
	$courier_id;
	$courierStatus = false;
	if($connect->query($sql) === true) {
		$courier_id = $connect->insert_id;
		$valid['courier_id'] = $courier_id;	

		$courierStatus = true;
	}
		//echo $_POST['description'];

	$courierItemStatus = false;
	for($x = 0; $x < count($_POST['description']); $x++) 
	{			

	// add into courier_item
	$courierItemSql = "INSERT INTO courier_item (courier_id, item_id, item_code, amount, unit, quantity, courier_item_status) 
	VALUES ('$courier_id', '".$_POST['description'][$x]."', '".$_POST['itemcodeValue'][$x]."', '".$_POST['amount'][$x]."', '".$_POST['unit'][$x]."', '".$_POST['quantity'][$x]."', 1)";

	$connect->query($courierItemSql);		
				if($x == count($_POST['description'])) {
					$courierItemStatus = true;
				}
	}				

	$valid['success'] = true;
	$valid['messages'] = "Successfully Added";		
	
	$connect->close();

	echo json_encode($valid);

}
