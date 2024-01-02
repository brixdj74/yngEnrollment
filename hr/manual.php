<?php include "../dbconn.php";?>
<?php 

if(isset($_GET["id"])){
    $Xid = $_GET["id"];

    $sql = "select * from studentdata where studentId = '$Xid'";

    $result = mysqli_query($conn,$sql);

    if($row = mysqli_fetch_array($result)){

        $Sid = $row["studentId"];

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manual</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container mt-2">
    <h1 class="text-center text-black">Select Units to Enroll to Student</h1>
    <input type="hidden" name="sid" id="sid" value="<?php echo $Sid ?>">

    <!-- Filter Dropdowns -->
    <div class="row mt-4 filter-section">
        <div class="col-md-3 mb-3">
            <label for="courseFilter" class="form-label">Filter by Course:</label>
            <select class="form-control" id="courseFilter">
                <!-- Populate options dynamically from your database -->
                <?php
                $courseQuery = "SELECT DISTINCT subjects.courseId, course.course FROM subjects INNER JOIN course ON subjects.courseId = course.courseId;";
                $courseResult = mysqli_query($conn, $courseQuery);

                echo '<option value="">Course</option>';
                while ($courseRow = mysqli_fetch_assoc($courseResult)) {
                    echo '<option value="' . $courseRow['courseId'] . '">' . $courseRow['course'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="yearFilter" class="form-label">Filter by Year:</label>
            <select class="form-control" id="yearFilter">
                <!-- Populate options dynamically from your database -->
                <?php
                $yearQuery = "SELECT DISTINCT yearLevel FROM subjects";
                $yearResult = mysqli_query($conn, $yearQuery);

                echo '<option value="">Year Level</option>';
                while ($yearRow = mysqli_fetch_assoc($yearResult)) {
                    echo '<option value="' . $yearRow['yearLevel'] . '">' . $yearRow['yearLevel'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="semesterFilter" class="form-label">Filter by Semester:</label>
            <select class="form-control" id="semesterFilter">
                <!-- Populate options dynamically from your database -->
                <?php
                $semesterQuery = "SELECT DISTINCT semester FROM subjects";
                $semesterResult = mysqli_query($conn, $semesterQuery);
                echo '<option value="">Semester</option>';
                while ($semesterRow = mysqli_fetch_assoc($semesterResult)) {
                    echo '<option value="' . $semesterRow['semester'] . '">' . $semesterRow['semester'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">&nbsp;</label>
            <button class="btn btn-primary w-100" onclick="applyFilters()">Apply Filters</button>
        </div>
    </div>

    <!-- Table Section -->
    <div class="table-section">
        <?php
        // Apply filters to SQL query based on selected values
        $courseFilter = isset($_GET['course']) ? $_GET['course'] : '';
        $yearFilter = isset($_GET['year']) ? $_GET['year'] : '';
        $semesterFilter = isset($_GET['semester']) ? $_GET['semester'] : '';

        $sql = "SELECT * FROM schedule inner join course on course.courseId = schedule.courseId inner join subjects on schedule.subjectId = subjects.subjectId";
        $whereClause = [];

        if ($courseFilter != '') {
            $whereClause[] = "schedule.courseId = '$courseFilter'";
        }

        if ($yearFilter != '') {
            $whereClause[] = "schedule.year = '$yearFilter'";
        }

        if ($semesterFilter != '') {
            $whereClause[] = "schedule.semester = '$semesterFilter'";
        }

        // Check if any filters are applied
        if (!empty($whereClause)) {
            $sql .= " WHERE " . implode(" AND ", $whereClause);
        }

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-bordered table-striped mt-4">
                    <thead>
                        <tr>
                            <th>Schedule ID</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Day</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . $row['scheduleId'] . '</td>
                        <td>' . $row['code'] . '</td>
                        <td>' . $row['description'] . '</td>
                        <td>' . $row['timeStart'] . '</td>
                        <td>' . $row['timeEnd'] . '</td>
                        <td>' . $row['day'] . '</td>
                        <td>' . $row['acronym'] . ' - ' .$row['yearLevel'] . '</td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="schedId" value="' . $row['scheduleId'] . '">
                                <input type="hidden" name="yr" value="' . $row['yearLevel'] . '">
                                <input type="hidden" name="sem" value="' . $row['semester'] . '">
                                <input type="hidden" name="stat" value="Active">
                                <input type="hidden" name="subId" value="' . $row['subjectId'] . '">
                                <button type="submit" name="add" class="btn btn-success">Add</button>
                            </form>
                        </td>
                      </tr>';
            }

            echo '</tbody>
                </table>';
        } else {
            echo '<p class="text-center">No subjects available.</p>';
        }
        ?>
    </div>

</div>

<!-- Add Bootstrap JS and Popper.js scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-eMN0Pmo7t29dQu0OcTlH9HoqZI8uT2Er3tmA5xz05AZZieAqeqtvaR8w5EZI5U5Z" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    function applyFilters() {
        // Retrieve selected values from dropdowns
        var courseFilter = document.getElementById('courseFilter').value;
        var yearFilter = document.getElementById('yearFilter').value;
        var semesterFilter = document.getElementById('semesterFilter').value;
        var studentId = document.getElementById('sid').value;

        // Redirect to the current page with filters as query parameters
        window.location.href = 'manual.php?id='+ studentId +'&course=' + courseFilter + '&year=' + yearFilter + '&semester=' + semesterFilter ;
    }
</script>

</body>
</html>

<?php
if(isset($_POST['add'])){
    try {

            $autoSem = $_POST['sem'];
            $autoYear = $_POST['yr'];
            //good na studentId rekta na yun
            $getSub = $_POST['subId'];
            $status = "Active";
            $getSched = $_POST['schedId'];

            $sql1 = "INSERT INTO `studentunits` (`year`, `semester`, `status`, `studentId`, `subjectId`,`scheduleId`) VALUES ('$autoYear', '$autoSem', '$status', '$Sid', '$getSub','$getSched')";

            if (mysqli_query($conn, $sql1)) {
                echo $getSched . "Added";
            
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}
?>
