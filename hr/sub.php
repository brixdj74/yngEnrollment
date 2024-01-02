<?php include '../dbconn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YNG Subjects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="all.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <style>
        body {
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"%3E%3Cpath fill="%230099ff" fill-opacity="0.25" d="M0,0L48,10.7C96,21,192,43,288,69.3C384,96,480,128,576,149.3C672,171,768,181,864,176C960,171,1056,149,1152,128C1248,107,1344,85,1392,74.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"%3E%3C/path%3E%3C/svg%3E');
            background-size: cover;
            background-position: center;
            font-family: 'Lato', Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .bubbles {
            width: 20px;
            height: 20px;
            background-color: #ffffff;
            border-radius: 50%;
            position: absolute;
            animation: floatBubble 5s infinite;
        }

        @keyframes floatBubble {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .filter-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .table-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-apply-filters {
            background-color: #007bff;
            color: #fff;
            border: none;
        }
    </style>
</head>

<body>

    <?php include 'navbar.html'; ?>

    <!-- Bubbles -->
    <div class="bubbles" style="top: 5%; left: 5%;"></div>
    <div class="bubbles" style="top: 25%; left: 45%;"></div>
    <div class="bubbles" style="top: 55%; left: 75%;"></div>

    <div class="container">
        <h1 class="text-center text-black">YNG Subjects</h1>

        <!-- Filter Dropdowns -->
        <div class="row mt-4 filter-section">
            <div class="col-md-3 mb-3">
                <label for="courseFilter" class="form-label">Filter by Course:</label>
                <select class="form-select" id="courseFilter">
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
                <select class="form-select" id="yearFilter">
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
                <select class="form-select" id="semesterFilter">
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
                <button class="btn btn-apply-filters w-100" onclick="applyFilters()">Apply Filters</button>
            </div>
        </div>

        <!-- Table Section -->
        <div class="table-section">
            <?php
            // Apply filters to SQL query based on selected values
            $courseFilter = isset($_GET['course']) ? $_GET['course'] : '';
            $yearFilter = isset($_GET['year']) ? $_GET['year'] : '';
            $semesterFilter = isset($_GET['semester']) ? $_GET['semester'] : '';

            $sql = "SELECT * FROM subjects inner join course on course.courseId = subjects.courseId";
            $whereClause = [];

            if ($courseFilter != '') {
                $whereClause[] = "subjects.courseId = '$courseFilter'";
            }

            if ($yearFilter != '') {
                $whereClause[] = "yearLevel = '$yearFilter'";
            }

            if ($semesterFilter != '') {
                $whereClause[] = "semester = '$semesterFilter'";
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
                                <th>Subject ID</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Lecture</th>
                                <th>Laboratory</th>
                                <th>Units</th>
                                <th>Pre Requisite</th>
                                <th>Hours</th>
                                <th>Year Level</th>
                                <th>Semester</th>
                                <th>Preferred Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <td>' . $row['subjectId'] . '</td>
                            <td>' . $row['code'] . '</td>
                            <td>' . $row['description'] . '</td>
                            <td>' . $row['lecture'] . '</td>
                            <td>' . $row['laboratory'] . '</td>
                            <td>' . $row['units'] . '</td>
                            <td>' . $row['preRequisite'] . '</td>
                            <td>' . $row['hours'] . '</td>
                            <td>' . $row['yearLevel'] . '</td>
                            <td>' . $row['semester'] . '</td>
                            <td>' . $row['course'] . '</td>
                            <td>
                                <a href="delete_sub.php?id=' . $row['subjectId'] . '" class="link-dark" onclick="return confirm(\'Delete Subject?\');">
                                    Delete
                                </a>
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

    <script>
        function applyFilters() {
            // Retrieve selected values from dropdowns
            var courseFilter = document.getElementById('courseFilter').value;
            var yearFilter = document.getElementById('yearFilter').value;
            var semesterFilter = document.getElementById('semesterFilter').value;

            // Redirect to the current page with filters as query parameters
            window.location.href = 'sub.php?course=' + courseFilter + '&year=' + yearFilter + '&semester=' + semesterFilter;
        }
    </script>

</body>

</html>
