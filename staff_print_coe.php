<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {
	if($_SESSION['user_type'] == "Staff"){

 ?>
 <!DOCTYPE html>
<html>
<title>Staff Print COE | SR&CMS</title>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/admin_print_report.css">
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<body>

            <div id="print-logo">

                <div class = "btnback">
                    <a href="staffviewrec.php"><button>BACK</button>
                    </a>
                </div>

                <div id="right-corner">
                    <div class="btnprint" onload="refresh();">
                    <button onclick="printContent('print')" id = "hit">PRINT REPORT</button>
                    </div>
                </div>

			</div>

        <div class = "pera" ng-app="myApp" ng-controller="myCtrl">
        Fill these Fields<br><br>
        Cash In Words: <input ng-model="ciw"> In Cash: <input ng-model="ic">     <br><br>
        Prepared by: <br>
        Name: <input ng-model="pname"> Position: <input ng-model="ppos"> <br><br>
        Noted by:<br>
        Name: <input ng-model="nname"> Position: <input ng-model="npos"> <br><br>
        Other Details:<br>
        Or Number: <input ng-model="or"> Date Issued: <input ng-model="di"> <br><br>


<div id="print">

            <div style ="text-align: left;"><?php
            date_default_timezone_set('Asia/Manila');
            echo date('F j, Y  '). "<br>"; echo date('g:i:a')
            ?></div>


        <div id="print-logo">
          <div id="left-caloocan"><img src="photos/caloocan.png"></div>
            <div id="mid-texts">
            <h2>UNIVERSITY OF CALOOCAN CITY</h2> <br>
            <label>(Formerly Caloocan City Polytechnic College)<br>
              Biglang Awa St. cor. Cattleya St. 12th Avenue East, Caloocan City<br>
              Tel. No. 5310-6581</label> <br>  <br>
            </div>
            <div id="right-uccnian"><img src="photos/ucclogo.png"></div>
        </div>

        
    
        

<div class = "certificate-form">
    <div class="cert-form-header">
        <strong><label>____________________________________________________________________________________________________________________________________________________________________________________________________</label></strong>
        <br> <br>
        <h1>CERTIFICATION</h1>
        <br> <br> <br> <br>
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

        <h2 style ="text-align: left;"> TO WHOM IT MAY CONCERN</h2>
    </div>
</div>

<center>
<div class = "cert-form-body">
    <br> <br>
<label>This is to certify that <Strong><h3 style=" text-decoration: underline; display:inline;">Prof. <?php echo $row['per_firstname']." ".$row['per_middlename']." ".$row['per_lastname'];?></Strong></h3> is connected in</h3><?php }}?>
<br><label>the University of Caloocan City since </label>
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
            <label><?php echo $cttime?> to <?php echo $ctdue?> as a part-time</label><br>  <?php }}}?>
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

    <label style=" text-decoration: underline; display:inline;">{{ciw}}((₱{{ic}}))</label><label>&nbsp;per hour.</label><br><br>

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
               }?></label><label>&nbsp;for whatever legal purposes&nbsp;<br>it may serve&nbsp;<?php 
                
                $sql = "SELECT * FROM srcms_tbl_personnel WHERE per_id={$_GET['per_id']}";
                if($rs=$conn->query($sql)){
                    $row=$rs->fetch_assoc();
                     if($row['per_gender'] == "Male"){
                         echo "him.&nbsp;";
                       
                     } elseif($row['per_gender'] == "Female"){
                         echo "her.&nbsp;";
                       
                     }}?></label><br><br><label>Given this&nbsp;<?php 
                     date_default_timezone_set('Asia/Manila');
                     echo date('F j, Y').".<br>";?></label><br><br><br>

<h6 style="text-align: left;"> Prepared by:</h5><br><br>
<h3 style="text-align: left;">{{pname}}</h2>
<h6 style="text-align: left;">{{ppos}}</h5><br><br><br>
<h6 style="text-align: left;"> Noted:</h5><br><br>
<h3 style="text-align: left;">{{nname}}</h2>
<h6 style="text-align: left;">{{npos}}</h5><br>
<p style="text-align: left; font-size: 13px">OR#: {{or}}<br>Date Issued: {{di}}</p>

</div>



</div>
<br><br>
      


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

