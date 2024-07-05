<?php 
session_start();
include('db_conn.php');
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {

  if($_SESSION['user_type'] == "Administrator"){

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Find Colleges | SR&CMS</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<!-- Print Report CSS -->
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
                  <a class="nav-link dropdown-toggle py-3 px-0 px-lg-1 link-light rounded" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
<div id="print-logo">
    <div class = "btnback">
      <a href="admin_proflist.php" class = "text-decoration-none">
        <button class = "btn btn-secondary ms-2">
          <img class = "img-fluid" id = "navicons" src = "photos/back.png"> 
          BACK
        </button>
      </a>
    </div>

    <div id="mid-search">
      <form method="GET">
        <label>Search Departments <label>
          <input type="text" name="name" placeholder="Search for Colleges" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" required>
          <button type="submit" class = "btnsearch btn btn-primary">
            <img class = "img-fluid" id = "navicons" src = "photos/search.png">
            SEARCH
          </button>  
      </form>
    </div>

    <div id="right-print">
        <div onload="refresh();">
          <button onclick="printContent('print')" id = "hit" class="btnprint btn btn-primary me-2">
          <img class = "img-fluid" id = "navicons" src = "photos/printrec.png">
          PRINT BREAKDOWN
          </button>
        </div>
    </div>
</div>
<br>
<div id="print">
  
    <div id="print-logo">
      <div id="left-cal"><img src="photos/caloocan.png"></div>

      <div id="mid-text"> <br> <br>
        <h2>UNIVERSITY OF CALOOCAN CITY</h2> <br>
        <label>(Formerly Caloocan City Polytechnic College)<br>
        Biglang Awa St. cor. Cattleya St. 12th Avenue East, Caloocan City<br>
        Tel. No. 5310-6581</label>
      </div>

      <div id="right-ucc"><img src="photos/ucclogo.png"></div>
    </div>
    <br> <br>
    <h2 class = "text-center">COLLEGE'S BREAKDOWN</h2>
        <div class="table-responsive">
            <table id = "table" class = "table table-hover table-bordered table-striped table-fixed m-auto text-dark">
              <thead>
                  <tr class="table-active text-center">
                    <th scope="col" class = "text-center">Name</td>
                    <th scope="col" class = "text-center">Gender</td>
                    <th scope="col" class = "text-center">Email Address</td>
                    <th scope="col" class = "text-center">Position/Designation</td>
                    <th scope="col" class = "text-center">Department</td>
                    <th scope="col" class = "text-center">Colleges</td>
                  </tr>
                </thead>
                  <?php 
                  $hello="";
                  if(isset($_GET['name'])){
                      $name = $_GET['name'];
                      $result = "SELECT * FROM srcms_tbl_personnel WHERE CONCAT(colleges) LIKE '%$name%'";
                          if($rs=$conn->query($result)){
                            if($rs->num_rows>0){
                      while ($row = $rs->fetch_assoc())
                      {
                  ?>
                  <tbody>
                    <td class = "align-middle"><?php echo $row['per_lastname'].",&nbsp;".$row['per_firstname']."&nbsp;".$row['per_middlename'];?></td>
                    <td class = "align-middle"><?php echo $row['per_gender']; ?></td>
                    <td class = "align-middle"><?php echo $row['per_email'];?></td>
                    <td class = "align-middle"><?php echo $row['position'];?></td>
                    <td class = "align-middle"><?php echo $row['department'];?></td>
                    <td class = "align-middle"><?php echo $row['colleges'];?></td>
                        <?php
                          }
                        }else{
                          $hello = "No ". $name ." has found";
                        }
                      }
                      }else{
                        $hello = "Search for Colleges";
                        }
                        ?>  
                  </tbody>
            </table>
            <center><?php echo $hello;?></center>

              
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
