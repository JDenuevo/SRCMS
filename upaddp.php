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
<title>Admin Add Record | SR&CMS</title>
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

<form action="upadd_query.php" method="post">
<br> <br>
    <a href="admin_proflist.php">
        <button class = "btn btn-secondary ms-2" id = "btnback" type="button">
            <img class = "img-fluid" id = "navicons" src = "photos/back.png">
            BACK
        </button>
    </a>  

<section class = "p-2 text-center">
    <h1><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg']; unset($_SESSION['msg']);}?></h1>    
        <div class = "container">          
            <div class="bg-form p-4">
                <h2 class = "text-center fw-bold">Personal Information</h2>
                <p class = "text-center text-muted lead">Input a Professor's Information</p>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>First name</label> 
                        <input type="text" name="per_firstname" class="form-control" placeholder="First Name" required/>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Middle name</label> 
                        <input type="text"  name="per_middlename" class="form-control" placeholder="Middle Name" />
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Last Name</label> 
                        <input type="text"  name="per_lastname" class="form-control" placeholder="Last Name" required >
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Suffix</label> 
                        <input type="text"  name="per_suffix" class="form-control" placeholder="Suffix">
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Sex</label> 
                        <select name="per_gender" class="form-control" required>
                            <option disabled>Sex</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Status</label> 
                        <select name="per_status" class="form-control" required>
                                <option disabled>Status</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Widowed</option>
                                <option>Separated</option>
                        </select>
                    </div>
                    <div class = "col-lg-6 col-md-12 col-sm-12">
                        <label>Address</label> 
                        <input type="text" name="per_address" class="form-control" placeholder="Address" required>
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Place of Birth</label> 
                        <input type="text" name="per_place_of_birth" class="form-control" placeholder="Place of Birth" required>
                    </div> 
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Birthday</label> 
                        <input type="date" name="per_date_of_birth" class="form-control" placeholder="Birthday" required>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Contact No.</label> 
                        <input type="text" name="per_contact_no" id="contact_no" maxlength="22" class="form-control" placeholder="Mobile No." required>
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>TIN No.</label> 
                        <input type="text" name="per_tin_no" id="tin" class="form-control" placeholder="TIN No.">
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>GSIS/SSS No.</label> 
                        <input type="text" name="per_gsis_no" id="gsis" class="form-control" placeholder="GSIS / SSS No.">
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>Email Address</label>     
                        <input type="email" name="per_email" id="email" class="form-control" placeholder="Email Address" required>
                    </div>
                </div>
            </div>     

            <div class="bg-form p-4">
                <h2 class = "text-center fw-bold">Educational Attainment</h2>
                <div class="row row-cols-3">
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>School</label>     
                        <input type="text" name="bs_school" class="form-control" placeholder="School">
                        <span class="border"></span>
                    </div>

                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>Year: YYYY</label> 
                        <input type="text"name="bs_year" class="form-control" placeholder="Year: YYYY">
                        <span class="border"></span>
                    </div>

                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>College's Degree</label> 
                        <input type="text" name="bs_name" class="form-control" placeholder="College's Degree">
                        <span class="border"></span>
                    </div>
                </div>

                <div class="row row-cols-3">
                <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>School</label>  
                        <input type="text" name="ms_school" class="form-control" placeholder="School">
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>Year: YYYY</label> 
                        <input type="text" name="ms_year" class="form-control" placeholder="Year: YYYY">
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12">
                        <label>Masteral's Degree</label> 
                        <input type="text" name="ms_name" class="form-control" placeholder="Masteral's Degree">
                    </div>  
                </div>

                <div class="row row-cols-3">
                    <div class = "col-lg-4 col-md-4 col-sm-12"> 
                        <label>School</label>  
                        <input type="text" name="dr_school" class="form-control" placeholder="School">
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12"> 
                        <label>Year: YYYY</label> 
                        <input type="text" name="dr_year" class="form-control" placeholder="Year: YYYY">
                    </div>
                    <div class = "col-lg-4 col-md-4 col-sm-12"> 
                        <label>Doctoral's Degree</label> 
                        <input type="text" name="dr_name" class="form-control" placeholder="Doctoral's Degree">
                    </div>
                </div>
                <br>
                <button class = "btn btn-success btn-lg" id = "btnadd" type="submit" name="save">
                    <img class = "img-fluid" id = "navicons" src = "photos/addrec.png">
                    ADD RECORD
                </button>
            </div>
        </div>   
</section>         
</form> 

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