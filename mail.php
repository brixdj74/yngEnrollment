
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['rec'])) {
    
    $uname = $_POST["iun"];

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

    //START OF MAILING

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = 'setsystem.v1@gmail.com';
    $mail->Password = 'tacwtpwmbrguopkh';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('setsystem.v1@gmail.com');
    $mail->addAddress($uname);

    $mail->Subject = ('SET Recovery');
    $mail->Body = ('Hola SET! here is your recovery code!' . $rcx );

    $mail->send();
    //end of mailing

    header('Location: rec.php?id=' . $emx);
    exit();

}

?>
