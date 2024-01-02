<?php include '../dbconn.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.0.0-alpha.12/html2canvas.min.js"></script>
    <script src="dist/jspdf.umd.min.js"></script><script src="dist/html2pdf.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="all.css">
    <link rel="icon" href="../img/logo.png" type="image/png">

    <title>SET Schedules</title>

    <style>.hidden {
    display: none;
}
    body{
        background-color: whitesmoke;
        background-image: url('../img/logo.png');
        background-size: 400% 400%;
        background-repeat: no-repeat;
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
        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                ' . $msg . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
        <h1>Class Schedule</h1>

        <div class="d-flex justify-content-between mb-4 align-items-center">
            <div>
                <a href="newSched.php" class="btn btn-dark me-2">New Schedule</a>
                <button id="generatePdfButton" class="btn btn-dark">Generate Schedule</button>
            </div>

            <div class="d-flex align-items-center">
                <div class="col-md-3 me-2">
                    <select class="form-select" name="course" required>
                        <option value="">Course</option>
                        <option value="ACT">ACT</option>
                        <option value="BSTM">BSTM</option>
                        <option value="BSCRIM">BSCRIM</option>
                    </select>
                </div>

                <div class="col-md-2 me-2">
                    <select class="form-select" name="year" required>
                        <option value="">Year</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="col-md-3 me-2">
                    <select class="form-select" name="semester" required>
                        <option value="">Semester</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="col-md-3 me-2">
                    <select class="form-select" name="day" required>
                        <option value="">Day</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                </div>
                <label class="form-label"><br></label>
                <button class="btn" id="searchButton" type="button">
                    <i class="fa-solid fa-search"></i>
                </button>
            </div>
        </div>
            
        <table id="my-table" class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Teacher Name</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Time</th>
                    <th scope="col">Day</th>
                    <th scope="col">Course</th>
                    <th scope="col">Year</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT schedule.*,subjects.*,employee.*,course.* FROM schedule INNER JOIN employee ON schedule.employeeId = employee.employeeId INNER JOIN subjects ON schedule.subjectId = subjects.subjectId inner join course on course.courseId = schedule.courseId";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["scheduleId"] ?></td>
                        <td><?php echo $row["efirstName"] . ' ' . $row["elastName"]?></td>
                        <td><?php echo $row["description"] ?></td>
                        <td><?php echo $row["timeStart"] . ' - ' . $row["timeEnd"] ?></td>
                        <td><?php echo $row["day"] ?></td>
                        <td><?php echo $row["course"] ?></td>
                        <td><?php echo $row["year"] ?></td>
                        <td><?php echo $row["semester"] ?></td>
                        <td>
                            <a target="_blank" href="editschedule.php?id=<?php echo $row["scheduleId"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3" onclick="return confirm('Edit Schedule?');"></i></a>
                            <a href="" class="link-dark" onclick="confirmDelete(<?php echo $row["scheduleId"]?>,<?php echo $row["description"]?>)">
                                <i class="fa-solid fa-trash fs-5"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        document.getElementById('generatePdfButton').addEventListener('click', function () {
            const doc = new jsPDF();
            doc.autoTable({
                html: '#my-table',
            });
            doc.save('table.pdf');
        });
    </script>

<script>
    function confirmDelete(id,desc) {
        if (confirm(`Are you sure you want to delete ${desc}?`)) {
            window.location.href = `delschedule.php?id=${id}`;
        }
    }
</script>

</body>

</html>
