<?php
// Start or resume the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['sid'])) {
    
    // do nothing
} else {
    // If the user is not logged in, redirect them to the login page
    header("Location: ap.php");
    exit();
}
?>


<div>
    <button>Enrollees</button>
    <button>Students</button>
    <button>Subjects</button>
    <button>Courses</button>
    <button></button>
</div>
<?php echo $_SESSION['pos'];?> ID: <?php echo $_SESSION['sid'];?>
<br>
<?php echo $_SESSION['pos'];?> Name: <?php echo $_SESSION['sfn']; echo' '; echo $_SESSION['sln']; ?>
