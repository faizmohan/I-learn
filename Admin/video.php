<?php
if (!isset($_SESSION)) {
  session_start();
}
include('./adminInclude/header.php');
include('../dbConnection.php');
if (isset($_SESSION['is_admin_login'])) {
  $adminEmail = $_SESSION['adminLogEmail'];
} else {
  echo "<script> location.href='../index.php'; </script>";
}
?>

<div class="col-sm-9 mt-5 mx-3">
  <form class="row g-3">
    <div class="col-auto">
      <label for="checkid">Enter Course ID: </label>
    </div>
    <div class="col-auto">
      <input type="text" class="form-control" id="checkid" name="checkid">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-danger mb-3">Submit</button>
    </div>
  </form>
  <?php
  $sql = "SELECT course_id FROM course";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){

    if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id'])
    {
      $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      if(($row['course_id']) == $_REQUEST['checkid'])
      {
        $_SESSION['course_id'] = $row['course_id'];
        $_SESSION['course_name'] = $row['course_name'];
        ?>
        <h3 class="mt-5 bg-dark text-white p-2">Course ID : <?php if(isset($row['course_id'])) {echo $row['course_id']; } ?> Course Name: <?php if(isset($row['course_name'])) {echo $row['course_name']; } ?></h3>
        <?php
        $sql = "SELECT * FROM video WHERE course_id = {$_REQUEST['checkid']}";
        $result = $conn->query($sql);
          echo '<table class="table" id="table">
            <thead>
              <tr>
              <th scope="col">Video ID</th>
              <th scope="col">Video Name</th>
              <th scope="col">Video link</th>
              <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>';
            while($row = $result->fetch_assoc())
            {
              echo '<tr>';
              echo '<th scope="row">'.$row["video_id"].'</th>';
              echo '<td>'. $row["video_name"].'</td>';
              echo '<td>'.$row["video_link"].'</td>';
              echo '<td>
              <form action="editvideo.php" method="POST" class="d-inline"> 
                <input type="hidden" name="id" value='. $row["video_id"] .'>
                <button type="submit" class="btn btn-info mr-3" name="view" value="View">
                  <i class="fas fa-pen"></i>
                </button>
              </form>  
              <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='. $row["video_id"] .'>
                <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                  <i class="far fa-trash-alt"></i>
                </button>
              </form>
            </td>
            </tr>';
            }
            echo '</tbody>
            </table>';
      }
      else 
      {
        echo '<div class="alert alert-dark mt-4" role="alert">
        Course Not Found ! </div>';
      }
      if(isset($_REQUEST['delete']))
      {
        $sql = "DELETE FROM video WHERE video_id = {$_REQUEST['id']}";
        if($conn->query($sql) === TRUE)
        {
          // echo "Record Deleted Successfully";
          // below code will refresh the page after deleting the record
          echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        } 
        else 
        {
          echo "Unable to Delete Data";
        } 
      } 
    }
  }
  ?>
</div>
<?php if(isset($_SESSION['course_id'])){
   echo '<div><a class="btn btn-danger box" href="./addVideo.php"><i class="fas fa-plus fa-2x"></i></a></div>';
   } ?>
</div>  <!-- div Conatiner-fluid close from header -->

<?php
include('./adminInclude/footer.php');
?>