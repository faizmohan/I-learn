<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <script src="https://kit.fontawesome.com/82b1ba6357.js" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="css/all.min.css"> -->


  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

  <!-- Student Testimonial Owl Slider CSS -->
  <link rel="stylesheet" type="text/css" href="css/owl.min.css">
  <link rel="stylesheet" type="text/css" href="css/owl.theme.min.css">
  <link rel="stylesheet" type="text/css" href="css/testyslider.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">



  <title>learning portal</title>
</head>

<body>
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">iLearn</a>
      <span class="navbar-text">Learn and Implement</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav custom-nav px-5">
          <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
          <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
          
          <?php
          session_start();
          if (isset($_SESSION['is_login'])) {
            echo '<li class="nav-item custom-nav-item"><a href="Student/studentProfile.php" class="nav-link">My Profile</a></li>
              <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
          } else {
            echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuLoginModalCenter">Login</a></li>
            <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Sign Up</a></li>';
          }
          ?>   

          <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
          <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navigation -->