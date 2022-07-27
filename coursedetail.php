<!-- Start including header -->
<?php
include('./maininclude/header.php');
include('./dbConnection.php');
?>
<!-- End including header -->

<!-- Start course page banner -->
<div class="container-fluid bg-dark">
  <div class="row">
    <img src="./image/coursebanner.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;">
  </div>
</div>
<!-- End course page banner -->

<!-- Start main content -->
<div class="container mt-5">
  <?php
  if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $_SESSION['course_id'] = $course_id;
    $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo ' 
                <div class="row">
                <div class="col-md-4">
                  <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" alt="Guitar" />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Course Name: ' . $row['course_name'] . '</h5>
                    <p class="card-text"> Description: ' . $row['course_desc'] . '</p>
                    <p class="card-text"> Duration: ' . $row['course_duration'] . '</p>
                    <form action="checkout.php" method="post">
                      <p class="card-text d-inline">Price: <small><del>&#8377 ' . $row['course_price'] . '</del></small> <span class="font-weight-bolder">&#8377 ' . $row['course_org'] . '<span></p>
                      <input type="hidden" name="id" value=' . $row["course_org"] . '> 
                      <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy Now</button>
                    </form>
                  </div>
                </div>
              ';
      }
    }
  }
  ?>
</div><!-- End All Course -->
<div class="container">
  <div class="row">
    <?php $sql = "SELECT * FROM video";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo '
           <table class="table table-bordered table-hover">
             <thead>
               <tr>
                 <th scope="col">Video No.</th>
                 <th scope="col">Video Name</th>
               </tr>
             </thead>
             <tbody>';
      $num = 0;
      while ($row = $result->fetch_assoc()) {
        if ($row['course_id'] == $course_id) {
          $num++;
          echo ' <tr>
               <th scope="row">' . $num . '</th>
               <td>' . $row["video_name"] . '</td></tr>';
        }
      }
      echo '</tbody>
           </table>';
    } ?>
  </div>
</div>

<div class="container mt-5">
  <h1 class="text-center">Related courses</h1>
  <div class="row mt-4">
    <!-- Start All Course Row -->
    <?php
    $sql = "select d.course_id, d.course_name, d.course_desc, d.course_price, d.course_org, d.course_img from course as c join course as d where c.course_id = $course_id and (d.course_id = c.suggest1 or d.course_id = c.suggest2 or d.course_id = c.suggest3) LIMIT 3;";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo ' 
                <div class="col-sm-4 mb-4">
                  <a href="coursedetail.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px;"><div class="card">
                    <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" alt="Guitar" />
                    <div class="card-body">
                      <h5 class="card-title">' . $row['course_name'] . '</h5>
                      <p class="card-text">' . $row['course_desc'] . '</p>
                    </div>
                    <div class="card-footer">
                      <p class="card-text d-inline">Price: <small><del>&#8377 ' . $row['course_price'] . '</del></small> <span class="font-weight-bolder">&#8377 ' . $row['course_org'] . '<span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetail.php?course_id=' . $course_id . '">Enroll</a>
                    </div>
                  </div> </a>
                </div>
              ';
      }
    }
    ?>
  </div><!-- End All Course Row -->
</div>
<!-- End All Course -->

<?php
// Footer Include from mainInclude 
include('./mainInclude/footer.php');
?>