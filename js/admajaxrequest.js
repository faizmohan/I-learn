// Ajax call for admin login verification
function checkAdminLogin() {
  // console.log("Login clicked");
  var adminLogEmail = $("#adminLogemail").val();
  var adminLogPass = $("#adminLogpass").val();
  $.ajax({
    url: "Admin/admin.php",
    method: "POST",
    data: {
      checkLogemail: "checklogmail",
      adminLogEmail: adminLogEmail,
      adminLogPass: adminLogPass,
    },
    success: function (data) {
      // console.log(data);
      if (data == 0) {
        $("#statusAdminLogMsg").html(
          '<small class="alert alert-danger">Invalid Email Id or Password !</small>'
        );
      } else if (data == 1) {
        $("#statusAdminLogMsg").html(
          '<small class="alert alert-success">Success loading !</small>'
        );
        setTimeout(() => {
          window.location.href = "Admin/adminDashboard.php";
        }, 1000);
      }
    },
  });
}
