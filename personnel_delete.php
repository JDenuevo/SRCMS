<?php
session_start();
include('db_conn.php');

if(isset($_POST['delete'])) {
	$per_id = $_POST['per_id'];
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
	$cttime = $_POST['cttime'];
	$ctdue = $_POST['ctdue'];
	$position = $_POST['position'];
	$department = $_POST['department'];
	$colleges = $_POST['colleges'];
	$salary = $_POST['salary'];
	$status = $_POST['status'];
	$campus  = $_POST['campus'];
	$semester  = $_POST['semester'];
	$schoolyear  = $_POST['schoolyear'];
	$cont_id = $_POST['cont_id'];

	$sql1 = "INSERT INTO srcms_tbl_personnel_rb (per_id, per_firstname, per_middlename, per_lastname, per_suffix, per_gender, per_status, per_address, per_date_of_birth, per_place_of_birth, per_tin_no, per_gsis_bp_no, per_email, per_contact_no, bs_name, bs_year, bs_school, ms_name, ms_year, ms_school, dr_name, dr_year, dr_school) 
    VALUES ('$per_id','$per_firstname', '$per_middlename', '$per_lastname','$per_suffix', '$per_gender','$per_status','$per_address', '$per_date_of_birth', '$per_place_of_birth', '$per_tin_no', '$per_gsis_no', '$per_email', '$per_contact_no', '$bs_name', '$bs_year', '$bs_school', '$ms_name', '$ms_year', '$ms_school', '$dr_name', '$dr_year', '$dr_school')";
     if($conn->query($sql1)){
		$sql2 = "INSERT INTO srcms_contract_rb (cont_id, per_id, cttime, ctdue, position, department, colleges, status, salary, campus, semester, schoolyear) SELECT cont_id, per_id, cttime, ctdue, position, department, colleges, status, salary, campus, semester, schoolyear FROM srcms_contract WHERE per_id = '$per_id' ";
		if($conn->query($sql2)){
		$sql = "DELETE FROM srcms_tbl_personnel WHERE per_id = '$per_id'";
		if($conn->query($sql)){
		$sql3 = "DELETE FROM srcms_contract WHERE per_id = '$per_id'";
		$conn->query($sql3);
	header("Location: admin_proflist.php?Record_Deleted");
				}   
			}
		}
}else{
    header("Location: admin_proflist.php?Record_NOT_Deleted");
     }
?>