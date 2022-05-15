<?php
require_once('../../../config/database.php');
/*
* Write your logic to manage the data
* like storing data in database
*/

 
// POST Data

$_POST = json_decode(file_get_contents('php://input'), true);

$id = $_POST['id']; 
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname'];
$email = $_POST['email'];

$sql = "UPDATE user SET firstname=?, lastname=?, email=? WHERE id=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$firstname,  $lastname, $email, $id]);

 
// // echo json_encode($data);
// exit;
 
?>