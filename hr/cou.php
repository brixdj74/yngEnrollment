<?php include '../dbconn.php'; ?>
 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

<?php include 'navbar.html';?>

        <!-- Bubbles -->
        <div class="bubbles" style="top: 5%; left: 5%;"></div>
    <div class="bubbles" style="top: 25%; left: 45%;"></div>
    <div class="bubbles" style="top: 55%; left: 75%;"></div>
    
    <div class="container mt-4">
        <h1 class="text-center">Courses Offered</h1>
</div>

<div class="container">
        <h1 class="text-center text-white">Courses Offered</h1>

        <!-- Table Section -->
        <div class="table-section">
            <?php
            $sql = "SELECT * FROM course";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<table class="table table-bordered table-striped mt-4">
                        <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Acronym</th>
                                <th>Year</th>
                                <th>Degree</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <td>' . $row['courseId'] . '</td>
                            <td>' . $row['course'] . '</td>
                            <td>' . $row['acronym'] . '</td>
                            <td>' . $row['year'] . '</td>
                            <td>' . $row['degree'] . '</td>
                            <td>
                                <a href="delete_course.php?id=' . $row['courseId'] . '" class="link-dark" onclick="return confirm(\'Delete Course?\');">
                                    Delete
                            </a>
                        </td>
                          </tr>';
                }

                echo '</tbody>
                    </table>';
            } else {
                echo '<p class="text-center">No courses available.</p>';
            }
            ?>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tfO2uZszLqAwR8jGtMydKJg2BMkL5Wx4dudgI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha384-DZ4A9Lplq8hBIXksG6tSbV9t3+V3U/isk7XaFdgXhIe9yTbNlNXJKRdiP8DHt1Q6" crossorigin="anonymous"></script>
    <script>
        function confirmDelete(courseId) {
            var confirmed = confirm("Are you sure you want to delete this course?");
            if (confirmed) {
                // Set the form action dynamically to delete_course.php
                document.querySelector('.delete-form').action = 'delete_course.php';
                // Trigger the form submission
                document.querySelector('.delete-form [name="courseId"]').value = courseId;
                document.querySelector('.delete-form').submit();
            }
        }
    </script>

</body>
</html>