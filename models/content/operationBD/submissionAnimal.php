<?php
require_once('../../config/database.php');



$name = $_POST['name']; 
$description = $_POST['description']; 
$photo = $_POST['photo'];
$categories = $_POST['categories'];

print($name. "\n");
print($description. "\n");
print($photo. "\n");
print($categories. "\n");


// $sql = "UPDATE user SET firstname=?, lastname=?, email=? WHERE id=?";
// $stmt= $conn->prepare($sql);
// $stmt->execute([$firstname,  $lastname, $email, $id]);

 
// // echo json_encode($data);
// exit;
 
?>