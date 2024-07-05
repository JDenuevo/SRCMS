<?php
session_start();
include ('db_conn.php');
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type']) ) {
	if($_SESSION['user_type'] == "Administrator"){

		$tnocr =0;
		$tderm =0;
		$tderf =0;
		$tyron = 0;
		$sql = "SELECT * FROM srcms_tbl_personnel";
		if($rs=$conn->query($sql)){
			if($rs->num_rows>=0){
			$row=$rs->num_rows;
			$tnocr= $row;
			$quer = "SELECT * FROM srcms_tbl_personnel WHERE per_gender = 'Male'";
			if($aw=$conn->query($quer)){
				if($aw->num_rows>=0){
				$gg=$aw->num_rows;
				$tderm= $gg;
				$ss2 = "SELECT * FROM srcms_tbl_personnel WHERE per_gender = 'Female'";
				if($wa=$conn->query($ss2)){
					if($wa->num_rows>=0){
					$wp=$wa->num_rows;
					$tderf= $wp;
					$ss3 = "SELECT * FROM srcms_tbl_personnel_rb";
					if($ga=$conn->query($ss3)){
						if($ga->num_rows>=0){
						$cc=$ga->num_rows;
						$tyron= $cc;


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Home Page | SR&CMS</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<!--Main Page CSS-->
<link rel="stylesheet" href="css/main_page.css">

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
<br> <br>

	<a href="schedule.php">
		<button type="button" class = "btn btn-primary float-end me-2">
		<img class = "image-fluid" id = "navicons" src="photos/viewcal.png">
			VIEW CALENDAR OF EVENTS
		</button>
	</a>
	<br><br> <br>
	
<div class="container text-center">
	<div class="col">
		<img class = "image-fluid" id = "ucclogoz" src="photos/ucclogo.png"> <br>
		<label class = "text-dark">We protect what matters.</label>
		<h5>UCC HUMAN RESOURCES DEPARTMENT.</h5>
		<hr class="line1">
	</div>
</div>	

<!--Body-->
<section>
    <div class="container text-center">
	<h2 class="fw-bold fs-1">DASHBOARD</h2>
		<div class="row row-cols-4 pb-4">
			<div class="col-lg-3 col-md-3 col-sm-12 py-2" id = "count">
				<a class = "text-decoration-none text-dark" href="staffviewrec.php">
				<label class = "text-dark fw-bold fs-2 pb-6"><?php echo $tnocr; ?></label>
				<h5>Number of Current Records</h5>
				<img id = "box" src="photos/document.png">
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 py-2" id = "count">
				<a class = "text-decoration-none text-dark" href="staffviewrec.php">
				<label class = "text-dark fw-bold fs-2 pb-6"><?php echo $tyron; ?></label>
				<h5>Number of Past Records</h5>
				<img id = "box" src="photos/file.png">
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 py-2" id = "count">
				<a class = "text-decoration-none text-dark" href="staffviewrec.php">
				<label class = "text-dark fw-bold fs-2 pb-6"><?php echo $tderm; ?></label>
				<h5>Number of Male Professors</h5>
				<img id = "box" src="photos/man.png">	
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 py-2" id = "count">
				<a class = "text-decoration-none text-dark"  href="staffviewrec.php">
				<label class = "text-dark fw-bold fs-2 pb-6"><?php echo $tderf; ?></label>
				<h5>Number of Female Professors</h5>
				<img id = "box" src="photos/woman.png">
				</a>
			</div>
		</div>
	</div>
</section>

<!-- Bootstrap Animation Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
				}}}}}}}}
}else{
     header("Location: login_form.php");
     exit();
}
}else{
	header("Location: login_form.php");
	exit();
}
 ?>