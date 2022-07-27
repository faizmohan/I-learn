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

 // Update
 if(isset($_REQUEST['requpdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['video_id'] == "") || ($_REQUEST['video_name'] == "") || ($_REQUEST['video_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $vid = $_REQUEST['video_id'];
    $vname = $_REQUEST['video_name'];
    $vdesc = $_REQUEST['video_desc'];
    $cid = $_REQUEST['course_id'];
    $cname = $_REQUEST['course_name'];
    $vlink = '../videolec/'. $_FILES['video_link']['name'];
    
   $sql = "UPDATE video SET video_id = '$vid', video_name = '$vname', video_desc = '$vdesc', course_id='$cid', course_name='$cname',video_link='$vlink' WHERE video_id = '$vid'";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
  }
  }

?>

<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Update Video Details</h3>
  <?php
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM video WHERE video_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }
 ?>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="video_id">Video ID</label>
      <input type="text" class="form-control" id="video_id" name="video_id" value="<?php if(isset($row['video_id'])) {echo $row['video_id']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="video_name">Video Name</label>
      <input type="text" class="form-control" id="video_name" name="video_name" value="<?php if(isset($row['video_name'])) {echo $row['video_name']; }?>">
    </div>

    <div class="form-group">
      <label for="video_desc">Video Description</label>
      <textarea class="form-control" id="video_desc" name="video_desc" row=2><?php if(isset($row['video_desc'])) {echo $row['video_desc']; }?></textarea>
    </div>
    <div class="form-group">
      <label for="course_id">Course ID</label>
      <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])) {echo $row['course_id']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="course_name">Course Name</label>
      <input type="text" class="form-control" id="course_name" name="course_name" onkeypress="isInputNumber(event)" value="<?php if(isset($row['course_name'])) {echo $row['course_name']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="video_link">Video Link</label>
      <div class="embed-responsive embed-responsive-16by9">
       <iframe class="embed-responsive-item" src="<?php if(isset($row['video_link'])) {echo $row['video_link']; }?>" allowfullscreen></iframe>
      </div>     
      <input type="file" class="form-control-file" id="video_link" name="video_link">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
      <a href="video.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
</div>  <!-- div Row close from header -->
</div>  <!-- div Conatiner-fluid close from header -->
<?php
include('./adminInclude/footer.php'); 
?>