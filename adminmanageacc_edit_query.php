<?php
session_start();
include('db_conn.php');
session_start();
$_SESSION['msg'] = "";
if(isset($_POST['update'])) {
	$id = $_POST['id'];
	$user_name = $_POST['user_name'];
    $pass = $_POST['pass'];
    $newpass = $_POST['newpass'];
    $repass = $_POST['repass'];
    $name = $_POST['name'];
    $user_type = $_POST['user_type'];

    if($newpass !== $repass){
        $_SESSION['msg'] = "THE NEW PASSWORD AND RETYPE PASSWORD IS NOT THE SAME";	
        header("Location: adminmanageacc_edit.php?id=$id");	
	}
    else{
    $newpass = md5($newpass);
	$query = "UPDATE srcms_users SET `user_name`='$user_name',`pass`='$newpass',`name`='$name',`user_type`='$user_type' WHERE id = '$id'";
	if($conn->query($query)){
	    header("location: adminmanageacc.php?update=User_Updated_Successfully");
     }
    }
}
?>