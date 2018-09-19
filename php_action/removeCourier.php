<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$courierId = $_POST['courierId'];

if($courierId) { 

 $sql = "UPDATE courier SET status = 2 WHERE courier_id = {$courierId}";

 $courierItem = "UPDATE courier_item SET courier_item_status = 2 WHERE  courier_id = {$courierId}";

 if($connect->query($sql) === TRUE && $connect->query($courierItem) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the Courier";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST