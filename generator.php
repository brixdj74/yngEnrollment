<?php
function generateStudentID() {
    $currentYear = date("Y");
    include 'dbconn.php';

    // Retrieve the last student ID from the database
    $query = "SELECT * FROM studentdata ORDER BY studentId DESC LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastStudentID = $row["studentid"];

        $txt = substr($lastStudentID, 0, 3);
        $num = substr($lastStudentID, 3,8);
        $n = (int)$num + 1;
        $snum = strval($n);
        $generateID = $txt . $currentYear . $snum;
    } else {
        $generateID = "SET" . $currentYear . "-10000";
    }

    return $generateID;
}

$studentID = generateStudentID();
echo $studentID;
?>
