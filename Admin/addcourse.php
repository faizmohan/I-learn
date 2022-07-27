<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
include('./adminInclude/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }

if (isset($_REQUEST['courseSubmitBtn'])) {
  // Checking for empty fields
  if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_price'] == "")) {
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill all fields</div>';
  }else{
    $course_name = $_REQUEST['course_name'];
    $course_desc = $_REQUEST['course_desc'];
    $course_author = $_REQUEST['course_author'];
    $course_duration = $_REQUEST['course_duration'];
    $course_original_price = $_REQUEST['course_original_price'];
    $course_price = $_REQUEST['course_price'];
    $course_img = $_FILES['course_img']['name'];
    $course_img_temp = $_FILES['course_img']['tmp_name'];
    $img_folder = '../image/courseimg/'.$course_img;
    move_uploaded_file($course_img_temp, $img_folder);

    $sql = "INSERT INTO course (course_name, course_desc, course_author, course_img, course_duration, course_price, course_org) VALUES ('$course_name', '$course_desc','$course_author', '$img_folder', '$course_duration', '$course_original_price', '$course_price')";

    if($conn->query($sql) == TRUE){
      // below msg display on form submit success
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Course Added Successfully </div>';
     } else {
      // below msg display on form submit failed
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add Course </div>';
     }

  }
}




?>

<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Add New Course</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="course_name" class="form-label">Course Name</label>
      <input type="text" class="form-control" id="course_name" name="course_name">
    </div>
    <div class="form-group">
      <label for="course_desc" class="form-label">Course description</label>
      <textarea class="form-control" id="course_desc" name="course_desc" row=2></textarea>
    </div>
    <div class="form-group">
      <label for="course_author" class="form-label">Course Author</label>
      <input type="text" class="form-control" id="course_author" name="course_author">
    </div>
    <div class="form-group">
      <label for="course_duration" class="form-label">Course duration</label>
      <input type="text" class="form-control" id="course_duration" name="course_duration">
    </div>
    <div class="form-group">
      <label for="originl_price" class="form-label">Course Original Price</label>
      <input type="text" class="form-control" id="course_original_price" name="course_original_price">
    </div>
    <div class="form-group">
      <label for="sell_price" class="form-label">Course Selling Price</label>
      <input type="text" class="form-control" id="course_price" name="course_price">
    </div>
    <!-- <div class="form-group">
      <label for="course_img" class="form-label">Course Image</label>
      <input type="file" class="form-control-file" id="course_img" name="course_img">
    </div> -->
    <div class="form-group">
      <label for="course_img" class="form-label">Course Image</label>
      <input class="form-control" type="file" id="course_img" name="course_img">
    </div>
    <div class="text-center mt-3">
      <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
      <a href="course.php" class="btn btn-secondary">Close</a>
    </div>
    <?php
    if (isset($msg)) {
      echo $msg;
    }
    ?>
  </form>
</div>
</div>
</div>

<?php
include('./adminInclude/footer.php');
?>