<?php
require_once('../../../config/database.php');
 

$_POST = json_decode(file_get_contents('php://input'), true);

$categories = $_POST['categories']; 
$name = $_POST['name']; 
$description = $_POST['description']; 
$imgURL = $_POST['imgURL']; 



$sql = "INSERT INTO animal (name, category_id, imgURL) VALUES (? , ? , ?)";
$stmt= $conn->prepare($sql);

$stmt->execute([$name,  $categories, $imgURL]);


?>