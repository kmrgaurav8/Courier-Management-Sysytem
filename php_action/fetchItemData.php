<?php 	

require_once 'core.php';

$sql = "SELECT item_id, description FROM item_master";
$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);