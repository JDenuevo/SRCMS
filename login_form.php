<?php 
session_start();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Service Record and Certificate Management</title>
<link rel="stylesheet" href="css/effect.css">
<link rel="icon" href="photos/logo.ico">
    
<!-- Login Form CSS -->
<link rel="stylesheet" href="css/main_login.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap/bootstrap.css">

</head>

<body>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg text-uppercase bg-success py-3 fixed-top" id="mainNav">
    <div class="container">
        <h2 class="navbar-brand text-white fw-bold fs-3 bg-success p-2 border border-light rounded">SR&CMS</h2>
        <button class="navbar-toggler text-uppercase text-white fw-bold fs-3 rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <img src = "photos/menulogo.png" id = "menuicon" class = "img-fluid">
            Menu
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto fw-bold fs-4">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 link-light rounded" href="#homepg"><img class = "img-fluid" id = "navicons" src = "photos/homepg.png"> Home</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 link-light rounded" href="#aboutpg"><img class = "img-fluid" id = "navicons" src = "photos/about.png"> About</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 link-light rounded" href="#locationpg"><img class = "img-fluid" id = "navicons" src = "photos/loc.png"> Location</a></li>
            </ul>
        </div>
    </div>
</nav>

<!--Login-->
<section class = "p-5" id = "homepg">
<br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="photos/logo.gif" id = "giflogo" class="img-fluid pt-4">
            </div>

            <div class="col-md-6">
                <form action="login.php" method="post" class = "text-white fs-4 bg-success rounded p-4 p-sm-3">
                    <div class="mb-5">
                    <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                        <label class = "fs-3 fw-semibold text-center">Service Record & Certificate Management System</label>
                        <hr class="line2">
                        <label for = "username" class = "form-label">Username</label>
                        <input type = "text" name = "uname" placeholder = "Username" class = "form-control" id = "userName">
                    </div>

                    <div class="mb-5">
                        <label for = "password" class = "form-label">Password</label>
                        <input  type = "password" name = "password" placeholder = "Password" class = "form-control" id = "passWord">
                    </div>

                    <button type = "submit" id = "btnLogin" class = "btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>


<!--About-->
<section class = "p-5" id = "aboutpg">
<br><br>
<hr class="line1">
<div class="container">
    <div class="row text-center">
        <h2 class = "text-center fs-1">ABOUT US</h2>
        <div class = "col-12 col-md-6 col-lg-6">
            <div class="card justify-content-center text-dark m-5" style="outline: 1px solid black">
                <div class="card-body">
                    <img src="photos/mission.png" id = "aboutlogo" class = "img-fluid card-img-top">
                    <h5 class="card-title mb-3 fw-bold">Mission</h5>
                    <p class="card-text">To maintain and support an adequate system of tertiary education that will help promote the economic growth of the country, strengthen the character and well-being of its graduates as productive members of the community.</p>
                </div>
            </div>
        </div>
        <div class = "col-12 col-md-6 col-lg-6">
            <div class = "card justify-content-center text-dark m-5" style="outline: 1px solid black">
                <div class = "card-body">
                    <img src = "photos/vision.png" id = "aboutlogo" class = "img-fluid card-img-top">
                    <h5 class = "card-title mb-3 fw-bold">Vision</h5>
                    <p class = "card-text">To maintain and support an adequate system of tertiary education that will help promote the economic growth of the country, strengthen the character and well-being of its graduates as productive members of the community.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!--Contact-->
<section class = "p-5" id = "locationpg">
<hr class="line1">
    <div class="container-fluid">
        <div class="row">
            <h2 class = "text-center fs-1 mb-4">LOCATION</h2>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-center fs-5 text-dark content1-left">
                    <span class = "fw-bold">Univesity of Caloocan City<br>(SOUTH CAMPUS)</span> <br>
                    <iframe id = "map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.0444109999758!2d120.99269381472895!3d14.653420489768836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b686dd24e859%3A0xe442b57504cbf05f!2sUniversity%20of%20Caloocan%20City%20-%20South%20Campus!5e0!3m2!1sen!2sph!4v1665943397504!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-center fs-5 text-dark content2-left">
                    <span class = "fw-bold">Univesity of Caloocan City<br>(CAMARIN BUSINESS CAMPUS)</span> <br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.1182039746473!2d121.04766251473035!3d14.762369889699631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b026b8067343%3A0x2d1168a7b30bcdb0!2sUniversity%20of%20Caloocan%20City%20-%20Camarin%20Business%20Campus!5e0!3m2!1sen!2sph!4v1665943461552!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-center fs-5 text-dark content3-left">
                    <span class = "fw-bold">Univesity of Caloocan City<br>(CONGRESSIONAL CAMPUS)</span> <br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5456.438932408323!2d121.02962243861506!3d14.752968430935928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b1cc9c9c83e9%3A0x303a03298da24ddb!2sUniversity%20of%20Caloocan%20City%20-%20Congressional%20Campus!5e0!3m2!1sen!2sph!4v1665943513481!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Footer-->
<div class="footer p-2 bg-success fs-6">
    <label>University of Caloocan City | South Campus</label> <br>
    <label>Biglang Awa St Cor 11th Ave Catleya, East Grace Park, Caloocan City</label>
</div>

<!-- Bootstrap Animation Link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

