// Auth login using AJAX
$(document).ready(function () {
  $("#loginBtn").click(function () {
    var username = $("#username").val();
    var password = $("#password").val();

    if (username == "" || password == "") {
      $("#errorMsg").text("Please fill in all fields.").show();
      return;
    }

    $.ajax({
      url: "api/auth.php",
      type: "POST",
      data: {
        action: "login",
        username: username,
        password: password,
      },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          window.location.href = "index.php?page=main";
        } else {
          $("#errorMsg").text(response.message).show();
        }
      },
    });
  });

  // Allow enter key to login
  $("#password").keypress(function (e) {
    if (e.which == 13) {
      $("#loginBtn").click();
    }
  });
});
