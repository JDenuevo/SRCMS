<?php 
session_start();
include ('db_conn.php');
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_type'])) {
	if($_SESSION['user_type'] == "Staff"){
		
		$tnocr =0;
		$tderm =0;
		$tderf =0;
		$tyron = 0;
		$sql = "SELECT * FROM srcms_tbl_personnel";
		if($rs=$conn->query($sql)){
			if($rs->num_rows>=0){
			$row=$rs->num_rows;
			$tnocr= $row;
			$quer = "SELECT * FROM srcms_tbl_personnel WHERE per_gender = 'Male'";
			if($aw=$conn->query($quer)){
				if($aw->num_rows>=0){
				$gg=$aw->num_rows;
				$tderm= $gg;
				$ss2 = "SELECT * FROM srcms_tbl_personnel WHERE per_gender = 'Female'";
				if($wa=$conn->query($ss2)){
					if($wa->num_rows>=0){
					$wp=$wa->num_rows;
					$tderf= $wp;
					$ss3 = "SELECT * FROM srcms_tbl_personnel_rb";
					if($ga=$conn->query($ss3)){
						if($ga->num_rows>=0){
						$cc=$ga->num_rows;
						$tyron= $cc;
				

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Staff Home Page | SR&CMS</title>
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/user_page.css">
	<link rel="stylesheet" href="css/effect.css">
	<link rel="icon" href="photos/logo.ico">
	<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
	<script src="fullcalendar/lib/jquery.min.js"></script>
	<script src="fullcalendar/lib/moment.min.js"></script>
	<script src="fullcalendar/fullcalendar.min.js"></script>
	<script src="js/sweetalert.min.js"></script>

<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
		disableDragging: true,
        editable: true,
        events: "fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
						location.reload(); 
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
		eventClick: function (event) {
            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this event!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            swal("Poof! Your Event has been deleted!", {
                });
                        }
                    }
                });
              
            } else {
                swal("Your file is safe!");
            }
            });
           
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>

</head>
<body>
	
	<header>

		<nav>
		<h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
			<div class="menu">
			<a href="staff_page.php">Home</a>
				<a href="staffaddrec.php">Add Personnel Record</a>
				<a href="staffviewrec.php">View Personnel Record List</a>
                <a href="logout.php">Logout</a>
			</div>

			<button class="hamburger">
				<span class="material-icons">menu</span>
			</button>
		</nav>

		<div class="mobile-menu">
		<a href="staff_page.php">Home</a>
				<a href="staffaddrec.php">Add Personnel Record</a>
				<a href="staffviewrec.php">View Personnel Record List</a>
                <a href="logout.php">Logout</a>
		</div>
	</header>
	<script src="js/userpage.js"></script>


	<div class="home-details">

		<div class="home-content-pic">
			<img src="photos/ucclogo.png">
			<span>_________________________</span>
		</div>

		<div class="home-content-details">
			<div class="home-title">
				<h1>HR DEPARMENT</h1>
			</div>
			<div class="home-body"> <br>
			<h4>Secured, Managed, User Friendly, Availability, Integrity, Confidentiality, and Traceability</h4> <br>
			<label>We protect what matters.</label> <br> <br>
			<h4>UCC HUMAN RESOURCES DEPARTMENT.</h4>  
			</div>
		</div>

	</div>

	<div class="home-details">

		
			<br>
			<a href="schedule2.php">
          <button type="button">
          VIEW CALENDAR
          </button>
        </a>
		<br>
		<div class="home-content-box">
			<div class="home-content-boxes">
			<a href="staffviewrec.php">
				<h4>Number of Current Records</h4>
				<img id = "box" src="photos/document.png"> <br>
				<label><?php echo $tnocr; ?></label></a>
			</div>

			<div class="home-content-boxes">
			<a href="staff_report_rb.php">
				<h4>Number of Past Records</h4>
				<img id = "box" src="photos/file.png"> <br>
				<label><?php echo $tyron; ?></label></a>
			</div>

			<div class="home-content-boxes">
			<a href="staffviewrec.php">
				<h4>Number of Male Professors</h4>
				<img id = "box" src="photos/man.png"> <br>
				<label><?php echo $tderm; ?></label></a>
			</div>

			<div class="home-content-boxes">
			<a href="staffviewrec.php">
				<h4>Number of Female Professors</h4>
				<img id = "box" src="photos/woman.png"> <br>
				<label><?php echo $tderf; ?></label></a>
			</div>
		</div>

	</div>

	<div class="footer">
		<label>University of Caloocan City | South Campus</label> <br>
		<label>Biglang Awa St Cor 11th Ave Catleya, East Grace Park, Caloocan</label>
	</div>

</body>
</html>

<?php 
}}}}}}}}
}else{
     header("Location: login_form.php");
     exit();
}
}else{
	header("Location: login_form.php");
	exit();
}
 ?>