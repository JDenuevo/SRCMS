<?php
session_start();
include "db_conn.php";
if(isset($_POST['addcontract'])){
	$per_id = $_POST['per_id'];
	$cttime = $_POST['cttime'];
	$ctdue = $_POST['ctdue'];
	$position = $_POST['position'];
	$department = $_POST['department'];
	$colleges = $_POST['colleges'];
	$status = $_POST['status'];
	$salary = $_POST['salary'];
	$campus  = $_POST['campus'];
	$semester = $_POST['semester'];
	$schoolyear = $_POST['schoolyear'];


    $sql1 = "INSERT INTO srcms_contract SET per_id='$per_id', cttime='$cttime', ctdue='$ctdue', position='$position', department='$department', colleges='$colleges', status='$status',salary='$salary', campus='$campus', semester='$semester', schoolyear='$schoolyear' ";
    if($conn->query($sql1)){
    	$sql12 = "UPDATE srcms_tbl_personnel SET position='$position', department='$department', colleges='$colleges' WHERE per_id = '$per_id'";
		$conn->query($sql12);
		header("location: personnel_contract.php?per_id=$per_id");

	}
}
?>