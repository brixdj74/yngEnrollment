<?php
include '../dbconn.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

        $sql = "DELETE FROM subjects WHERE subjectId = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo 'success';
            sleep(1);
            header("Location: sub.php");
        } else {
            echo 'error';
        }
    }
?>
