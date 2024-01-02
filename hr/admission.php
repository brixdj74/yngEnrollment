<?php
include "../dbconn.php";
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform a SQL query to retrieve the teacher's name based on the ID
    $query = "SELECT *FROM studentdata WHERE studentId = '$id'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $fn = $row['firstName'] . ' ' . $row['middleName'] . ' ' . $row['lastName'] . ' ' . $row['suffix'];
        $bd = $row['birthDate'];
        $bp = $row['birthPlace'];
        $age = $row['age'];
        $cs = $row['civilStatus'];
        $pa = $row['presentAddress'];
        $em = $row['studentUsername'];
        $no = $row['contactNumber'];
        $r = $row['religion'];
        $sex = $row['gender'];
        $es = $row['employmentStatus'];
        $ffn = $row['fatherName'];
        $mfn = $row['motherName'];
        $sfn = $row['spouseName'];
        $hh = $row['householdNumber'];
        $elem = $row['elementary'];
        $eyg = $row['elemYear'];
        $hs = $row['highSchool'];
        $hsyg = $row['hsYear'];
        $c = $row['college'];
        $cyg = $row['collegeYear'];
        $cc = $row['collegeCourse'];
        $lsa = $row['lastSchool'];
        $lsac = $row['lsCourse'];
        $lsaa = $row['lsAddress'];
        $ac = $row['admissionCredential'];
        $mc = $row['medicalCondition'];
        $mcs = $row['conditionState'];
        $en = $row['emergencyName'];
        $eno = $row['emergencyNumber'];
        $ea = $row['emergencyAddress'];
        $er = $row['emergencyRelationship'];
        

        //for image

    } else {
        echo 'Student not found';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SET - <?php echo $fn ?></title>
    
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <?php include ('../head.php'); ?>

    <style>
        .container{
            background-color: whitesmoke;
        }
    </style>

</head>
<body>

<div class="container mt-4">


<div class="container d-flex justify-content-center">
<form action="" method="post" enctype="multipart/form-data" style="width:75vw; min-width:750px;">
        <div class="text-center mt-2">
            <h3><strong>PERSONAL DATA SHEET</strong></h3>
            <hr>
        </div>

    <div class="row mt-4">
        <div class="text-center mb-2">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" style="max-width: 100px; max-height: 100px; border: 1px solid #ccc; " />
        </div>
    </div> 

    <hr>

    <div class="row mt-4">
        <div class="col-md-6">
            Name: <u><?php echo $fn ?></u>
        </div>
        <div class="col-md-4">
            Birthdate: <u><?php echo $bd ?></u>
        </div>
        <div class="col-md-2">
            Age: <u><?php echo $age ?></u>
        </div>
    </div> 

    <div class="row mt-4">
        <div class="col-md-6">
            Birth Place: <u><?php echo $bp ?></u>
        </div>
        <div class="col-md-6">
            Civil Status: <u><?php echo $cs ?></u>
        </div>
    </div>

    <hr>

    <div class="row mt-4">
        <div class="col-md-12">
            Present Address: <u><?php echo $pa ?></u>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            Email Address: <u><?php echo $em ?></u>
        </div>
        <div class="col-md-4">
            Religion: <u><?php echo $r ?></u>
        </div>
        <div class="col-md-2">
            Gender: <u><?php echo $sex ?></u>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            Contact Number: <u><?php echo $no ?></u>
        </div>
        <div class="col-md-6">
            Employment Status: <u><?php echo $es ?></u>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            Father's Name: <u><?php echo $ffn ?></u>
        </div>
        <div class="col-md-6">
            Mother's Maiden Name: <u><?php echo $mfn ?></u>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            Spouse's Name (if married): <u><?php echo $sfn ?></u>
        </div>
        <div class="col-md-6">
            Household ID No. (if 4P's): <u><?php echo $hh ?></u>
        </div>
    </div>

    <hr>

    <div class="row mt-4">
        <div class="col-md-6">
            Elementary: <u><?php echo $elem ?></u>
        </div>
        <div class="col-md-6">
            Year Graduated: <u><?php echo $eyg ?></u>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            High School: <u><?php echo $hs ?></u>
        </div>
        <div class="col-md-6">
            Year Graduated: <u><?php echo $hsyg ?></u>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            College: <u><?php echo $c ?></u>
        </div>
        <div class="col-md-4">
            Year Graduated: <u><?php echo $cyg ?></u>
        </div>
        <div class="col-md-2">
            Course: <u><?php echo $cc ?></u>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            Last School Attended: <u><?php echo $lsa ?></u>
        </div>
        <div class="col-md-6">
            Course/Strand: <u><?php echo $lsac ?></u>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            Address of Last School Attended: <u><?php echo $lsaa ?></u>
        </div>
        <div class="col-md-6">
            Admission Credential: <u><?php echo $ac ?></u>
        </div>
    </div>

    <hr>

    <div class="row mt-4">
        <div class="col-md-6">
            Do you have any medical condition that may warrant attention? <u><?php echo $mc ?></u>
        </div>
        <div class="col-md-6">
            If Yes, Please state particulars: <u><?php echo $mcs ?></u>
        </div>
    </div>

    <hr>

    <div class="row mt-2">
        <p>Person to contact in case of emergency:</p>
    </div>

    <div class="row mt-2">
        <div class="col-md-6">
            Name: <u><?php echo $en ?></u>
        </div>
        <div class="col-md-6">
            Contact Number: <u><?php echo $eno ?></u>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            Address: <u><?php echo $ea ?></u>
        </div>
        <div class="col-md-6">
        Relationship: <u><?php echo $er ?></u>
        </div>
    </div>
<hr>
    <div class="row mt-4 mb-4">
        <div class="col-md-4">
            <button onclick="window.print()" class="btn btn-primary">Print Auto Generated PDS</button>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            _______________________________<br>
            Signature over printed name
        </div>
    </div>


</div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>