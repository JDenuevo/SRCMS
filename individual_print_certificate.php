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
<title>Administrator Print COE | SR&CMS</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<!-- Modal Script -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<!-- Print Record CSS -->
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
<br><br><br><br><br>

    <a href="admin_proflist.php">
        <button class = "btn btn-secondary ms-2" id = "btnback" type="button">
            <img class = "img-fluid" id = "navicons" src = "photos/back.png">
            BACK
        </button>
    </a>

    <div onload="refresh();" class = "float-end">
          <button onclick="printContent('print')" id = "hit" class="btnprint btn btn-primary me-2">
          <img class = "img-fluid" id = "navicons" src = "photos/printcert.png">
          PRINT COE
          </button>
    </div>

        <div ng-app="myApp" ng-controller="myCtrl">
            
        <div class="bg-form container justify-content-center pt-2">
            <h2 class = "text-center fw-bold">Fill these Fields</h2>
            <p class = "text-center text-muted lead">Input a Professor's COE</p>
            <div class="row row-cols-2">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label class = "form-label ms-2">Cash In Words</label>
                    <input class = "form-control" ng-model="ciw"> 
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label class = "form-label ms-2">In Cash</label>
                    <input class = "form-control" ng-model="ic"> 
                </div>
            </div>
            <br>
            <div class="row row-cols-2">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label class = "form-label ms-2">Prepared by:</label>
                    <input class = "form-control" ng-model="pname"> 
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label class = "form-label ms-2">Position:</label>
                    <input class = "form-control" ng-model="ppos"> 
                </div>
            </div>
            <br>
            <div class="row row-cols-2">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label class = "form-label ms-2">Noted by:</label>
                    <input class = "form-control" ng-model="nname"> 
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label class = "form-label ms-2">Position:</label>
                    <input class = "form-control" ng-model="npos"> 
                </div>
            </div>
            <br>
            <label class = "form-label ms-1">Other Details:</label>
            <div class="row row-cols-2">
                <div class="col-lg-6 col-md-6 col-sm-6">    
                    <label class = "form-label ms-2">OR NUMBER:</label>
                    <input class = "form-control" ng-model="or"> 
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <label class = "form-label ms-2">Date Issued:</label>
                    <input class = "form-control" ng-model="di"> 
                </div>
            </div>
            <br>
        </div>
<br>
<div id="print">
    <div id="print-logo">
      <div id="left-cal"><img src="photos/caloocan.png"></div>

      <div id="mid-text"> <br>
        <h2 class = "fw-bold fs-1">UNIVERSITY OF CALOOCAN CITY</h2> <br>
        <label class = "fs-5">(Formerly Caloocan City Polytechnic College)<br>
        Biglang Awa St. cor. Cattleya St. 12th Avenue East, Caloocan City<br>
        Tel. No. 5310-6581</label>
      </div>

      <div id="right-ucc"><img src="photos/ucclogo.png"></div>
    </div>


    <div class = "certificate-form">
        <div class="cert-form-header">
            <hr class="line1">
            <h2 class = "fw-bold text-center">CERTIFICATION</h2>
            <?php
            
            $sql = "SELECT * FROM srcms_tbl_personnel WHERE per_id={$_GET['per_id']}";
            if($rs=$conn->query($sql)){
                while ($row=$rs->fetch_assoc()) {
                $per_id = $row['per_id'];
                $bday = $row["per_date_of_birth"];
                $date = new DateTime($bday);
                $now = new DateTime();
                $difference = $date->diff($now)->format('%y');
            ?>

            <h3 class = "text-left fs-5 pt-2"> TO WHOM IT MAY CONCERN</h3>
        </div>
    </div>


    <div class = "text-center fs-6">
        <label>This is to certify that <h3 class ="fw-bold text-decoration-underline d-inline fs-6">Prof. <?php echo $row['per_firstname']." ".$row['per_middlename']." ".$row['per_lastname'];?></h3> is connected in</h3><?php }}?>
        <br>
        <label>the University of Caloocan City since </label>
        <?php

        if(isset($_GET['per_id']))
        {
            $per_id = $_GET['per_id'];
            $query = "SELECT * FROM srcms_contract WHERE per_id='$per_id' ORDER BY cttime ASC";
            if($rs=$conn->query($query)){
                while($row=$rs->fetch_assoc()){
                date_default_timezone_set('Asia/Manila');
                $cttime = date("F Y", strtotime($row['cttime']));
                $ctddue = strtotime($row["ctdue"]);
                $now = strtotime(date('Y-m-d'));

                $difference = $ctddue-$now;
                if($difference < 0) {
                    $ctdue = date("F Y", strtotime($row['ctdue'])); 
                }else{
                    $ctdue = "present"; 
                }
                
        ?>
        
        <label><?php echo $cttime?> to <?php echo $ctdue?> as a part-time</label><br><?php }}}?>
        
        <?php
        
        if(isset($_GET['per_id']))
        {
            $per_id = $_GET['per_id'];
            $query = "SELECT * FROM srcms_contract WHERE per_id='$per_id' ORDER BY cont_id ASC";
            if($rs=$conn->query($query)){
                while($row=$rs->fetch_assoc()){
                $position = $row['position'];
            
        ?>
    
        <label><?php echo $position; ?> and receiving an honorarium of</label><br>  <?php }}}?>

        <label style="fw-bold text-decoration-underline d-inline fs-6">{{ciw}}((₱{{ic}}))</label><label>&nbsp;per hour.</label><br><br>

        <label>This certificate is being issued to&nbsp;</label><label><?php 
                
                $sql = "SELECT * FROM srcms_tbl_personnel WHERE per_id={$_GET['per_id']}";
                if($rs=$conn->query($sql)){
                    $row=$rs->fetch_assoc();
                        if($row['per_gender'] == "Male"){
                            echo "Mr.&nbsp;";
                            echo $row['per_lastname'];
                        } elseif($row['per_gender'] == "Female"){
                            echo "Ms.&nbsp;";
                            
                        }
                }?></label><label>&nbsp;for whatever legal purposes it may serve&nbsp;<?php 
                    
                    $sql = "SELECT * FROM srcms_tbl_personnel WHERE per_id={$_GET['per_id']}";
                    if($rs=$conn->query($sql)){
                        $row=$rs->fetch_assoc();
                        if($row['per_gender'] == "Male"){
                            echo "him.&nbsp;";
                        
                        } elseif($row['per_gender'] == "Female"){
                            echo "her.&nbsp;";
                        
                        }}?></label><br><br><label>Given this&nbsp;<?php 
                        date_default_timezone_set('Asia/Manila');
                        echo date('F j, Y').".<br>";?></label>

    </div>
            <h6 class = "text-left fw-bold">Prepared by:</h6>
            <h6 class = "text-left">{{pname}}</h6>
            <h6 class = "text-left">{{ppos}}</h6>
            <h6 class = "fw-bold my-2">Noted by:</h6>
            <h6 class = "text-left">{{nname}}</h6>
            <h6 class = "text-left">{{npos}}</h6>
            <h6 class = "text-left my-2">OR#: {{or}}<br>Date Issued: {{di}}</h6>


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
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.ciw = "Cash In Words";
    $scope.ic = "In Cash";
    $scope.pname = "Name";
    $scope.ppos = "Position";
    $scope.nname = "Name";
    $scope.npos = "Position";
    $scope.or = "OR Number";
    $scope.di = "Date Issued";
});
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

