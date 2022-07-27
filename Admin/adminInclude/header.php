<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Bootstrap css -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- Font awesome css -->
  <script src="https://kit.fontawesome.com/82b1ba6357.js" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="../css/all.min.css"> -->

  <!-- Google font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu">

  <!-- Custom css -->
  <link rel="stylesheet" href="../css/adminstyle.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  $(document).ready(function() {
    $('#table').DataTable();
} );
</head>

<body>

  <!-- Top navbar -->
  <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php">I-Learn <small class="text-white">Admin Area</small></a>
  </nav>

  <!-- Side bar -->
  <div class="container-fluid mb-5" style="margin-top:40px;">
    <div class="row">
      <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="adminDashboard.php">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="course.php">
                <i class="fas fa-tachometer-alt"></i>
                Courses
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="video.php">
                <i class="fas fa-tachometer-alt"></i>
                Video
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="students.php">
                <i class="fas fa-tachometer-alt"></i>
                Students
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sellReport.php">  
                <i class="fas fa-tachometer-alt"></i>
                Sales Report
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminPaymentStatus.php">
                <i class="fas fa-tachometer-alt"></i>
                Payment Status
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="feedback.php">
                <i class="fas fa-tachometer-alt"></i>
                Feedback
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminchangepass.php">
                <i class="fas fa-tachometer-alt"></i>
                Change Password
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">
                <i class="fas fa-tachometer-alt"></i>
                Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>
