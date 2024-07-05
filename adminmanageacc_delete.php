<?php
session_start();
include('db_conn.php');

if(isset($_GET['id'])) {
	$id = $_GET['id'];

    $sql1 = "INSERT INTO srcms_users_rb (id, user_name, pass, name, user_type) SELECT id, user_name, pass, name, user_type FROM srcms_users WHERE id = '$id'";
    if($conn->query($sql1)){
        $sql = "DELETE FROM srcms_users WHERE id = '$id'";
        $conn->query($sql);
        header("Location: adminmanageacc.php?Record_Deleted");
    }
    else{
        header("Location: adminmanageacc.php?Record_NOT_Deleted");
    }
}
?>