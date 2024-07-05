<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {
  $id=$_SESSION['id'];
	if($_SESSION['user_type'] == "Administrator"){

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Deleted Records | SR&CMS</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<!-- Add Record Page CSS -->
<link rel="stylesheet" href="css/view_rec.css">

<!-- Jquery Table CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

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

<form action="post">
<br> <br>

  <a href="admin_proflist.php">
  <button class = "btn btn-secondary ms-2 text-left" id = "btnback" type="button">
      <img class = "img-fluid" id = "navicons" src = "photos/back.png">
      BACK
  </button>
  </a>

  <input type="hidden" name="user_id" value="<?php echo $id?>"></input>

  <section class = "p-2">
    <h2 class = "text-center fw-bold">DELETED RECORDS</h2>
        <div class="table-responsive">
            <table id = "table" class = "table table-hover table-bordered table-striped m-auto text-dark">
              <thead>
                <tr class="table-active text-center">
                  <th scope="col" class="hidden" hidden>ID</th>
                  <th scope="col" class = "text-center">Name</th>
                  <th scope="col" class = "text-center">Gender</th>
                  <th scope="col" class = "text-center">Status</th>
                  <th scope="col" class = "text-center">Age</th>
                  <th scope="col" class = "text-center">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                include ("db_conn.php");
                $sql = "SELECT * FROM srcms_tbl_personnel_rb";
                if($rs=$conn->query($sql)){
                  while ($row=$rs->fetch_assoc()) {
                $bday = $row["per_date_of_birth"];
                $date = new DateTime($bday);
                $now = new DateTime();

                $difference = $date->diff($now)->format('%y');
                ?>
                <th scope="row" class="hidden" hidden><?php echo $row['per_id']; ?></th>
                <td class = "align-middle"><?php echo $row['per_lastname'].", ".$row['per_firstname']." ".$row['per_middlename']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td class = "align-middle"><?php echo $row['per_gender']; ?></td>
                <td class = "align-middle"><?php echo $row['per_status']; ?></td>
                <td class = "align-middle"><?php echo $difference;?></td>
                <td class = "align-middle">
                  <a class = "text-decoration-none" href="personnel_retrieve.php?per_id=<?php echo $row['per_id']?>">
                  <span class="btn btn-primary my-1 w-100"><img class = "img-fluid" id = "tblicons" src = "photos/returnee.png"> Returnee</span>                              
                  </a>
                  <a class = "text-decoration-none" href="print_individual_report_rb.php?per_id=<?php echo $row['per_id']?>">
                  <span class="btn btn-secondary my-1 w-100"><img class = "img-fluid" id = "tblicons" src = "photos/printrec.png"> Print Record</span>
                  </a>
                  <a class = "text-decoration-none" href="individual_print_certificate_rb.php?per_id=<?php echo $row['per_id']?>">
                  <span class="btn btn-secondary my-1 w-100"><img class = "img-fluid" id = "tblicons" src = "photos/printcert.png"> Print COE</span>
                  </a>
                </td>
              </tr>                         
                    <?php 
                    }
                  
                }?>
                </tbody>
                        
            </table>    
        </div>
  </section>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#table').DataTable();
} );
</script>

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