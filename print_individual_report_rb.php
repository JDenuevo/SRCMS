<?php 
session_start();
include ("db_conn.php");
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {
	if($_SESSION['user_type'] == "Administrator"){

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Deleted Print Record | SR&CMS</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<!-- Print Record CSS -->
<link rel="stylesheet" type="text/css" href="css/admin_print_report.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>

<!--Navigation-->
<nav class="navbar navbar-expand-lg text-uppercase bg-success py-3 fixed-top" id="mainNav">
    <div class="container">
		<h1 class="navbar-brand text-white fw-bold fs-3 p-2">Hello, <span class = "fs-3"><?php echo $_SESSION['user_name']; ?></span></h1>
        <button class="navbar-toggler text-uppercase text-white fw-bold fs-3 rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <img src = "photos/menulogo.png" class = "menuicon">
            Menu
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto fw-bold">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-1 link-light rounded" href="main_admin.php"><img class = "img-fluid" id = "navicons" src = "photos/homepg.png"> Home</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-1 link-light rounded" href="admin_proflist.php"><img class = "img-fluid" id = "navicons" src = "photos/proflist.png"> Professor's Record</a></li>
	
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle py-3 px-0 px-lg-1 link-light rounded" href="HAHAHA" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class = "img-fluid" id = "navicons" src = "photos/breakd.png"> Breakdown
                  </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li class="nav-item mx-0 mx-lg-1"><a class="dropdown-item nav-link py-3 px-0 px-lg-1 link-light rounded"  href="adminpositions.php">Positions</a></li>
                  <li class="nav-item mx-0 mx-lg-1"><a class="dropdown-item nav-link py-3 px-0 px-lg-1 link-light rounded" href="admindepartments.php">Departments</a></li>
                  <li class="nav-item mx-0 mx-lg-1"><a class="dropdown-item nav-link py-3 px-0 px-lg-1 link-light rounded" href="admincolleges.php">Colleges</a></li>
                </ul>
              </li>
              <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-1 link-light rounded" href="adminmanageacc.php"><img class = "img-fluid" id = "navicons" src = "photos/manage.png"> Manage Accounts</a></li>
              <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-1 link-light rounded" href="logout.php"><img class = "img-fluid" id = "navicons" src = "photos/admin.png"> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<br><br><br><br><br>

    <a href="individual_report_rb.php">
        <button class = "btn btn-secondary ms-2" id = "btnback" type="button">
            <img class = "img-fluid" id = "navicons" src = "photos/back.png">
            BACK
        </button>
    </a>

    <div onload="refresh();" class = "float-end">
          <button onclick="printContent('print')" id = "hit" class="btnprint btn btn-primary me-2">
          <img class = "img-fluid" id = "navicons" src = "photos/printrec.png">
          PRINT SERVICE RECORD
          </button>
    </div>
	<br><br>
<div id="print">
	<br>
	<div id="print-logo">
		<div id="left"><img src="photos/ucclogo.png"></div>
			<div id="center">
				<h2 class = "fw-bold fs-3">UNIVERSITY OF CALOOCAN CITY</h2>
				<label class = "fw-bold fs-5">Biglang Awa St. Edsa, Caloocan City</label><br> <br>
				<h2 class = "fw-bold fs-3">SERVICE RECORD</h2>
			</div>
		<div id="right"><div class="box"></div></div>
	</div>
	
	<?php
	$sql = "SELECT * FROM srcms_tbl_personnel_rb WHERE per_id={$_GET['per_id']}";
	if($rs=$conn->query($sql)){
		while ($row=$rs->fetch_assoc()) {
		$per_id = $row['per_id'];
	?>


<section class = "p-2">
	<h2 class = "fw-bold fs-3 text-center">PERSONNEL REPORT</h2>
        <div class="table-responsive">
			<table id = "example" class = "table m-auto text-dark">
				<tr>
					<td colspan = "3" class = "p-2 fw-bold fs-4 border-top">I. Personal Information</td>	
				</tr>
				<tr>
					<td><label><?php echo $row['per_lastname']." ".$row['per_suffix']; ?></label>
					<br>
					Last Name		
					</td>
					<td> <label><?php echo $row['per_firstname']; ?></label>
					<br>
					First Name
					</td>
					<td> <label><?php echo $row['per_middlename']; ?></label>
					<br>
					Middle Name
					</td>
				</tr>
		
				<tr>
					<td><label><?php echo $row['per_address']; ?></label>
					<br>
					Address
					</td>
					<td><label><?php echo $row['per_date_of_birth']; ?></label>
					<br>
					Birthday		
					</td>
					<td><label><?php echo $row['per_place_of_birth']; ?></label>
					<br>
					Place of Birth
					</td>
				</tr>
		
				<tr>
					<td><label><?php echo $row['per_contact_no']; ?></label>
					<br>
					Tel No. / Contact No.		
					</td>
					<td><label><?php echo $row['per_gender']; ?></label>
					<br>
					Sex		
					</td>
					<td><label><?php echo $row['per_status']; ?></label>
					<br>
					Civil Status		
					</td>
				</tr>
	
				<tr>
					<td><label><?php echo $row['per_email']; ?></label>
					<br>
					Email Address		
					</td>
					<td><label><?php echo $row['per_gsis_bp_no']; ?></label>
					<br>
					GSIS/SSS No.		
					</td>
					<td><label><?php echo $row['per_tin_no']; ?></label>
					<br>
					TIN No.		
					</td>
				</tr>
			</table>
			<br>
			<table id = "example" class = "table m-auto text-dark">
				<tr>
					<td colspan = "3" class = "p-2 fw-bold fs-4">II. Educational Background</td>	
				</tr>

				<tr>
					<td><label><?php echo $row['bs_school']; ?></label>
					<br>
					School	
					</td>
					<td><label><?php echo $row['bs_name']; ?></label>
					<br>
					College's Degree	
					</td>
					<td><label><?php echo $row['bs_year']; ?></label>
					<br>
					Year	
					</td>
				</tr>

				<tr>
					<td><label><?php echo $row['ms_school']; ?></label>
					<br>
					School	
					</td>
					<td><label><?php echo $row['ms_name']; ?></label>
					<br>
					Master's Degree	
					</td>
					<td><label><?php echo $row['ms_year']; ?></label>
					<br>
					Year	
					</td>
				</tr>

				<tr>
					<td><label><?php echo $row['dr_school']; ?></label>
					<br>
					School	
					</td>
					<td><label><?php echo $row['dr_name']; ?></label>
					<br>
					Doctoral's Degree	
					</td>
					<td><label><?php echo $row['dr_year']; ?></label>
					<br>
					Year	
					</td>
				</tr>
			</table>

			<?php }} ?>

    		<br>

			
			<h2 class = "fw-bold fs-3 text-center">CONTRACT REPORT</h2>
			<table id = "example" class = "table m-auto text-dark">
				<thead>
					<tr class="table-bordered text-center fs-6">
						<th scope="col" class="hidden" hidden>CONTRACT ID</th>
						<th scope="col" class="hidden" hidden>PROFID</th>
						<th scope="col" class = "text-center align-middle">SERVICE&nbsp;INCLUSIVE&nbsp;DATE FROM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO</th>
						<th scope="col" class = "text-center align-middle">RECORD&nbsp;OF&nbsp;APPOINTMENT<br>POSITION&nbsp;TITLE&nbsp;/&nbsp;DESIGNATION</th>
						<th scope="col" class = "text-center align-middle" >STATUS</th>
						<th scope="col" class = "text-center align-middle">SALARY</th>
						<th scope="col" class = "text-center align-middle">CAMPUS</th>
					</tr>
				</thead>

				<tbody>
					<?php
					if(isset($_GET['per_id']))
					{
						$per_id = $_GET['per_id'];
						$query = "SELECT * FROM srcms_contract_rb WHERE per_id='$per_id'";
						if($rs=$conn->query($query)){
							while ($row=$rs->fetch_assoc()) {
									$cttime = date("m-d-Y", strtotime($row['cttime']));    
									$ctdue = date("m-d-Y", strtotime($row['ctdue']));    
					?>
					<th scope="row" class="hidden" hidden><?php echo $row['cont_id']; ?></th>
					<th scope="row" class="hidden" hidden><?php echo $row['per_id']; ?></th>
					<td class = "align-middle"><?php echo $cttime."    to   ".$ctdue; ?></th>
					<td class = "align-middle"><?php echo $row['position']; ?></td>
					<td class = "align-middle"><?php echo $row['status']; ?></td>
					<td class = "align-middle"><?php echo $row['salary']; ?></td>
					<td class = "align-middle"><?php echo $row['campus']; ?></td>						    
				</tr>                         
						<?php }
						}}?>

				</tbody>         
            </table>
        </div>
    </div> 
</div> 



<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
<?php 
}else{
     header("Location: login_form.php");
     exit();
}
}else{
	header("Location: login_form.php");
	exit();
}
 ?>

