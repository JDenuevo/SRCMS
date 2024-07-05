<?php
$server="localhost";
$user="root";
$pass="";
$dbname="srcms";
$conn= new mysqli($server,$user,$pass,$dbname);
if($conn->connect_error){
    die("Connection Failed:". $conn->connect_error);
}
?>