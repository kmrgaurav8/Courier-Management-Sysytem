<?php 	

require_once 'core.php';

$itemId = $_POST['itemId'];

$sql = "SELECT item_id, item_code, description FROM item_master WHERE item_id = $itemId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);