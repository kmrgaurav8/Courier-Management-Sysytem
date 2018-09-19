<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$courierId 					= $_POST['courierId'];
  $finalStatus 		= $_POST['finalStatus'];  


	$sql = "UPDATE dispatch SET  courier_status = '$finalStatus' WHERE courier_id = {$courierId}";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating courier info";
	}

	 
$connect->close();

echo json_encode($valid);
 
} // /if $_POST