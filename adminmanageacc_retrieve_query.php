<?php
session_start();
include('db_conn.php');

if(isset($_POST['retrieve'])) {
	$id = $_POST['id'];

    $sql1 = "INSERT INTO srcms_users (id, user_name, pass, name, user_type) SELECT id, user_name, pass, name, user_type FROM srcms_users_rb WHERE id = '$id'";
    if($conn->query($sql1)){
        $sql = "DELETE FROM srcms_users_rb WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
        header("Location: adminmanageacc.php?ACCOUNT_RETRIEVE");
    }
    else{
        header("Location: adminmanageacc.php?ACCOUNT_ERROR");
    }
}
?>