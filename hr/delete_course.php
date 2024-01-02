<?php
include '../dbconn.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

        $sql = "DELETE FROM course WHERE courseId = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo 'success';
            sleep(1);
            header("Location: cou.php");
        } else {
            echo 'error';
        }
    }
?>
