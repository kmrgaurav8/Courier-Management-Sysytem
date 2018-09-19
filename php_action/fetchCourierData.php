<?php 	

require_once 'core.php';

$courierId = $_POST['courierId'];

$valid = array('courier' => array(), 'courier_item' => array());
$sql = "SELECT dispatch.courier_id, dispatch.courier_status FROM  dispatch WHERE dispatch.courier_id = {$courierId}";

$result = $connect->query($sql);
$data = $result->fetch_row();
$valid['courier'] = $data;

$connect->close();

echo json_encode($valid);