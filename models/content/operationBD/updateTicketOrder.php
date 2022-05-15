<?php
require_once('../../../config/database.php');

$_POST = json_decode(file_get_contents('php://input'), true);


$id = $_POST['id'];


$sql = "UPDATE ticket_order SET statut=1 WHERE id=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id]);

 
 
?>