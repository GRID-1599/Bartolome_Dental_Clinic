<?php

$host = "localhost";
$database = "dentalclinic_system";
$con = mysqli_connect($host,'root','',$database);

if($con->connect_error){
	echo $con->connect_error;
}
?>