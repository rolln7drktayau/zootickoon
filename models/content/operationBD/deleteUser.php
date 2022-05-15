<?php
require_once('../../../config/database.php');
 

$_POST = json_decode(file_get_contents('php://input'), true);

$id = $_POST['id']; 
print($id);

$sql = "delete from ticket_order where user_id=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id]);

$sql = "delete from shop_order where user_id=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id]);

$sql = "delete from user where id=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id]);

?>