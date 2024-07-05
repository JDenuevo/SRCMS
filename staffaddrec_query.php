<?php
session_start();
include "db_conn.php";
$_SESSION['msg'] = "";
if(isset($_POST['save'])){
	$per_firstname = $_POST['per_firstname'];
	$per_middlename = $_POST['per_middlename'];
	$per_lastname = $_POST['per_lastname'];
	$per_suffix = $_POST['per_suffix'];
	$per_gender = $_POST['per_gender'];
	$per_status = $_POST['per_status'];
	$per_address = $_POST['per_address'];
	$per_date_of_birth  = $_POST['per_date_of_birth'];
	$per_place_of_birth = $_POST['per_place_of_birth'];
	$per_tin_no = $_POST['per_tin_no'];
	$per_gsis_no = $_POST['per_gsis_no'];
	$per_email = $_POST['per_email'];
	$per_contact_no = $_POST['per_contact_no'];
	$bs_name = $_POST['bs_name'];
	$bs_year = $_POST['bs_year'];
	$bs_school = $_POST['bs_school'];
	$ms_name = $_POST['ms_name'];
	$ms_year = $_POST['ms_year'];
	$ms_school = $_POST['ms_school'];
	$dr_name = $_POST['dr_name'];
	$dr_year = $_POST['dr_year'];
	$dr_school = $_POST['dr_school'];

	$sql = "SELECT * FROM srcms_tbl_personnel WHERE per_firstname='$per_firstname' AND per_middlename = '$per_middlename' AND per_lastname = '$per_lastname'";
	if($rs=$conn->query($sql)){
		if($rs->num_rows>0){
		$_SESSION['msg'] = "THIS RECORD ALREADY EXISTED!";	
		header("Location: staffaddrec.php");	
	}else {
		$sql2 = "INSERT INTO srcms_tbl_personnel (per_firstname, per_middlename, per_lastname, per_suffix, per_gender, per_status, per_address, per_date_of_birth, per_place_of_birth, per_tin_no, per_gsis_bp_no, per_email, per_contact_no, bs_name, bs_year, bs_school, ms_name, ms_year, ms_school, dr_name, dr_year, dr_school) 
		VALUES ('$per_firstname', '$per_middlename', '$per_lastname','$per_suffix', '$per_gender','$per_status','$per_address', '$per_date_of_birth', '$per_place_of_birth', '$per_tin_no', '$per_gsis_no', '$per_email', '$per_contact_no', '$bs_name', '$bs_year', '$bs_school', '$ms_name', '$ms_year', '$ms_school', '$dr_name', '$dr_year', '$dr_school')";
		if($conn->query($sql2)){
		$_SESSION['msg']= "THE RECORD SAVED SUCCESSFULLY!";
		header("Location: staffaddrec.php");
	   }else {
		$_SESSION['msg']= "THE RECORD WAS NOT BEEN SAVED!";
		header("Location: staffaddrec.php");
	   }
	}
}
}
	
?>