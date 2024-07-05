<?php
session_start();
include ('db_conn.php');
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type']) ) {
    $uid = $_SESSION['id'];
	if(($_SESSION['user_type'] == "Staff")){?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Home Page | SR&CMS</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">

<!--Main Page CSS-->
<link rel="stylesheet" href="css/schedule.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap/bootstrap.css">

<!-- Calendar CSS -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./fullcalendar/lib/main.min.css">


<script src="./js2/jquery-3.6.0.min.js"></script>
<script src="./js2/bootstrap.min.js"></script>
<script src="./fullcalendar/lib/main.min.js"></script>

</head>

<body class="bg-light">

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
				<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 link-light rounded" href="logout.php"><img class = "img-fluid" id = "navicons" src = "photos/staff.png"> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<br> <br>

    <a href="staff_page.php">
    <button class = "btn btn-secondary ms-2" id = "btnback" type="button">
        <img class = "img-fluid" id = "navicons" src = "photos/back.png">
        BACK
    </button>
    </a>  
<!--  END NUNG BUTTON -->

<div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div class = "p-2" id="calendar"></div>   
            </div>
            <div class="col-md-3">
                <div class="cardt rounded shadow">
                    <div class="card-header bg-gradient bg-success rounded text-light">
                        <h5 class="card-title text-center p-2">Schedule Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded" name="title" id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded" name="description" id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded" name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div><br>
                    <div class="card-footer">
                        <div class="text-center ">
                            <button class="btn btn-success btn-sm rounded" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-secondary border btn-sm rounded" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded">
                <div class="modal-header rounded">
                    <h5 class="modal-title ms-2">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded" id="edit" data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded" id="delete" data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

<?php 
$schedules = $conn->query("SELECT * FROM `srcms_schedule_list` WHERE user_id = '$uid'");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js2/script.js"></script>

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