import * as  FooterMessage from './footer_message.js';
$(document).ready(function () {
  FooterMessage.getFooterMessage();
  $("#signup_transition").on("click", function () {
    $(".signup").removeClass("hidden");
    $(".login").addClass("hidden");
  });

  $("#login_transition").on("click", function () {
    $(".login").removeClass("hidden");
    $(".signup").addClass("hidden");
  });
  let login_form = $("#login_form");
  let signup_form = $("#signup_form");
  $("#username").on("focus", function () {
    if ($("#response").is(":visible")) {
      $("#response").addClass("hidden");
      $("#message").html("");
    }
  });
  $("#password").on("focus", function () {
    if ($("#response").is(":visible")) {
      $("#response").addClass("hidden");
      $("#message").html("");
    }
  });
  login_form.on("submit", function (e) {
    e.preventDefault();
    let login_username = $("#username").val();
    let login_password = $("#password").val();

    $.post(
      "./php/login.php",
      { 'username': login_username, 'password': login_password },
      function (response) {
        let result = response;

        if (result.status === "success") {
          let userRole = result.role;
          location.href = "./homepage.html";
        } else {
          let error_field = $("#response");
          let error_message = $("#message");

          error_field.removeClass("hidden");
          error_message.html(`Log in Failed: ${result.message}`);
        }
      }
    );
  });
  signup_form.on("submit", function (e) {
    e.preventDefault();
    let signup_email = $("#email").val();
    let signup_username = $("#signup_username").val();
    let signup_password = $("#signup_password").val();
    console.log(signup_email , signup_username , signup_password)
    $.post(
      "./php/signup.php",
      {
        'username': signup_username,
        'email': signup_email,
        'password': signup_password
      },
      function (response) {
        
        let result = response;
        if (result.status === "success") {
          let userRole = result.role;
          location.href = "./homepage.html";
        } else {
          let error_field = $("#signup_response");
          let error_message = $("#signup_message");

          error_field.removeClass("hidden");
          error_message.html(`Sign Up Failed: ${result.message}`);
        }
      }
    );
  });
});
