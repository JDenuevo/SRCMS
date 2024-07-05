<?php
session_start();
include('db_conn.php');
if(isset($_POST['update'])) {
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





	$query = "UPDATE srcms_tbl_personnel SET per_firstname = '$per_firstname', per_middlename = '$per_middlename', per_lastname = '$per_lastname', per_suffix = '$per_suffix',
	per_gender = '$per_gender', per_status = '$per_status', per_address = '$per_address', per_date_of_birth = '$per_date_of_birth', per_place_of_birth = '$per_place_of_birth', 
	per_tin_no = '$per_tin_no', per_gsis_bp_no= '$per_gsis_no',  per_email ='$per_email', per_contact_no = '$per_contact_no', 
	bs_name = '$bs_name', bs_year = '$bs_year', bs_school = '$bs_school', ms_name = '$ms_name', 
	ms_year = '$ms_year', ms_school = '$ms_school', dr_name = '$dr_name', dr_year = '$dr_year', dr_school = '$dr_school' WHERE per_id = '$per_id'";
	$conn->query($query);

	header("location: admin_proflist.php?update=Record_Updated_Successfully");

}
?>