<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {
    if($_SESSION['user_type'] == "Administrator"){

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Add Contract | SR&CMS</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<!--Add Record Page CSS-->
<link rel="stylesheet" href="css/add_contract.css">

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

<form action="personnel_contract_query.php" method="POST" enctype="multipart/form-data" name="form1" id="form1">
<br> <br> 
        <a href="admin_proflist.php">
            <button class = "btn btn-secondary ms-2" id = "btnback" type="button">
                <img class = "img-fluid" id = "navicons" src = "photos/back.png">
                BACK
            </button>
        </a> 

<section class = "p-2 text-center">
        <input type="hidden" name="per_id" value="<?php echo $_GET['per_id'];?>">
        <div class = "container">          
            <div class="bg-form p-4">
                <h2 class = "text-center fw-bold">Personal Information</h2>
                <p class = "text-center text-muted lead">Add a Professor's Service Inclusive Date</p>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>START FROM</label>
                        <input type="date" name="cttime" class="form-control" placeholder="START FROM">
                    </div> 
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>DUE TO</label>
                        <input type="date" name="ctdue" class="form-control" placeholder="DUE TO">
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>POSITION</label>
                        <input type="text" name="position" class="form-control" placeholder="POSITIONS">
                    </div> 
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>SALARY</label>
                        <input type="text" name="salary" class="form-control" placeholder="SALARY">
                    </div>
                </div>
                <br>
                <div class="row row-cols-4">
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>CAMPUS</label>
                        <input type="text" name="campus" class="form-control" placeholder="CAMPUS">
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>DEPARTMENT</label>
                        <input type="text" name="department" class="form-control" placeholder="DEPARTMENTS">
                    </div>
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>COLLEGES</label>
                        <input type="text" name="colleges" class="form-control" placeholder="COLLEGES">
                    </div> 
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                        <label>SEMESTER</label> <br>
                        <select name="semester" class="form-control" placeholder="SEMESTER">
                        <option selected disabled></option>
                        <option>First Semester</option> 
                        <option>Second Semester</option>
                        <option>Summer Class</option>  
                        </select>
                    </div>
                </div>
                <br>
                <div class="row row-cols-4"> 
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                    <label>STATUS</label>
                        <input type="text" name="status" class="form-control" placeholder="STATUS">
                    </div> 
                    <div class = "col-lg-3 col-md-6 col-sm-12">
                    <label>SCHOOL YEAR</label>
                        <input type="text" name="schoolyear" class="form-control" placeholder="SCHOOL YEAR">
                    </div> 
                </div> <br>
                <button class = "btn btn-success btn-lg" id = "btnadd" type="submit" name="addcontract">
                    <img class = "img-fluid" id = "navicons" src = "photos/addcont.png">
                    ADD CONTRACT
                </button>
            </div>
        </div>
    </section> 
</form>
<br>
<section class = "p-2">
    <h2 class = "text-center fw-bold">INDIVIDUAL RECORDS</h2>
        <div class="table-responsive">
            <table id = "table" class = "table table-hover table-bordered table-striped m-auto text-dark">
                <thead>
                    <tr class="table-active text-center">
                    <th scope="col" hidden>CONTRACT&nbsp;ID</th>
                    <th scope="col" hidden>PROF&nbsp;ID</th>
                    <th scope="col" class = "text-center">&nbsp;START&nbsp;FROM:&nbsp;|&nbsp;DUE&nbsp;TO:</th>
                    <th scope="col" class = "text-center">POSITION&nbsp;/&nbsp;DESIGNATION</th>
                    <th scope="col" class = "text-center">DEPARTMENT</th>
                    <th scope="col" class = "text-center">COLLEGES</th>
                    <th scope="col" class = "text-center">STATUS</th>
                    <th scope="col" class = "text-center">SALARY</th>
                    <th scope="col" class = "text-center">CAMPUS</th>
                    <th scope="col" class = "text-center">SEMESTER</th>
                    <th scope="col" class = "text-center">SCHOOL&nbsp;YEAR</th>
                    <th scope="col" class = "text-center">ACTION</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    if(isset($_GET['per_id']))
                    {
                        $per_id = $_GET['per_id'];
                        $sql = "SELECT * FROM srcms_contract WHERE per_id='$per_id'";
                        if($rs=$conn->query($sql)){
                            while ($row=$rs->fetch_assoc()) {
    
                    ?>
                    <th scope="row" class="hidden" hidden><?php echo $row['cont_id']; ?></th>
                    <th scope="row" class="hidden" hidden><?php echo $row['per_id']; ?></th>
                    <td class = "align-middle"><?php echo $row['cttime']."    to   ".$row['ctdue']; ?></td>
                    <td class = "align-middle"><?php echo $row['position']; ?></td>
                    <td class = "align-middle"><?php echo $row['department']; ?></td>
                    <td class = "align-middle"><?php echo $row['colleges']; ?></td>
                    <td class = "align-middle"><?php echo $row['status']; ?></td>
                    <td class = "align-middle"><?php echo $row['salary']; ?></td>
                    <td class = "align-middle"><?php echo $row['campus']; ?></td>
                    <td class = "align-middle"><?php echo $row['semester']; ?></td> 
                    <td class = "align-middle"><?php echo $row['schoolyear']; ?></td>           
                    <td class = "align-middle">     
                    <a class = "text-decoration-none" href="personnel_contract_edit.php?cont_id=<?php echo $row['cont_id'] ?>">
                        <span class="btn btn-success my-1 w-100" aria-hidden = "true"><img class = "img-fluid" id = "tblaycon" src = "photos/updrec.png"> Update</span>
                    </a>
                </tr>                         
                        <?php }}
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