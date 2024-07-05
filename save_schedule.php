<?php 
session_start();
$uid = $_SESSION['id'];
require_once('db_conn.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    if($_SESSION['user_type']=="Administrator"){
    echo "<script> alert('Error: No data to save.'); location.replace('./schedule.php') </script>";
    $conn->close();
    exit;
} elseif($_SESSION['user_type']=="Staff"){
    echo "<script> alert('Error: No data to save.'); location.replace('./schedule2.php') </script>";
    $conn->close();
    exit;
}
}
extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $sql = "INSERT INTO `srcms_schedule_list` (`user_id`,`title`,`description`,`start_datetime`,`end_datetime`) VALUES ('$uid','$title','$description','$start_datetime','$end_datetime')";
}else{
    $sql = "UPDATE `srcms_schedule_list` set `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
}
$save = $conn->query($sql);
if($save){
    if($_SESSION['user_type']=="Administrator"){
        echo "<script> alert('Schedule Successfully Saved.'); location.replace('./schedule.php') </script>";
    } elseif($_SESSION['user_type']=="Staff"){
        echo "<script> alert('Schedule Successfully Saved.'); location.replace('./schedule2.php') </script>";
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