<?php include("dbconn.php"); ?>

<?php 
if (isset($_GET['id'])) {
    
    $uname = $_GET["id"];

    $query = "SELECT * FROM `registrar` WHERE `regEmail` = '$uname'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch a row from the result set
        $row = mysqli_fetch_assoc($result);
        
        if ($row) {
            $unx = $row["regUn"];
            $emx = $row["regEmail"];
            $pwx = $row["regPw"];
            $rcx = $row["recovery"];
        } else {
            // Handle the case where no row is found
            echo "No user found with the specified email.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        form {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <form action="" method="post" class="mt-5">
        <h2 class="mb-4">Password Recovery</h2>

        <label for="user" class="form-label">Email</label>
        <input type="text" name="em" class="form-control mb-3" value="<?php echo $emx ?>">

        <label for="user" class="form-label">Username</label>
        <input type="text" name="user" class="form-control mb-3" value="<?php echo $unx ?>">

        <label for="rec" class="form-label">Recovery Code</label>
        <input type="text" name="rec" class="form-control mb-3">

        <label for="pass" class="form-label">New Password</label>
        <input type="text" name="pass" class="form-control mb-3">

        <input type="submit" name="Submit" value="Submit" class="btn btn-success">
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>

<?php 
if(isset($_POST['Submit'])) {

    $getEmail = $_POST['em'];
    $getUser = $_POST['user'];
    $getPass = $_POST['pass'];
    $getRec = $_POST['rec'];

    $sql = "select * from registrar where regEmail = '$getEmail' AND regUn = '$getUser' AND recovery = '$getRec' ";

    $result = mysqli_query($conn, $sql);

    if($result){
        $row = mysqli_fetch_assoc($result);

        if($row) {
            
            $query = "update registrar set regUn = '$getUser' , regPw = '$getPass' where regEmail = '$getEmail'";

            $res = mysqli_query($conn, $query);

            if($res){
                ?>
                <script>
                    alert('Account Updated.');
                    window.location.href = 'ap.php';
                </script>
                <?php
        }

        }
    } else {
        // Handle the case where the select query fails
        ?>
        <script>
            alert('Error in selecting user. Please try again.');
        </script>
        <?php
    }

}
?>
