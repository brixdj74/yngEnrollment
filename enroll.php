<?php
include 'dbconn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['enroll'])) {

    $sid = $_POST['sid'];
    $fn = $_POST['fn'];
    $mn = $_POST['mn'];
    $ln = $_POST['ln'];
    $sf = $_POST['sf'];
    $bd = $_POST['bd'];
    $age = $_POST['age'];
    $bp = $_POST['bp'];
    $r = $_POST['r'];
    $pa = $_POST['pa'];
    $no = $_POST['no'];
    $es = $_POST['es'];
    $hh = $_POST['hh'];
    $ffn = $_POST['ffn'];
    $mfn = $_POST['mfn'];
    $sfn = $_POST['sfn'];
    $elem = $_POST['elem'];
    $eyg = $_POST['elemyg'];
    $hs = $_POST['hs'];
    $hsyg = $_POST['hsyg'];
    $c = $_POST['c'];
    $cyg = $_POST['cyg'];
    $cc = $_POST['cc'];
    $lsa = $_POST['lsa'];
    $lsac = $_POST['lsac'];
    $lsaa = $_POST['lsaa'];
    $ac = $_POST['ac'];
    $mc = $_POST['mc'];
    $mcs = $_POST['mcs'];
    $en = $_POST['en'];
    $eno = $_POST['eno'];
    $ea = $_POST['ea'];
    $er = $_POST['er'];
    $pc = $_POST['pc'];
    $em = $_POST['em'];
    $pw = $_POST['pw'];
    $status = "Pending";
    $sex = $_POST['sex'];
    $cs = $_POST['cs'];
    
    // Perform a SQL query to insert the image content into the database
    
    $sql = "INSERT INTO `studentdata` (`studentId`, `firstName`, `middleName`, `lastName`, `suffix`, `birthDate`, `age`, `birthPlace`, `religion`, `presentAddress`,
                    `contactNumber`, `employmentStatus`, `householdNumber`, `fatherName`, `motherName`, `spouseName`, `elementary`, `elemYear`, `highSchool`, `hsYear`,
                    `college`, `collegeYear`, `collegeCourse`, `lastSchool`, `lsCourse`, `lsAddress`, `admissionCredential`, `medicalCondition`, `conditionState`,
                    `emergencyName`, `emergencyNumber`, `emergencyAddress`, `emergencyRelationship`, `courseId`, `studentUsername`,`studentPassword`,`enrollmentStatus`,`gender`,`civilStatus`) 
                    VALUES ('$sid', '$fn', '$mn', '$ln', '$sf', '$bd', '$age', '$bp', '$r','$pa', '$no', '$es', '$hh', '$ffn', '$mfn', '$sfn', '$elem', '$eyg', '$hs', '$hsyg', '$c', '$cyg', '$cc', '$lsa', '$lsac', '$lsaa', '$ac', '$mc','$mcs', '$en', '$eno', '$ea', '$er', '$pc', '$em','$pw', '$status','$sex','$cs')";
    
    if (mysqli_query($conn, $sql)) {

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

        $subject = "SET Enrollment";
    
        $emailMessage = "Dear $fn,\n\n";
        $emailMessage .= "Thank you for your application to St. Elizabeth Global Skills Institute, Inc.\n";
        $emailMessage .= "Your Student Application has been successfully uploaded!\n\n";
        $emailMessage .= "General Information:\n";
        $emailMessage .= "Student ID: $sid\n";
        $emailMessage .= "Full Name: $fn $mn $ln $sf\n";
        $emailMessage .= "Course: $pc\n";
        $emailMessage .= "Username: $em\n";
        $emailMessage .= "Password: $pw\n\n";
    
        $emailMessage .= "Please submit the following requirements:\n";
        $emailMessage .= "PSA Birth Certificate\n";
        $emailMessage .= "F137/ TOR (Original)\n";
        $emailMessage .= "Diploma\n";
        $emailMessage .= "Good Moral Certificate (Original)\n";
        $emailMessage .= "Marriage Certificate (Original)\n";
        $emailMessage .= "Barangay Indigency & Barangay Clearance (Original)\n";
        $emailMessage .= "\n";
        $emailMessage .= "Pictures: (white background with collar)\n";
        $emailMessage .= "4pcs passport-size, 2x2, 1x1 picture\n";
        $emailMessage .= "\n";
        $emailMessage .= "Others:\n";
        $emailMessage .= "Original High School Card\n";
        $emailMessage .= "2pcs Long Brown Envelope and Folder\n\n";
        $emailMessage .= "Please, submit all the requirements at SET which are included in the terms and conditions.\n";
        
        $emailMessage .= "\nLET US SET YOUR FUTURE, THANK YOU!";
    
        $mail->Body = ($emailMessage);

        $mail->send();

        echo '<div style="background-color: #4CAF50; color: white; padding: 10px; text-align: center;">Your Student Application has successfully uploaded!<br>Please, submit all the requirements at SET that is included in the terms and conditions.</div>';
        header("refresh:7; index.php");    
            //upload image in database
            if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $img_tmp_name = $_FILES['image']['tmp_name'];
                $img_data = file_get_contents($img_tmp_name);
                $stmt = $conn->prepare("UPDATE `studentdata` SET `image`=? WHERE `studentId`=?");
                $stmt->execute([$img_data,$sid]);
                
                }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            header("refresh:7; index.php"); 
        }
    }
?>

