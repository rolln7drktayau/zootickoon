<?php
require_once('../../../config/database.php');


$id = $_POST['id'];

print($id);

$sql = "UPDATE issue SET statut=1 WHERE id=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id]);



 

?>