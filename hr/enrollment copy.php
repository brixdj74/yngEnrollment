<?php include '../dbconn.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="all.css">
    <link rel="icon" href="../img/logo.png" type="image/png">

    <style>.hidden {
    display: none;
}
</style>

    <title>SET Enrollees</title>
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
           <h1>SET Enrollees : For Admission and Evaluation List</h1>
        <div class="d-flex justify-content-between mb-4 align-items-center">
            <div>
                <a href="../enrollmentform.php" target="_blank" class="btn btn-dark me-2">Enroll Student</a>
            </div>
            <form method="post">
                <div class="d-flex align-items-center">
                    <input type="text" class="search form-control" name="search" placeholder="Search Enrollee">
                    <button type="submit" name="search" class="btn btn-dark ms-2">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>
            </form>
</div>
        <table id="my-table" class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Enrollee Name</th>
                    <th scope="col">Birth Date</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Course</th>
                    <th scope="col">Admission Credential</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php

                if (isset($_POST["search"])) {
                    $search = $_POST["search"];
                    $sql = "SELECT * FROM `studentdata` INNER JOIN `course` ON `course`.`courseId` = `studentdata`.`courseId` WHERE `firstName` LIKE '%$search%' OR `lastName` LIKE '%$search%' ORDER BY firstName";
                }else{
                    $sql = "SELECT * FROM `studentdata` INNER JOIN `course` ON `course`.`courseId` = `studentdata`.`courseId` order by `studentdata`.`courseId`,`firstName` asc";
                }
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["studentId"] ?></td>
                        <td><?php echo $row["firstName"] . ' ' . $row["middleName"] . ' ' . $row["lastName"] . ' ' . $row["suffix"] ?></td>
                        <td><?php echo $row["birthDate"] ?></td>
                        <td><?php echo $row["gender"] ?></td>
                        <td><?php echo $row["contactNumber"] ?></td>
                        <td><?php echo $row["studentUsername"] ?></td>
                        <td><?php echo $row["presentAddress"] ?></td>
                        <td><?php echo $row["degree"] . ' in ' . $row["course"] ?></td>
                        <td><?php echo $row["admissionCredential"] ?></td>
                        <td>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" style="max-width: 100px; max-height: 100px;" />
                        </td>

                        <td>
                            <a target="_blank" href="admission.php?id=<?php echo $row["studentId"] ?>" class="link-dark"><i class="fa-solid fa-eye fs-5 me-3" onclick="return confirm('Proceed to view PDS?');"></i></a>
                            <a target="_blank" href="accept.php?id=<?php echo $row["studentId"] ?>" class="link-dark"><i class="fa-solid fa-check fs-5 me-3 text-success" onclick="return confirm('Are you sure you want to accept the application of this student?');" ></i></a>
                            <a target="_blank" href="deny.php?id=<?php echo $row["studentId"] ?>" class="link-dark"><i class="fa-solid fa-times fs-5 me-3 text-danger" onclick="return confirm('Are you sure you want to deny the application of this student?');"></i></a>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script>
    function confirmDelete(id, name) {
        if (confirm(`Are you sure you want to delete ${name}?`)) {
            window.location.href = `delete.php?id=${id}&name=${name}`;
        }
    }
</script>
</body>

</html>
