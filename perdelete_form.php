<?php 
session_start();
include ("db_conn.php");
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
<title>Admin Delete Record | SR&CMS</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<!--Add Record Page CSS-->
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
if(isset($_GET['per_id']))
{
    $per_id = $_GET['per_id'];
    $query = "SELECT * FROM srcms_tbl_personnel WHERE per_id='$per_id'";
    if($rs=$conn->query($query)){

            while ($uquery=$rs->fetch_assoc()) {
                ?><br>

<form action="personnel_delete.php" method="POST" enctype="multipart/form-data" name="form1" id="form1" class = "perdel-form">
<br>
<section class = "pt-3">

    <a href="admin_proflist.php">
    <button class = "btn btn-secondary ms-2" id = "btnback" type="button">
        <img class = "img-fluid" id = "navicons" src = "photos/back.png">
        BACK
    </button>
    </a>

    <button style = "float: right;" class = "btn btn-danger me-3" Onclick="return ConfirmDelete();" type="submit" name="delete">
        <img class = "img-fluid" id = "navicons" src = "photos/delete.png">
        DELETE
    </button>


</section>

<section class = "p-2 text-center">
    <div class = "container">   
        <input type="hidden" name="per_id" value="<?= $uquery['per_id']  ?>">       
        <div class="bg-form p-4">
            <h2 class = "text-center fw-bold">Personal Information</h2>
                <p class = "text-center text-muted lead">Input a Professor's Information</p>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>First Name</label>
                        <input type="text" name="per_firstname" class="form-control" placeholder="First Name" value="<?= $uquery['per_firstname']  ?>" readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Middle Name</label> 
                        <input type="text"  name="per_middlename" class="form-control" placeholder="Middle Name" value="<?= $uquery['per_middlename']  ?>" readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Last Name</label> 
                        <input type="text"  name="per_lastname" class="form-control" placeholder="Last Name" value="<?= $uquery['per_lastname']  ?>" readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Suffix</label> 
                        <input type="text"  name="per_suffix" class="form-control" placeholder="Suffix" value="<?= $uquery['per_suffix']  ?>" readonly>
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Sex</label> 
                        <select name="per_gender" class="form-control" value="<?= $uquery['per_gender']  ?>" readonly>
                                <option><?= $uquery['per_gender'] ?></option>
                        </select>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Status</label> 
                        <select name="per_status" class="form-control" value="<?= $uquery['per_status']  ?>" readonly>
                                <option><?= $uquery['per_status']  ?></option>
                        </select>
                    </div>
                    <div class = "col-lg-6 col-md-12 col-sm-12">
                        <label>Address</label> 
                        <input type="text" name="per_address" class="form-control" placeholder="Address" value="<?= $uquery['per_address']  ?>" readonly>
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Place of Birth</label> 
                        <input type="text" name="per_place_of_birth" class="form-control" placeholder="Place of Birth" value="<?= $uquery['per_place_of_birth']  ?>" readonly>
                    </div> 
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Date of Birth</label> 
                        <input type="date" name="per_date_of_birth" class="form-control" placeholder="Data of Birth" value="<?= $uquery['per_date_of_birth']  ?>" readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12"> 
                        <label>Contact No.</label> 
                        <input type="text" name="per_contact_no" id="contact_no" maxlength="22" class="form-control" placeholder="Mobile No." value="<?= $uquery['per_contact_no']  ?>" readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>TIN No.</label> 
                        <input type="text" name="per_tin_no" id="tin" class="form-control" placeholder="TIN No." value="<?= $uquery['per_tin_no']  ?>" readonly>
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12"> 
                        <label>GSIS/SSS No.</label> 
                        <input type="text" name="per_gsis_no" id="gsis" class="form-control" placeholder="GSIS / SSS No." value="<?= $uquery['per_gsis_bp_no']  ?>" readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12"> 
                        <label>Email Address</label> 
                        <input type="email" name="per_email" id="email" class="form-control" placeholder="Email Address" value="<?= $uquery['per_email']  ?>" readonly>
                    </div>
                </div>
            </div>     

            <div class="bg-form p-4">
                <h2 class = "text-center fw-bold">Educational Attainment</h2>
                <div class="row row-cols-3">
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>School</label> 
                        <input type="text" name="bs_school" class="form-control" placeholder="School" value="<?= $uquery['bs_school']  ?>" readonly>
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>Year: YYYY</label> 
                        <input type="text"name="bs_year" class="form-control" placeholder="Year: YYYY" value="<?= $uquery['bs_year']  ?>" readonly>
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>College's Degree</label> 
                        <input type="text" name="bs_name" class="form-control" placeholder="College's Degree" value="<?= $uquery['bs_name']  ?>" readonly>
                    </div>
                </div>
                <br>
                <div class="row row-cols-3">
                    <div class = "col-lg-4 col-md-4 col-sm-12">  
                        <label>School</label> 
                        <input type="text" name="ms_school" class="form-control" placeholder="School" value="<?= $uquery['ms_school']  ?>" readonly>
                    </div>  
                    <div class = "col-lg-4 col-md-4 col-sm-12">  
                        <label>Year: YYYY</label> 
                        <input type="text" name="ms_year" class="form-control" placeholder="Year: YYYY" value="<?= $uquery['ms_year']  ?>" readonly>
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">  
                        <label>Masteral's Degree</label> 
                        <input type="text" name="ms_name" class="form-control" placeholder="Master's Degree" value="<?= $uquery['ms_name']  ?>" readonly>
                    </div>
                </div>
                <br>
                <div class="row row-cols-3">
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>School</label> 
                        <input type="text" name="dr_school" class="form-control" placeholder="School" value="<?= $uquery['dr_school']  ?>" readonly>
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>Year: YYYY</label> 
                        <input type="text" name="dr_year" class="form-control" placeholder="Year: YYYY" value="<?= $uquery['dr_year']  ?>" readonly>
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>Doctorate's Degree</label> 
                        <input type="text" name="dr_name" class="form-control" placeholder="Doctorate Degree" value="<?= $uquery['dr_name']  ?>" readonly>
                    </div>
                </div>
            </div>     

                      
        <?php
 }
} else 
{
header("Location: admin_proflist.php");   

}
}
?>

<div class="bg-form p-4">
        <h2 class = "text-center fw-bold">Contract Details</h2>
<?php 

if(isset($_GET['per_id']))
{
    $per_id = $_GET['per_id'];
    $query = "SELECT * FROM srcms_contract WHERE per_id='$per_id'";
    if($rs=$conn->query($query)){

        if($rs->num_rows>=0){
            while ($uquery=$rs->fetch_assoc()) {

                ?>
                        <input type="hidden" name="cont_id" value="<?= $uquery['cont_id']  ?>">
                        <input type="hidden" name="per_id" value="<?= $uquery['per_id']  ?>">
                        <br>
  
        <div class="bg-form p-4">
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>START FROM</label> 
                        <input type="date" name="cttime" class="form-control" placeholder="START FROM" value="<?= $uquery['cttime']  ?>" readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>DUE TO</label> 
                        <input type="date" name="ctdue" class="form-control" placeholder="DUE TO" value="<?= $uquery['ctdue']  ?>"  readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>POSITION</label> 
                        <input type="text" name="position" class="form-control" placeholder="POSITIONS" value="<?= $uquery['position']  ?>"  readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>DEPARTMENT</label> 
                        <input type="text" name="department" class="form-control" placeholder="DEPARTMENTS" value="<?= $uquery['department']  ?>" readonly>
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>COLLEGES</label> 
                        <input type="text" name="colleges" class="form-control" placeholder="COLLEGES" value="<?= $uquery['colleges']  ?>" readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>SALARY</label> 
                        <input type="text" name="salary" class="form-control" placeholder="SALARY" value="<?= $uquery['salary']  ?>" readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>CAMPUS</label> 
                        <input type="text" name="campus" class="form-control" placeholder="CAMPUS" value="<?= $uquery['campus']  ?>" readonly>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Status</label>
                        <select name="status" class="form-control" placeholder="STATUS" value="<?= $uquery['status']  ?>" readonly>
                        <option><?= $uquery['status']  ?></option> 
                        </select>
                    </div> 
                </div>
                <br>
                <div class="row row-cols-2 text-center">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>SEMESTER</label>
                        <select name="semester" class="form-control" placeholder="SEMESTER" value="<?= $uquery['schoolyear']  ?>" readonly>
                        <option><?= $uquery['semester']  ?></option> 
                        </select>
                    </div> 
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>SCHOOL YEAR</label>
                        <input type="text" name="schoolyear" class="form-control" placeholder="SCHOOL YEAR" value="<?= $uquery['schoolyear']  ?>" readonly>
                    </div> 
                </div>
        </div>
</div>     
</div>
                <?php
 }
} 
}
}
?>  
           
            <br>  <br>
    </section>
</form>

<script>
function ConfirmDelete(){
    return confirm("Are you sure you want to delete this RECORD?");
  }
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