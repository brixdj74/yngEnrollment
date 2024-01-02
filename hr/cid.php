<?php
function forCourse() {
    include '../dbconn.php';

    // Retrieve the last student ID from the database
    $query = "SELECT * FROM course ORDER BY courseId DESC LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastId = $row["courseId"];

        $txt = substr($lastId, 0, 1);
        $num = substr($lastId,2);
        $n = (int)$num + 1;
        $snum = strval($n);
        $forCourse = $txt .'-' . $snum;
    } else {
        $forCourse = "C-0001";
    }

    return $forCourse;
}

$forCourse = forCourse();
echo $forCourse;

?>
