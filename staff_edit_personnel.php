<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {
	if($_SESSION['user_type'] == "Staff"){

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Staff Edit Record | SR&CMS</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/update_rec.css">

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
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 link-light rounded" href="staff_page.php"><img class = "img-fluid" id = "navicons" src = "photos/homepg.png"> Home</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 link-light rounded" href="staffaddrec.php"><img class = "img-fluid" id = "navicons" src = "photos/addrec.png"> Add Personnel Record</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 link-light rounded" href="staffviewrec.php"><img class = "img-fluid" id = "navicons" src = "photos/viewrec.png"> View Personnel Record List</a></li>
				<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 link-light rounded" href="logout.php"><img class = "img-fluid" id = "navicons" src = "photos/stafflg.png"> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php 
include ("db_conn.php");

if(isset($_GET['per_id']))
{
    $per_id = $_GET['per_id'];
    $sql = "SELECT * FROM srcms_tbl_personnel WHERE per_id='$per_id'";
    if($rs=$conn->query($sql)){
        if($row=$rs->num_rows>0){

           while ($uquery=$rs->fetch_assoc()) {

                ?>
<form action="staff_edit_personnel_query.php" method="POST" enctype="multipart/form-data" name="form1" id="form1">       
<br> <br>
    <a href="staffviewrec.php">
    <button class = "btn btn-secondary btn-lg ms-2" id = "btnback" type="button">
        <img class = "img-fluid" id = "navicons" src = "photos/back.png">
        BACK
    </button>
    </a>  
                         
    <section class = "p-2 text-center"> 
        <input type="hidden" name="per_id" value="<?= $uquery['per_id']  ?>">
        <div class = "container">          
            <div class="bg-form p-4">
                <h2 class = "text-center fw-bold">Personal Information</h2>
                <p class = "text-center text-muted lead">Update a Professor's Information</p>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>First name</label>
                        <input type="text" name="per_firstname" class="form-control" placeholder="First Name" value="<?= $uquery['per_firstname']  ?>" required>
                    </div>

                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Middle name</label>
                        <input type="text"  name="per_middlename" class="form-control" placeholder="Middle Name" value="<?= $uquery['per_middlename']  ?>">
                    </div>

                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Last name</label>
                        <input type="text"  name="per_lastname" class="form-control" placeholder="Last Name" value="<?= $uquery['per_lastname']  ?>" required>
                    </div>

                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Suffix</label>
                        <input type="text"  name="per_suffix" class="form-control" placeholder="Suffix" value="<?= $uquery['per_suffix']  ?>">
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Sex</label>
                        <select name="per_gender" class="form-control" value="<?= $uquery['per_gender']  ?>" required>
                                <option><?= $uquery['per_gender'] ?></option>
                                <option>Male</option>
                                <option>Female</option>
                        </select>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Status</label>
                        <select name="per_status" class="form-control" value="<?= $uquery['per_status']  ?>" required>
                                <option><?= $uquery['per_status']  ?></option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Widowed</option>
                                <option>Separated</option>
                        </select>
                    </div>
                    <div class = "col-lg-6 col-md-12 col-sm-12">
                        <label>Address</label>
                        <input type="text" name="per_address" class="form-control" placeholder="Address" value="<?= $uquery['per_address']  ?>" required>
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Place of Birth</label>
                        <input type="text" name="per_place_of_birth" class="form-control" placeholder="Place of Birth" value="<?= $uquery['per_place_of_birth']  ?>" required>
                    </div> 
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Birthday</label>  
                        <input type="date" name="per_date_of_birth" class="form-control" placeholder="Birthday" value="<?= $uquery['per_date_of_birth']  ?>" required>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Contact No.</label>    
                        <input type="text" name="per_contact_no" id="contact_no" maxlength="22" class="form-control" placeholder="Mobile No." value="<?= $uquery['per_contact_no']  ?>" required>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>TIN No.</label>
                        <input type="text" name="per_tin_no" id="tin" class="form-control" placeholder="TIN No." value="<?= $uquery['per_tin_no']  ?>">
                    </div>
                </div> 
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>GSIS/SSS No.</label>
                        <input type="text" name="per_gsis_no" id="gsis" class="form-control" placeholder="GSIS / SSS No." value="<?= $uquery['per_gsis_bp_no']  ?>">
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Email Address</label>
                        <input type="email" name="per_email" id="email" class="form-control" placeholder="Email Address" value="<?= $uquery['per_email']  ?>" required>
                    </div>
                </div>
            </div>
               

            <div class="bg-form p-4">
                <h2 class = "text-center fw-bold">Educational Attainment</h2>
                <div class="row row-cols-3">
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>School</label>   
                        <input type="text" name="bs_school" class="form-control" placeholder="School" value="<?= $uquery['bs_school']  ?>">
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                    <label>Year: YYYY</label>     
                        <input type="text"name="bs_year" class="form-control" placeholder="Year: YYYY" value="<?= $uquery['bs_year']  ?>">
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>College's Degree</label> 
                        <input type="text" name="bs_name" class="form-control" placeholder="College's Degree" value="<?= $uquery['bs_name']  ?>">
                    </div>
                </div>
                <br>
                <div class="row row-cols-3">
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>School</label>   
                        <input type="text" name="bs_school" class="form-control" placeholder="School" value="<?= $uquery['ms_school']  ?>">
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                    <label>Year: YYYY</label>     
                        <input type="text"name="bs_year" class="form-control"placeholder="Year: YYYY" value="<?= $uquery['ms_year']  ?>">
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>Masteral's Degree</label> 
                        <input type="text" name="bs_name" class="form-control" placeholder="Masteral's Degree" value="<?= $uquery['ms_name']  ?>">
                    </div>
                </div>
                <br>
                <div class="row row-cols-3">
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>School</label>   
                        <input type="text" name="bs_school" class="form-control"placeholder="School" value="<?= $uquery['dr_school']  ?>">
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                    <label>Year: YYYY</label>     
                        <input type="text"name="bs_year" class="form-control" placeholder="Year: YYYY" value="<?= $uquery['dr_year']  ?>">
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>Doctoral's Degree</label> 
                        <input type="text" name="bs_name" class="form-control" placeholder="Doctoral's Degree" value="<?= $uquery['dr_name']  ?>">
                    </div>
                </div>
                <br>
                <button class = "btn btn-success btn-lg" id = "btnupd" type="submit" name="update">
                    <img class = "img-fluid" id = "navicons" src = "photos/updrec.png">
                    UPDATE RECORD
                </button>
            </div>
        </div>   
    </section>         
</form>     
        <?php
 }
} else 
{
header("Location: staff_page.php");
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