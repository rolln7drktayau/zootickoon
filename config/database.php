<?php
$server = 'rolandtest3-server.mysql.database.azure.com';
$username = 'jvdwzkzpuz';
$password = 'HNYO434SB660244Z$';
$database = 'zootickoon';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
?>