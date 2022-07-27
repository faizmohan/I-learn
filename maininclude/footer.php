<!-- Start Footer -->
<footer class="container-fluid bg-dark text-center p-2">
  <small class="text-white">Copyright &copy; 2022 || Designed By E-Learning || <a href="#login" data-bs-toggle="modal" data-bs-target="#adminLoginModalCenter">Admin Login</a> </small>
</footer>
<!-- End Footer -->

<!-- Start Student Registration Modal -->
<!-- Modal -->
<div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuRegModalCenterLabel">Student Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <!-- Start Student Registration Form -->
        <?php include('studentRegistration.php');?>
        <!-- End Student Registration Form -->

      </div>
      <div class="modal-footer">
        <span id="successMsg"></span>
        <button type="button" class="btn btn-primary " onclick="addStu()" id="signup">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Student Registration Modal -->




<!-- Start Student Login Modal -->
<!-- Modal -->
<div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuLoginModalCenterLabel">Student Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <!-- Start Student Login Form -->
        <form id="stuLoginForm">

          <div class="mb-3">
            <i class="fas fa-envelope"></i><label for="stuLogemail" class="form-label pl-2 font-weight-bold">Email</label>
            <input type="email" class="form-control" placeholder="Email" id="stuLogemail" name="stuLogemail" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <i class="fas fa-key"></i><label for="stuLogpass" class="form-label pl-2 font-weight-bold ">New Password</label>
            <input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass">
          </div>
        </form>
        <!-- End Student Login Form -->

      </div>
      <div class="modal-footer">
        <small id = "statusLogMsg"></small>
        <button type="button" class="btn btn-primary" id="stuLoginbtn" onclick="checkStuLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- End Student Login Modal -->



<!-- Start Admin Login Modal -->
<!-- Modal -->
<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <!-- Start Admin Login Form -->
        <form id="adminLoginForm">

          <div class="mb-3">
            <i class="fas fa-envelope"></i><label for="adminLogemail" class="form-label pl-2 font-weight-bold">Email</label>
            <input type="email" class="form-control" placeholder="Email" id="adminLogemail" name="adminLogemail" aria-describedby="emailHelp">

          </div>
          <div class="mb-3">
            <i class="fas fa-key"></i><label for="adminLogpass" class="form-label pl-2 font-weight-bold ">New Password</label>
            <input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass">
          </div>
        </form>
        <!-- End Admin Login Form -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="adminLoginbtn" onclick="checkAdminLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- End Admin Login Modal -->











<!-- Jquery and Bootstrap JavaScript -->
<script src="js/bootstrap.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>



<!-- Font Awesome JavaScript -->
<script src="js/all.min.js"></script>

<!-- Student Testimonial Owl Slider JS  -->
<script type="text/javascript" src="js/owl.min.js"></script>
<script type="text/javascript" src="js/testyslider.js"></script>


<!-- Student Ajax call JavaScript -->
<script type="text/javascript" src="js/ajaxrequest.js"></script>

<!-- Admin Ajax call JavaScript -->
<script type="text/javascript" src="js/admajaxrequest.js"></script>
</body>

</html>