<?php 
$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "2512b2-php";

$connection = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if(!$connection){
    die("Failed to connect");  
}
?>


