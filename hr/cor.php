<?php
include "../dbconn.php";
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform a SQL query to retrieve the teacher's name based on the ID
    $query = "SELECT * FROM studentdata inner join history on studentdata.studentId = history.id WHERE studentId = '$id'";
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
        

        $yearNow = date('Y');
        $yearNext = $yearNow + 1;
        $sy = $yearNow . ' - ' . $yearNext;
        $stuy = $row['studentYear'];
        $stus = $row['studentSemester'];
        $stut = $row['enrollType'];
        $stud = $row['enrollDate'];
        $dt = $row['date'];
        $bal = $row['studentBalance'];

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
    <title>COR - <?php echo $fn ?></title>
    
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <?php include ('../head.php'); ?>

    <style>
        .container{
            background-color: whitesmoke;
        }
        .hidden{
            display:none;
        }
        .g{
            display:none;
            visibility:hidden;
        }

        @media print {
  
#hide{
    display:none;
    
}

.g{
    display:block;
}

}
        
    </style>

</head>
<body>

<div class="container mt-4">


<div class="container d-flex justify-content-center">
<form action="#" method="post" enctype="multipart/form-data" style="width:75vw; min-width:750px;">
        
        <div class="row mt-4">
            <div class="col-md-1">
                <img src="../img/logo.png" style="width:100px; height:100px;" alt="">
            </div>

            <div class="col-md-11">
                <div class="text-center mt-2">
                    <h3><strong>SET - St. Elizabeth Global Skills Institute, Inc.</strong></h3>
                    <p>Maharlika Highway, Esguerra Dist., Talavera, Nueva Ecija</p>
                    <p>Tel. No.: (044) 334 1005 / 0927 224 1602</p>
                    <h3>Certificate of Registration</h3>
                    <p>School Year: <strong><?php echo $sy ?></strong></p>
                </div>    
            </div>
        <hr>
        </div>

        <div class="row">
            <div class="col-md-6">
                Student Id: <strong><?php echo $id ?></strong><br>
                Student Name: <strong><?php echo $fn ?></strong><br>
                
                Address: <strong><?php echo $pa ?></strong><br>
                Contact No.: <strong><?php echo $no ?></strong>
            </div>
            <div class="col-md-4">
                Date Enrolled: <strong><?php echo $stud?></strong><br>
                Enrollment Type: <strong><?php echo $stut ?></strong><br>
                Year: <strong><?php echo $stuy ?></strong><br>
                Semester: <strong><?php echo $stus ?></strong>
            </div>
            <div class="col-md-2">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" style="max-width: 100px; max-height: 100px; border: 1px solid #ccc; " />
            </div>
        </div> 

    <hr>

    <div class="row mt-4">
        <div class="row">
        <table id="my-table" class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="hidden">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Start</th>
                    <th scope="col">End</th>
                    <th scope="col">Day</th>
                </tr>
            </thead>
            <tbody>
                
                <?php

                    $sql = "SELECT * FROM `studentunits` inner join subjects on subjects.subjectId = studentunits.subjectId  inner join schedule on schedule.subjectId = subjects.subjectId where studentunits.studentId = '$id' order by `day`,`timeStart` asc";
                    
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td class="hidden"><?php echo $row["suId"] ?></td>
                        <td><?php echo $row['code'] ?> </td>
                        <td><?php echo $row["description"] ?></td>
                        <td><?php echo $row["timeStart"] ?></td>
                        <td><?php echo $row["timeEnd"] ?></td>
                        <td><?php echo $row['day']?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </div> 
    </div> 

    <div class="row mt-4">
            <div class="col-md-6">
                Remaining Balance: <strong>₱ <?php echo $bal ?></strong>
            </div>
        </div> 

<hr>

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <strong>For School Official:</strong>
        </div>

        <div class="text-center col-md-4">
            _______________________________<br>
            Office of Student Affairs
        </div>
        <div class="text-center col-md-4">
             _______________________________<br>
            Registrar
        </div>
        <div class="text-center col-md-4">
            _______________________________<br>
            Accounting
        </div>
    </div>

    <hr>

    <div class="row mt-4 mb-4">
        <div class="text-center col-md-4">
            <label for="" id="hidden" name="g" style="color:gray;">Not Valid Without Seal and Signature</label><br>
            
            <button onclick="window.print()" id="hide" class="btn btn-primary">Certificate of Registration</button>
        </div>
        <div class="text-center col-md-8">
            I promise to abide by all the rules and regulations of the school. <br><br>
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