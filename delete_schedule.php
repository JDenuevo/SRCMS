<?php 
session_start();
require_once('db_conn.php');
if(!isset($_GET['id'])){
    if($_SESSION['user_type']=="Administrator"){
        echo "<script> alert('Undefined Schedule ID.'); location.replace('./schedule.php') </script>";
        $conn->close();
        exit;
    } elseif($_SESSION['user_type']=="Staff"){
        echo "<script> alert('Undefined Schedule ID.'); location.replace('./schedule2.php') </script>";
    $conn->close();
    exit;
    }
}

$delete = $conn->query("DELETE FROM `srcms_schedule_list` where id = '{$_GET['id']}'");
if($delete){
    if($_SESSION['user_type']=="Administrator"){
        echo "<script> alert('Event has deleted successfully.'); location.replace('./schedule.php') </script>";
    } elseif($_SESSION['user_type']=="Staff"){
        echo "<script> alert('Event has deleted successfully.'); location.replace('./schedule2.php') </script>";
    }
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();

?>