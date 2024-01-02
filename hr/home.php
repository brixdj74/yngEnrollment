<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <title>YNG Home</title>
    <style>.btn{
    background-color: white;
    color:black;
}
body{
    background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"%3E%3Cpath fill="%230099ff" fill-opacity="0.25" d="M0,0L48,10.7C96,21,192,43,288,69.3C384,96,480,128,576,149.3C672,171,768,181,864,176C960,171,1056,149,1152,128C1248,107,1344,85,1392,74.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"%3E%3C/path%3E%3C/svg%3E');
            background-size: cover;
            background-position: center;
    }

</style>
</head>
<body>

<?php include 'navbar.html';?>

    <!-- Bubbles -->
    <div class="bubbles" style="top: 5%; left: 5%;"></div>
    <div class="bubbles" style="top: 25%; left: 45%;"></div>
    <div class="bubbles" style="top: 55%; left: 75%;"></div>
    
    <!-- Hero Section -->
    <div class="hero text-center py-4">
        <div class="container">
            <h1 class="display-4">Welcome to YNG Enrollment System</h1>
            <p class="lead">Your gateway to manage enrollment information.</p>
        </div>
    </div>

    <!-- Information Section -->
    <section class="info-section py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="display-6">Mission</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam nunc massa, et maximus nisi pellentesque ornare...</p>
                </div>
                <div class="col-md-6">
                    <h2 class="display-6">Vision</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam nunc massa, et maximus nisi pellentesque ornare...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Objectives Section -->
    <section class="objectives py-4">
        <div class="container">
            <h2 class="display-6">Objectives</h2>
            <ul class="">
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">Consectetur adipiscing elit.</li>
                <li class="list-group-item">Praesent aliquam nunc massa, et maximus nisi pellentesque ornare.</li>
            </ul>
        </div>
    </section>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    
</body>
</html>
