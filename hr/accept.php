<?php
include "../dbconn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform a SQL query to retrieve the teacher's name based on the ID
    $query = "SELECT * FROM studentdata inner join course on course.courseId = studentdata.courseId WHERE studentId = '$id'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $idnya = $row['studentId'];
        $fn = $row['firstName'] . ' ' . $row['middleName'] . ' ' . $row['lastName'] . ' ' . $row['suffix'];
        $bd = $row['birthDate'];
        $bp = $row['birthPlace'];
        $age = $row['age'];
        $cs = $row['civilStatus'];
        $pa = $row['presentAddress'];
        $em = $row['studentUsername'];
        $pw = $row['studentPassword'];
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
        $cCou = $row['course'];
        $cDeg = $row['degree'];
        $cId = $row['courseId'];
        $cy = $cDeg . ' in ' . $cCou ;
        $stuy = $row['studentYear'];
        $stus = $row['studentSemester'];
        $stut = $row['enrollType'];


        $yearNow = date('Y');
        $yearNext = $yearNow + 1;
        $sy = $yearNow . ' - ' . $yearNext;
        //for image

    } else {
        echo 'Student not found';
    }
}

if (isset($_POST['autoAdd'])) {
    try {
        $autoCourse = $cId;
        $autoYear = $stuy;
        $autoSem = $stus;

        $sql = "SELECT subjects.*, schedule.* FROM subjects inner join schedule on schedule.subjectId = subjects.subjectId WHERE subjects.courseId = '$autoCourse' AND yearLevel = '$autoYear' AND subjects.semester = '$autoSem'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

            $getSub = $row['subjectId'];
            $status = "Active";
            $getSched = $row['scheduleId'];
            $sql1 = "INSERT INTO `studentunits` (`year`, `semester`, `status`, `studentId`, `subjectId`,`scheduleId`) VALUES ('$autoYear', '$autoSem', '$status', '$id', '$getSub','$getSched')";

            if (mysqli_query($conn, $sql1)) {
                header("refresh: accept.php?id='$id'"); 
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['saveMo'])) {
    try {
            $tp = $_POST['tp'];
            $yr = $_POST['year'];
            $sm = $_POST['sem'];

            //UPDATE schedule SET column1 = '$newData1', column2 = '$newData2' WHERE scheduleId = $id
            $sql = "update `studentdata` set `studentYear`= '$yr', `studentSemester`='$sm', `enrollType`='$tp' where studentId = '$id'";

            if (mysqli_query($conn, $sql)) {
                header("refresh:2; accept.php?id=$id"); 
            } else {
                echo "Error: " . mysqli_error($conn);
            }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['savePay'])) {
    try {
            $fee = $_POST['fee'];
            $pay = $_POST['pay'];
            $bal = $_POST['bal'];

            $his = 'pay the amount of '.  $pay . ', your remaining balance is ' . $bal . '.';

            //UPDATE schedule SET column1 = '$newData1', column2 = '$newData2' WHERE scheduleId = $id
            $sql = "update `studentdata` set `studentBalance`= '$bal' , `enrollmentStatus` = 'Enrolled' , `enrollDate` = NOW() where studentId = '$id'";

            if (mysqli_query($conn, $sql)) {
                $sql1 = "insert into `history` (`id`,`record`,`date`) values ('$id','$his',NOW())";
                if (mysqli_query($conn, $sql1)) {

                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = 'setsystem.v1@gmail.com';
                    $mail->Password = 'tacwtpwmbrguopkh';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                    
                    $mail->setFrom('setsystem.v1@gmail.com');
                    $mail->addAddress($em);
            
                    $subject = "Welcome to SET!";
                
                    $emailMessage = "Dear $fn,\n\n";
                    $emailMessage .= "Thank you for your application to St. Elizabeth Global Skills Institute, Inc.\n";
                    $emailMessage .= "You are now officially enrolled at SET, you can now access your COR at our Website!\nJust use the Username and Password below, and you can view your COR.\n\n";
                    $emailMessage .= "General Information:\n";
                    $emailMessage .= "Student ID: $idnya \n";
                    $emailMessage .= "Full Name: $fn\n";
                    $emailMessage .= "Course: $cCou\n";
                    $emailMessage .= "Username: $em\n";
                    $emailMessage .= "Password: $pw\n\n";
                
                    $emailMessage .= "\nLET US SET YOUR FUTURE, THANK YOU!";
                
                    $mail->Body = ($emailMessage);
            
                    $mail->send();

                } else {
                    echo "Error: " . mysqli_error($conn);
                }
                header("refresh:1; cor.php?id=$id"); 
            } else {
                echo "Error: " . mysqli_error($conn);
            }

           
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission - <?php echo $fn ?></title>
    
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
    </style>

</head>
<body>

<div class="container mt-4">


<div class="container d-flex justify-content-center">
<form action="" method="post" enctype="multipart/form-data" style="width:75vw; min-width:750px;">
        <div class="text-center mt-2">
            <h3><strong>SET - St. Elizabeth Global Skills Institute, Inc.</strong></h3>
            <p>Maharlika Highway, Esguerra Dist., Talavera, Nueva Ecija</p>
            <p>Tel. No.: (044) 334 1005 / 0927 224 1602</p>
            <hr>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                School Year: <strong><?php echo $sy ?></strong>
            </div>
            <div class="col-md-6">
                Course: <strong><?php echo $cy ?></strong>
            </div>

        </div> 

        <div class="row mt-4">

            <div class="col-md-3">
                <label for="tp">Enrollment type:</label>
                <select class="form-select" name="tp" id="tp" required>
                    <option value=" ">Please select</option>
                    <option value="4P's">4P's</option>
                    <option value="Regular">Regular</option>
                    <option value="Irregular">Irregular</option>
                    <option value="LGU">LGU</option>
                </select>
            </div>

            <div class="col-md-3">
                Year:
                <select class="form-select" name="year" id="year" required>
                    <option value="1">First (1)</option>
                    <option value="2">Second (2)</option>
                    <option value="3">Third (3)</option>
                    <option value="4">Fourth (4)</option>
                </select>
            </div>

            <div class="col-md-3">
                Semester:
                <select class="form-select" name="sem" id="sem" required>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for=""></label>
            <button id="saveMo" name="saveMo" type="submit" class="form-control">Save</button>
        </div>

        </div> 

        <hr>

        <div class="row mt-4">
        <div class="col-md-12">
            <p style="color:gray;">*Save enrollment type, year, and semester first before adding units.</p>
            <button id="autoAdd" name="autoAdd" type="submit" class="btn btn-primary">Auto Add Units</button>
            <a target="_blank" class="btn btn-primary" href="manual.php?id=<?php echo $idnya; ?>">Manual Add Units</a>
        </div>
        </div> 

    <div class="row mt-4">
        <table id="my-table" class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="hidden">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Time Start</th>
                    <th scope="col">Time End</th>
                    <th scope="col">Day</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php

                    $sql = "SELECT * FROM `studentunits` inner join subjects on subjects.subjectId = studentunits.subjectId  inner join schedule on schedule.subjectId = subjects.subjectId inner join employee on employee.employeeId = schedule.employeeId where studentunits.studentId = '$id' order by `suId` asc";
                    
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
                        <td><?php echo $row["efirstName"] . ' ' . $row['elastName'] . ' ' . $row['eSuffix'] ?> </td>
                        <td>
                            <a href="del.php?suid=<?php echo $row['suId'] ?>&id=<?php echo $idnya ?>" class="link-dark" onclick="return confirm('Confirm Delete?');"><i class="fa-solid fa-times fs-5 me-3 text-danger"></i></a></td>
                        </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div> 

    <hr>

    <div class="row mt-2">

        <div class="text-center mt-2">
            <h3><u>Summary</u></h3>
        </div>
        <div class="col-md-3">
            Name:
            <input type="text" class="form-control" value="<?php echo $fn ?>" readonly>
        </div>
        <div class="col-md-3">
            Enrollment Type:
            <input type="text" class="form-control" value="<?php echo $stut ?>" readonly>
        </div>
        <div class="col-md-3">
            Year:
            <input type="text" class="form-control" value="<?php echo $stuy ?>" readonly>
        </div>
        <div class="col-md-3">
            Semester:
            <input type="text" class="form-control" value="<?php echo $stus ?>" readonly>
        </div>
    </div>

    <hr>
        
    <div class="row mt-4 mb-4">
        <div class="col-md-3">
        Tuition Fee:
        <input type="number" class="form-control" id="fee" name="fee">
        </div>
        <div class="col-md-3">
        Enter Partial/ Full Payment:
        <input type="number" class="form-control" id="pay" name="pay">
        </div>
        <div class="col-md-3">
        Remaining Balance:
        <input type="number" class="form-control" id="bal" name="bal" readonly>
        </div>
    </div>

    <hr>

    <div class="row mt-4 mb-4">
        <div class="text-center">
            <button id="savePay" name="savePay" type="submit" class="btn btn-primary">Save Payment</button>
        </div>
    </div>


</div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script>
// Get references to the fee, payment, and balance input fields
const feeInput = document.getElementById("fee");
const paymentInput = document.getElementById("pay");
const balanceInput = document.getElementById("bal");

// Add an event listener to calculate the balance when fee or payment changes
feeInput.addEventListener("input", calculateBalance);
paymentInput.addEventListener("input", calculateBalance);

// Function to calculate the remaining balance
function calculateBalance() {
    const tuitionFee = parseFloat(feeInput.value) || 0; // Get tuition fee, default to 0
    const payment = parseFloat(paymentInput.value) || 0; // Get payment, default to 0

    const remainingBalance = tuitionFee - payment;
    balanceInput.value = remainingBalance.toFixed(2); // Display the remaining balance
}
</script>

</body>
</html>
