<?php 	

require_once 'core.php';
$valid['success'] = array('success' => false, 'messages' => array());
//print_r($valid);
if($_POST) {	
	$courierId 				= $_POST['courierId']; 
	$disDate 				= date('Y-m-d', strtotime($_POST['disDate'])); 
  $mode 			= $_POST['mode'];
  $courierComp        = $_POST['courierComp'];
  $pod        = $_POST['pod'];
  $empId        = $_POST['empId'];
  $empName        = $_POST['empName'];
  $weight        = $_POST['weight'];
  $finalStatus 		= $_POST['finalStatus'];  


	$readyToUpdateCourierItem = true;
		$removeCourierSql = "DELETE FROM dispatch WHERE courier_id = {$courierId}";
		$connect->query($removeCourierSql);	
	 // /for remove dispatch details
		
	if($readyToUpdateCourierItem) {
		if($mode==1){
					// add into dispatch
				$dispatchCourierSql = "INSERT INTO dispatch (courier_id, dis_date, mode, cour_comp, pod, emp_id, emp_name, weight, courier_status) 
				VALUES ('$courierId', '$disDate', '$mode', '$courierComp', '$pod', '', '', '$weight', '$finalStatus')";
		} else {
				$dispatchCourierSql = "INSERT INTO dispatch (courier_id, dis_date, mode, cour_comp, pod, emp_id, emp_name, weight, courier_status) 
				VALUES ('$courierId', '$disDate', '$mode', '', '', '$empId', '$empName', '$weight', '$finalStatus')";	
		}
				
	}

	if($connect->query($dispatchCourierSql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

	 
$connect->close();

echo json_encode($valid);
 
} // /if $_POST