<?php

$dbServername = "localhost";
$dbUsername ="root";
$dbPassword ="root";
$dbName ="universityschema";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}

echo "connected sucessfully";
?>

