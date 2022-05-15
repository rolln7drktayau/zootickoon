<?php
require_once('../../../config/database.php');

$_POST = json_decode(file_get_contents('php://input'), true);

$name = $_POST['name']; 
$categories = $_POST['categories']; 
$imgURL = $_POST['imgURL'];
$id = $_POST['id'];


$sql = "UPDATE animal SET name=?, category_id=?, imgURL=? WHERE id=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$name,  $categories, $imgURL, $id]);

 
// // echo json_encode($data);
// exit;
 
?>