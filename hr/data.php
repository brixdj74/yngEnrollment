<?php include '../dbconn.php'; ?>
 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SET Data Entry</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="all.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
<style>

body{
    background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"%3E%3Cpath fill="%230099ff" fill-opacity="0.25" d="M0,0L48,10.7C96,21,192,43,288,69.3C384,96,480,128,576,149.3C672,171,768,181,864,176C960,171,1056,149,1152,128C1248,107,1344,85,1392,74.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"%3E%3C/path%3E%3C/svg%3E');
            background-size: cover;
            background-position: center;
    }

    body {
            font-family: Arial, sans-serif;
        }

        .modal-content {
            border-radius: 10px;
        }
</style>

</head>

<body>

<?php include 'navbar.html';?>

        <!-- Bubbles -->
        <div class="bubbles" style="top: 5%; left: 5%;"></div>
    <div class="bubbles" style="top: 25%; left: 45%;"></div>
    <div class="bubbles" style="top: 55%; left: 75%;"></div>
    
    <div class="container mt-4">
        <h1 class="text-center">Welcome to YNG Data Entry</h1>

        <div class="row mt-2">
        <div class="text-center col-md-3">
            <button class="btn btn-dark" onclick="openCourseForm()">Add Course</button>
            <button class="btn btn-dark" onclick="openSubjectForm()">Add Subject</button>
        </div>
    </div>

</div>

<?php
    if (!empty($msg)) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="color: red; background-color: white;">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" style="color: red;" aria-label="Close"></button>
        </div>';
    }
?>

<div class="modal" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Close button -->
            <div class="modal-header">
                <h5 class="modal-title" id="courseModalLabel">Course Data Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeCourseForm()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Form content -->
            <div class="modal-body">
                <form action="" id="courseForm" method="post">
                    <div class="form-group">
                        <label for="courseName">Course ID:</label>
                        <input type="text" class="form-control" id="cid" name="cid" readonly>
                    </div>

                    <div class="form-group">
                        <label for="courseName">Course Name:</label>
                        <input type="text" class="form-control" id="cn" name="cn" required>
                    </div>

                    <div class="form-group">
                        <label for="acronym">Acronym:</label>
                        <input type="text" class="form-control" id="ac" name="ac" required>
                    </div>

                    <div class="form-group">
                        <label for="year">Year:</label>
                        <input type="number" class="form-control" id="yr" name="yr" required>
                    </div>

                    <div class="form-group">
                        <label for="degree">Degree:</label>
                        <input type="text" class="form-control" id="de" name="de" required>
                    </div>

                    <button type="submit" class="btn btn-success" name="saveCourse">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- The modal container -->
<div class="modal" id="subjectModal" tabindex="-1" role="dialog" aria-labelledby="subjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Close button -->
            <div class="modal-header">
                <h5 class="modal-title" id="subjectModalLabel">Subject Data Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeSubjectForm()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Form content -->
            <div class="modal-body">
                <form action="" id="subjectForm" method="post">
                    <div class="form-group">
                        <label for="subjectID">Subject ID:</label>
                        <input type="text" class="form-control" id="subid" name="subid" readonly>
                    </div>

                    <div class="form-group">
                        <label for="subjectCode">Subject Code:</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>

                    <div class="form-group">
                        <label for="subjectDescription">Description:</label>
                        <input type="text" class="form-control" id="desc" name="desc" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subjectName">Lecture:</label>
                        <input type="number" class="form-control" id="lec" name="lec" onchange="updateTotalUnits()">
                    </div>

                    <div class="form-group">
                        <label for="subjectName">Laboratory:</label>
                        <input type="number" class="form-control" id="lab" name="lab" onchange="updateTotalUnits()">
                    </div>
                    <div class="form-group">
                        <label for="subjectName">Total Units:</label>
                        <input type="number" class="form-control" id="unit" name="unit" readonly>
                    </div>
                    <div class="form-group">
                        <label for="subjectName">Pre Requisite:</label>
                        <input type="text" class="form-control" id="pre" name="pre">
                    </div>
                    <div class="form-group">
                        <label for="subjectName">Hours:</label>
                        <input type="number" class="form-control" id="hr" name="hr" required>
                    </div>
                    <div class="form-group">
                        <label for="subjectName">Year Level:</label>
                        <input type="number" class="form-control" id="yr" name="yr" required>
                    </div>
                    <div class="form-group">
                        <label for="subjectName">Semester:</label>
                        <input type="number" class="form-control" id="sem" name="sem" required>
                    </div>
                    <!-- COURSE NA DITO-->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <label for="pc">Preferred Course</label>
                                <select class="form-select" id="pc" name="pc" required>
                                    <?php
                                        include 'dbconn.php';
                                        
                                        $sql = "SELECT * FROM course";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . $row['courseId'] . "'>" . $row['degree'] . " in " . $row['course'] . " (" . $row['acronym'] . ")" . "</option>";
                                            }
                                        }
                                    ?>
                                </select>
                        </div>
                    </div> 

                    <button type="submit" class="btn btn-success" name="saveSubject">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyNEFwoIXF7n5t2znOz9asM9FfnFO9gJ3" crossorigin="anonymous"></script>


<script>
    function openCourseForm() {
        var modal = document.getElementById("courseModal");
        modal.style.display = "block";
    }

    function closeCourseForm() {
        var modal = document.getElementById("courseModal");
        modal.style.display = "none";
    }

    function openSubjectForm() {
        var modal = document.getElementById("subjectModal");
        modal.style.display = "block";
    }

    function closeSubjectForm() {
        var modal = document.getElementById("subjectModal");
        modal.style.display = "none";
    }
</script>

<script>
        function generateStudentID() {
            fetch('cid.php')
                .then(response => response.text())
                .then(studentID => {
                    document.getElementById('cid').value = studentID;
                })
                .catch(error => console.error('Error:', error));
        }
        generateStudentID();
    </script>

<script>

function updateTotalUnits() {
        var lectureUnits = parseFloat(document.getElementById("lec").value) || 0;
        var labUnits = parseFloat(document.getElementById("lab").value) || 0;
        var totalUnits = lectureUnits + labUnits;

        document.getElementById("unit").value = totalUnits;
    }

</script>

<script>
        function forSubject() {
            fetch('fid.php')
                .then(response => response.text())
                .then(studentID => {
                    document.getElementById('subid').value = studentID;
                })
                .catch(error => console.error('Error:', error));
        }
        forSubject();
    </script>

</body>

</html>

<?php

if(isset($_POST['saveCourse'])){
    $cid = $_POST['cid'];
    $cn = $_POST['cn'];
    $ac = $_POST['ac'];
    $yr = $_POST['yr'];
    $de = $_POST['de'];

    $sql = "INSERT INTO `course` (`courseId`,`course`,`acronym`,`year`,`degree`) VALUES ('$cid','$cn','$ac','$yr','$de')";

    if (mysqli_query($conn, $sql)) {
        $msg =  "Success.";
    } else {
        $msg =  mysqli_error($conn);
    }
}

if(isset($_POST["saveSubject"])){
    $subId = $_POST["subid"];
    $code = $_POST["code"];
    $desc = $_POST["desc"];
    $lec = $_POST["lec"];
    $lab = $_POST["lab"];
    $unit = $_POST["unit"];
    $pre = $_POST["pre"];
    $hr = $_POST["hr"];
    $yr = $_POST["yr"];
    $sem = $_POST["sem"];
    $pc = $_POST["pc"];

    $sql1 = "INSERT INTO `subjects` (`subjectId`,`code`,`description`,`lecture`,`laboratory`,`units`,`preRequisite`,`hours`,`yearLevel`,`semester`,`courseId`) VALUES 
    ('$subId','$code','$desc','$lec','$lab','$unit','$pre','$hr','$yr','$sem','$pc')";

    if (mysqli_query($conn, $sql1)) {
        $msg = "Success";
    } else {
        $msg = mysqli_error($conn);
    }
}

?>
