<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password']) ) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = addslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);


	if (empty($uname)) {
		header("Location: login_form.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login_form.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM srcms_users WHERE user_name='$uname' AND pass='$pass'";

		if($rs=$conn->query($sql)){
			if($rs->num_rows > 0){
				$row = $rs -> fetch_assoc();
				$user_name = $row['user_name'];
            	$name = $row['name'];
            	$id = $row['id'];
				$user_type = $row['user_type'];
            if ($row['user_name'] === $uname && $row['pass'] === $pass && $row['user_type'] === "$user_type") {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
				$_SESSION['user_type'] = $row['user_type'];
				if ($row['user_type'] === "$user_type" && $row['user_type'] === "Administrator"){
            		header("Location: main_admin.php");
		        	exit();
				}elseif ($row['user_type'] === "$user_type" && $row['user_type'] === "Staff") {
					header("Location: staff_page.php");
		        	exit();
				}else{
                    header("Location: login_form.php?error=This Account does not have a User Type!");
                exit();
                }
            }else{
                header("Location: login_form.php?error=Incorect User name or password");
                exit();
            }
        }else{
            header("Location: login_form.php?error=Account does not Exist!");
            exit();
        }
	}else{
		header("Location: login_form.php");
	exit();
	}
}
}else{
	header("Location: login_form.php");
	exit();
}

