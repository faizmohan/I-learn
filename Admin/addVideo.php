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

if (isset($_REQUEST['videoSubmitBtn'])) {
  // Checking for empty fields
  if(($_REQUEST['video_name'] == "") || ($_REQUEST['video_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")){
    // msg displayed if required field missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
   }else {
    // Assigning User Values to Variable
    $video_name = $_REQUEST['video_name'];
    $video_desc = $_REQUEST['video_desc'];
    $course_id = $_REQUEST['course_id'];
    $course_name = $_REQUEST['course_name'];
    $video_link = $_FILES['video_link']['name']; 
    $video_link_temp = $_FILES['video_link']['tmp_name'];
    $link_folder = '../videolec/'.$video_link; 
    move_uploaded_file($video_link_temp, $link_folder);

    $sql = "INSERT INTO video (video_name, video_desc, video_link, course_id, course_name) VALUES ('$video_name', '$video_desc','$link_folder', '$course_id', '$course_name')";

     if($conn->query($sql) == TRUE){
      // below msg display on form submit success
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Video Added Successfully </div>';
     } else {
      // below msg display on form submit failed
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add Video </div>';
     }
   }
}

?>

<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Add New Video</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="course_id">Course ID</label>
      <input type="text" class="form-control" id="course_id" name="course_id" value ="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];} ?>" readonly>
    </div>
    <div class="form-group">
      <label for="course_name">Course Name</label>
      <input type="text" class="form-control" id="course_name" name="course_name" value ="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];} ?>" readonly>
    </div>
    <div class="form-group">
      <label for="video_name">Video Name</label>
      <input type="text" class="form-control" id="video_name" name="video_name">
    </div>
    <div class="form-group">
      <label for="video_desc">Video Description</label>
      <textarea class="form-control" id="video_desc" name="video_desc" row=2></textarea>
    </div>
    <div class="form-group">
      <label for="video_link">Video Link</label>
      <input type="file" class="form-control-file" id="video_link" name="video_link">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="videoSubmitBtn" name="videoSubmitBtn">Submit</button>
      <a href="video.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>


</div>
</div>

<?php
include('./adminInclude/footer.php');
?>