<?php
session_start();
include('db_conn.php');
if(isset($_POST['edit'])) {
    $cont_id = $_POST['cont_id'];
	$per_id = $_POST['per_id'];
	$cttime = $_POST['cttime'];
	$ctdue = $_POST['ctdue'];
	$position = $_POST['position'];
	$jobtitle = $_POST['jobtitle'];
	$department = $_POST['department'];
	$colleges = $_POST['colleges'];
	$status = $_POST['status'];
	$salary = $_POST['salary'];
	$campus  = $_POST['campus'];
	$semester = $_POST['semester'];
	$schoolyear = $_POST['schoolyear'];


	$query = "UPDATE srcms_contract SET per_id='$per_id', cttime='$cttime', ctdue='$ctdue', position='$position', department='$department', colleges='$colleges', status='$status', salary='$salary', campus='$campus', semester='$semester', schoolyear='$schoolyear' WHERE cont_id = '$cont_id'";
	$conn->query($query);

	header("location: personnel_contract.php?per_id=$per_id");

}
?>