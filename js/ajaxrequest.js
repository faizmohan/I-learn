$(document).ready(function () {
  // ajax call form already exists email verification
  // keypress and blur from jquery
  $("#stuemail").on("keypress blur", function () {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuemail = $("#stuemail").val();
    $.ajax({
      url: "Student/addStudent.php",
      method: "POST",
      data: {
        checkmail: "checkmail",
        stuemail: stuemail,
      },
      success: function (data) {
        // console.log(data);
        if (data != 0) {
          $("#statusMsg2").html(
            '<small style="color:red;">Email already used !</small>'
          );
          $("#signup").attr("disabled", true);
        } else if (data == 0 && reg.test(stuemail)) {
          $("#statusMsg2").html(
            '<small style="color:green;">There you go !</small>'
          );
          $("#signup").attr("disabled", false);
        } else if (!reg.test(stuemail)) {
          $("#statusMsg2").html(
            '<small style="color:red;">Please enter valid Email e.g. example@gmail.com</small>'
          );
          $("#signup").attr("disabled", true);
        }
        if (stuemail == "") {
          $("#statusMsg2").html(
            '<small style="color:red;">Email field cannot be empty</small>'
          );
          $("#signup").attr("disabled", true);
        }
      },
    });
  });
});

function addStu() {
  var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var stuname = $("#stuname").val(); //val is jquery function
  var stuemail = $("#stuemail").val();
  var stupass = $("#stupass").val();

  // Checking form fields on Form submission
  if (stuname.trim() == "") {
    $("#statusMsg1").html(
      '<small style="color:red;">Please enter Name</small>'
    );
    $("#stuname").focus();
    return false;
  } else if (stuemail.trim() == "") {
    $("#statusMsg2").html(
      '<small style="color:red;">Please enter Email</small>'
    );
    $("#stuemail").focus();
    return false;
  } else if (stuemail.trim() != "" && !reg.test(stuemail)) {
    $("#statusMsg2").html(
      '<small style="color:red;">Please enter valid Email e.g. example@gmail.com</small>'
    );
    $("#stuemail").focus();
    return false;
  } else if (stupass.trim() == "") {
    $("#statusMsg3").html(
      '<small style="color:red;">Please enter Password</small>'
    );
    $("#stupass").focus();
    return false;
  } else {
    // console.log(stuname);
    // console.log(stuemail);
    // console.log(stupass);
    $.ajax({
      url: "Student/addStudent.php",
      method: "POST",
      dataType: "json",
      data: {
        stusignup: "stusignup",
        stuname: stuname,
        stuemail: stuemail,
        stupass: stupass,
      },
      success: function (data) {
        console.log(data);
        if (data == "OK") {
          $("#successMsg").html(
            "<span class='alert alert-success'>Registration Successful !</span>"
          );
          clearStuRegField();
        } else if (data == "Failed") {
          $("#successMsg").html(
            "<span class='alert alert-danger'>Unable to register!</span>"
          );
        }
      },
    });
  }
}

// Empty all fields of form
function clearStuRegField() {
  $("#stuRegForm").trigger("reset");
  $("#statusMsg1").html(" ");
  $("#statusMsg2").html(" ");
  $("#statusMsg3").html(" ");
}

// Ajax call for student login verification
function checkStuLogin() {
  // console.log("Login clicked");
  var stuLogEmail = $("#stuLogemail").val();
  var stuLogPass = $("#stuLogpass").val();
  $.ajax({
    url: "Student/addStudent.php",
    method: "POST",
    data: {
      checkLogemail: "checklogmail",
      stuLogEmail: stuLogEmail,
      stuLogPass: stuLogPass,
    },
    success: function (data) {
      // console.log(data);
      if (data == 0) {
        $("#statusLogMsg").html(
          '<small class="alert alert-danger">Invalid Email Id or Password !</small>'
        );
      } else if (data == 1) {
        $("#statusLogMsg").html(
          '<div class="spinner-border text-success" role="status"></div>'
        );
        setTimeout(() => {
          window.location.href = "index.php";
        }, 1000);
      }
    },
  });
}
