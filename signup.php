<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {
     if($_SESSION['user_type'] == "Administrator"){

?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up | SR&CMS</title>
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

<form action="signup-check.php" method="post">
     <br><br>
     <a href="adminmanageacc.php">
      <button class = "btn btn-secondary ms-2" id = "btnback" type="button">
        <img class = "img-fluid" id = "navicons" src = "photos/back.png">
        BACK
      </button>
    </a>

<section class = "p-2 text-center">   
     <div class = "container">          
          <div class="bg-form p-4">

               <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
               <?php } ?>

               <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
               <?php } ?>

               <h2 class = "text-center fw-bold">SIGN UP AN ACCOUNT</h2>
               <p class = "text-center text-muted lead">It’s quick and easy.</p>
               <div class="row row-cols-2">
                    <div class = "col-lg-6 col-md-6 col-sm-12">
                         <label>Name</label>
                         <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class = "col-lg-6 col-md-6 col-sm-12">
                         <label>User Name</label>
                         <input type="text" name="uname" class="form-control" placeholder="User Name">
                    </div>
               </div>
               <br>
               <div class="row row-cols-2">
                    <div class = "col-lg-6 col-md-6 col-sm-12">
                         <label>Password</label>
                         <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class = "col-lg-6 col-md-6 col-sm-12">
                         <label>Re-type Password</label>
                         <input type="password" name="re_password" class="form-control" placeholder="Re-type Password">
                    </div>
               </div>
               <br>
               <div class="row row-cols-1 text-center">
                    <div class = "col-lg-6 col-md-6 col-sm-12">
                         <label>User Type</label>
                         <select id="user_type" name="user_type" class="form-control">
                              <option> </option>
                              <option value="Administrator">ADMINISTRATOR</option>
                              <option value="Staff">STAFF</option>
                         </select>
                    </div>
               </div>
               <br>
               <a href="adminmanageacc.php">
               <button class = "btn btn-success btn-lg" id = "btnadd" type="submit">
                    <img class = "img-fluid" id = "navicons" src = "photos/signup.png">
                    SIGN UP
                </button>
                </a>
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