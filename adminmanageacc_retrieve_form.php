<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {

	if($_SESSION['user_type'] == "Administrator"){
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Retrieve Account | SR&CMS</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<!-- View Record Page CSS -->
<link rel="stylesheet" href="css/add_rec.css">

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


<?php 
include ("db_conn.php");
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "SELECT * FROM srcms_users_rb WHERE id='$id'";
    if($rs=$conn->query($query)){
        if($row=$rs->num_rows>0){

           while ($uquery=$rs->fetch_assoc()) {
                ?>
<form action="adminmanageacc_retrieve_query.php" method="POST" enctype="multipart/form-data" name="form1" id="form1">
<br><br>
	<a href="adminmanageacc_rb.php">
      <button class = "btn btn-secondary ms-2" id = "btnback" type="button">
        <img class = "img-fluid" id = "navicons" src = "photos/back.png">
        BACK
      </button>
    </a>
		
	<section class = "p-2 text-center">   
		<div class = "container">          
			<div class="bg-form p-4">
				<h1><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg']; unset($_SESSION['msg']);}?></h1>
				<input type="hidden" name="id" value="<?= $uquery['id']  ?>">
					<h2 class = "text-center fw-bold">RETRIEVE YOUR ACCOUNT</h2>
					<p class = "text-center text-muted lead">Confirm if this is your Account</p>
				<div class="row row-cols-2">
					<div class = "col-lg-6 col-md-6 col-sm-12">
						<label>Username</label>
						<input type="text" name="user_name" class="form-control" value="<?= $uquery['user_name']  ?>" readonly>
					</div>
					<div class = "col-lg-6 col-md-6 col-sm-12">
						<label>Current Password</label>
						<input type="password"  name="pass" class="form-control" value="<?= $uquery['pass']  ?>" readonly>
					</div>	
				</div>
				<br>
				<div class="row row-cols-2">
					<div class = "col-lg-6 col-md-6 col-sm-12">
						<label>Name</label>
						<input type="text" name="name" class="form-control" value="<?= $uquery['name']  ?>" readonly>
					</div>
					<div class = "col-lg-6 col-md-6 col-sm-12">
						<label>User Type</label>
						<select name="user_type" class="form-control" value="<?= $uquery['user_type']  ?>" readonly>
						<option><?= $uquery['user_type']  ?></option>
						</select>
					</div>
				</div>
				<br>
			  	<a href="adminmanageacc_retrieve_form.php">
					<button class = "btn btn-success btn-lg" id = "btnadd" type="submit" name="retrieve">
						<img class = "img-fluid" id = "navicons" src = "photos/rtvacc.png">
						RETRIEVE ACCOUNT
					</button>
                </a>
			</div>
		</div>
	</section>
</form>
           
        <?php
 }
} else 
{
   header("Location: adminmanageacc_edit.php?edit=failed");    
}
}
}
?>

<!-- Bootstrap Animation Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

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