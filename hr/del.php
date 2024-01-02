<?php 
include("../dbconn.php");

if(isset($_GET["suid"])){
    $suid = $_GET["suid"];
    $id = $_GET["id"];

    $sql = "DELETE FROM studentunits WHERE suId = '$suid'";

    if (mysqli_query($conn, $sql)) {
        echo 'success';
        header('Location: accept.php?id=' . $id);
        
    } else {
        echo 'error';
    }

}

?>