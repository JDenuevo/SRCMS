<?php 
session_start();
include ("db_conn.php");
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {
    if($_SESSION['user_type'] == "Administrator"){

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Page</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<!--Add Record Page CSS-->
<link rel="stylesheet" href="css/add_contract.css">

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
if(isset($_GET['cont_id']))
{
    $cont_id = $_GET['cont_id'];
    $query = "SELECT * FROM srcms_contract WHERE cont_id='$cont_id'";
    if($rs=$conn->query($query)){
        if($rs->num_rows>0){
        while ($uquery=$rs->fetch_assoc()) {

                ?>
<form action="personnel_contract_edit_query.php" method="POST" enctype="multipart/form-data" name="form1" id="form1">
<br> <br> 
    <a href="personnel_contract.php?per_id=<?= $uquery['per_id']  ?>">
        <button class = "btn btn-secondary ms-2" id = "btnback" type="button">
            <img class = "img-fluid" id = "navicons" src = "photos/back.png">
            BACK
        </button>
    </a> 

<section class = "p-2 text-center">
    <input type="hidden" name="cont_id" value="<?= $uquery['cont_id']  ?>">
    <input type="hidden" name="per_id" value="<?= $uquery['per_id']  ?>">
        <div class = "container">          
            <div class="bg-form p-4">
                <h2 class = "text-center fw-bold">Personal Information</h2>
                <p class = "text-center text-muted lead">Update a Professor's Contract</p>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>START FROM</label>
                        <input type="date" name="cttime" class="form-control" placeholder="START FROM" value="<?= $uquery['cttime']  ?>">
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>DUE TO</label>
                        <input type="date" name="ctdue" class="form-control" placeholder="DUE TO" value="<?= $uquery['ctdue']  ?>">
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>POSITION/DESIGNATION</label>
                        <input type="text" name="position" class="form-control" placeholder="POSITION" value="<?= $uquery['position']  ?>">           
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>DEPARTMENT</label>
                        <input type="text" name="department" class="form-control" placeholder="DEPARTMENT" value="<?= $uquery['department']  ?>">
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>COLLEGES</label>
                        <input type="text" name="colleges" class="form-control" placeholder="COLLEGES" value="<?= $uquery['colleges']  ?>">
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>SALARY</label>
                        <input type="text" name="salary" class="form-control" placeholder="SALARY" value="<?= $uquery['salary']  ?>" >
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>CAMPUS</label>
                        <input type="text" name="campus" class="form-control" placeholder="CAMPUS" value="<?= $uquery['campus']  ?>">
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>SEMESTER</label>
                        <select name="semester" class="form-control" placeholder="SEMESTER" value="<?= $uquery['semester']  ?>">
                        <option><?= $uquery['semester']  ?></option>
                        <option value="First Semester">First Semester</option> 
                        <option value="Second Semester">Second Semester</option>
                        <option value="Summer Class">Summer Class</option>  
                        </select>
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                    <label>STATUS</label>
                        <input type="text" name="status" class="form-control" placeholder="STATUS" value="<?= $uquery['status']  ?>">
                    </div> 
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                    <label>SCHOOL YEAR</label>
                        <input type="text" name="schoolyear" class="form-control" placeholder="SCHOOL YEAR" value="<?= $uquery['schoolyear']  ?>">
                    </div> 
                </div>  <br>  
                <button class = "btn btn-success btn-lg" id = "btnadd" type="submit" name="edit">
                    <img class = "img-fluid" id = "navicons" src = "photos/addcont.png">
                    UPDATE CONTRACT
                </button>
            </div>
        </div>
    </section>
</form>
           
        <?php


}
} else 
{
header("Location: personnel_contract.php");
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