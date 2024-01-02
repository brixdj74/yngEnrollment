<?php include 'dbconn.php'; ?>
<?php include 'mail.php'; ?>

<?php

if (isset($_POST['a'])) {
    $un = $_POST['aun'];
    $pw = $_POST['apw'];

    // Perform a SQL query to check the username and password
    $query = "SELECT * FROM `registrar` WHERE `regUn` = '$un' AND `regPw` = '$pw'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        
        $_SESSION["sid"] = $row["regId"];
        $_SESSION['pos'] = $row['position'];
        $_SESSION['sfn'] = $row['regFn'];
        $_SESSION['sln'] = $row['regLn'];

        if($_SESSION['pos'] == 'Registrar') {
            header("Location: hr/home.php");
        }
        else{
            header("location: ap.php?error=Not Registrar Account");
        }    
    } else {
        $error = "Invalid username or password";
    }
}
?>

<?php
if (isset($_POST['i'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform a SQL query to check the username and password
    $query = "SELECT * FROM account WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login successful, redirect to index.php
        header("Location: ap.php");
        exit();
    } else {
        $error = "Invalid username or password"; // Set an error message
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YNG Access Point</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/finale.css">
    <link rel="stylesheet" href="assets/css/ap.css">
</head>
<body>

<!-- BUBBLES -->
<div class="bubbles" style="top: 5%; left: 5%;"></div>
<div class="bubbles" style="top: 25%; left: 45%;"></div>
<div class="bubbles" style="top: 55%; left: 75%;"></div>
    

<!-- LOG IN FORM -->
<section class="wrapper">

<div class="form signup">

<?php
    if (isset($error)) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: red; background-color: white;">
            ' . $error . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" style="color: red;" aria-label="Close"></button>
        </div>';
    }
?>

<header>Log In as Registrar</header>
<form action="" method="post">
  <input type="text" name="aun" id="aun" placeholder="Username" required />
  <input type="password" name="apw" id="apw" placeholder="Password" required />
  <button type="submit" name="a">Log In</button>
</form>
</div>
<div class="form login">
<header>Forgot Password</header>
<form action="" method="post">
  <input type="text" name="iun" id="iun" placeholder="Enter Email" required/>
  <p class="b">Once email is check and found, you will receive an email that has a recovery code. That code will be the way for you to recover your accout.</p>
  <button type="submit" name="rec">Send Recovery Code</button>
</form>
</div>

      <script>
        const wrapper = document.querySelector(".wrapper"),
          signupHeader = document.querySelector(".signup header"),
          loginHeader = document.querySelector(".login header");
        loginHeader.addEventListener("click", () => {
          wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
          wrapper.classList.remove("active");
        });
      </script>
    </section>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>

