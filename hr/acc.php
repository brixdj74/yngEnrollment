<?php include '../dbconn.php';?>

<?php 

    $sql = "SELECT * FROM `registrar`";

    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $id = $row["regId"];
        $fn = $row["regFn"];
        $mn = $row["regMn"];
        $ln = $row["regLn"];
        $sf = $row["regSf"];
        $bd = $row["regBdate"];
        $ad = $row["regAddress"];
        $cn = $row["regNumber"];
        $em = $row["regEmail"];
        $un = $row["regUn"];
        $pw = $row["regPw"];
        $po = $row["position"];
    }

?>

<?php 

    if(isset($_POST["save"])){
        $fn = $_POST["fn"];
        $mn = $_POST["mn"];
        $ln = $_POST["ln"];
        $sf = $_POST["sf"];
        $bd = $_POST["bd"];
        $ad = $_POST["ad"];
        $cn = $_POST["cn"];
        $em = $_POST["em"];
        $un = $_POST["un"];
        $pw = $_POST["pw"];
        $po = $_POST["po"];
        $id = $_POST["id"];

        $sql = "update registrar set regFn='$fn',regMn='$mn',regLn='$ln',regSf='$sf',regBdate='$bd',regAddress='$ad',regNumber='$cn',regEmail='$em',regUn='$un',regPw='$pw',position='$po' where regId = '$id'";

        $result = mysqli_query($conn, $sql);
 
        if ($result) {
        header("Location: acc.php?msg=Success");
        
        } else {
        echo "Failed: " . mysqli_error($conn);
        header("Location: acc.php?msg=Failed");
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="home.css">
    <title>YNG Account</title>
    <style>

        .hidden{
            display:none;
        }

        .btn {
            background-color: white;
            color: black;
        }

        body {
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"%3E%3Cpath fill="%230099ff" fill-opacity="0.25" d="M0,0L48,10.7C96,21,192,43,288,69.3C384,96,480,128,576,149.3C672,171,768,181,864,176C960,171,1056,149,1152,128C1248,107,1344,85,1392,74.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"%3E%3C/path%3E%3C/svg%3E');
            background-size: cover;
            background-position: center;
            padding: 50px;
            color: white;
        }

        a {
            color: black;
        }

        .container {
            position: absolute;
            top: 50px;
            color: black;
        }

        hr {
            width: 50vw;
            background-color: black;
            color: black;
        }

        h1 {
            text-align: center;
            color: black;
        }

        .form-label {
            color: black;
        }
    </style>
</head>

<body>

<a href="home.php">Back</a>

    <div class="container mt-2">
        
      <div class="container d-flex justify-content-center"> 
     
    <form action="" method="POST" style="width:50vw; min-width:300px;" onsubmit="return confirmSave();">
    <h1>Account Information</h1>
    
    <hr>

        <div class="row mt-2">
            <div class="col-md-3">
                <label for="fn" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fn" name="fn" value="<?php echo $fn ?>">
            </div>
            <div class="col-md-3">
                <label for="mn" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="mn" name="mn" value="<?php echo $mn ?>">
            </div>
            <div class="col-md-3">
                <label for="ln" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="ln" name="ln" value="<?php echo $ln ?>">
            </div>
            <div class="col-md-3">
                <label for="sf" class="form-label">Suffix</label>
                <input type="text" class="form-control" id="sf" name="sf" value="<?php echo $sf ?>">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3">
                <label for="mn" class="form-label">Birth Date</label>
                <input type="date" class="form-control" id="bd" name="bd" value="<?php echo $bd ?>">
            </div>
            <div class="col-md-3">
                <label for="ln" class="form-label">Position</label>
                <input type="text" class="form-control" id="po" name="po" value="<?php echo $po ?>">
            </div>
            <div class="col-md-6">
                <label for="mn" class="form-label">Email</label>
                <input type="email" class="form-control" id="em" name="em" value="<?php echo $em ?>">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="fn" class="form-label">Address</label>
                <input type="text" class="form-control" id="ad" name="ad" value="<?php echo $ad ?>">
            </div>
            
            <div class="col-md-6">
                <label for="ln" class="form-label">Number</label>
                <input type="text" class="form-control" id="cn" name="cn" value="<?php echo $cn ?>">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3">
                <label for="fn" class="form-label">Username</label>
                <input type="text" class="form-control" id="un" name="un" value="<?php echo $un ?>">
            </div>
            <div class="col-md-3">
                <label for="mn" class="form-label">Password</label>
                <input type="password" class="form-control" id="pw" name="pw" value="<?php echo $pw ?>">
            </div>
            <div class="hidden">
                <label for="mn" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id ?>">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-3">
                <label for="mn" class="form-label"> </label>
                <input type="submit" class="form-control" id="mn" name="save">
            </div>
        </div>
        </form>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
    function confirmSave() {
        var p1 = document.getElementsByName("pw");
        var confirmation = confirm("Are you sure you want to save?");
        return confirmation;
    }
</script>
</body>
</html>
