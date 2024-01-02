<?php
function forSubject() {
    include '../dbconn.php';

    // Retrieve the last student ID from the database
    $query = "SELECT * FROM subjects ORDER BY subjectId DESC LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastId = $row["subjectId"];

        $txt = substr($lastId, 0, 1);
        $num = substr($lastId,2);
        $n = (int)$num + 1;
        $snum = strval($n);
        $forSub = $txt .'-' . $snum;
    } else {
        $forSub = "S-1001";
    }

    return $forSub;
}

$forSub = forSubject();
echo $forSub;

?>
