import { emailRegex, passwordRegex } from "./regex.js";

///////////////////////////////////////// LOGIN FORM VALIDATION
let loginForm = document.getElementById("form-login");
console.log(loginForm);

let email = document.getElementById("email");
let password = document.getElementById("password");

let validEmail;
let validPassword;

loginForm.addEventListener("submit", (event) => {
  event.preventDefault();

  ////////////////Validate email
  if (email.value.length < 5) {
    alert("Enter your email.");
    return false;
  }
  if (email.value.length > 30) {
    alert("email must be less than 30 characters.");
    return false;
  }
  if (!email.value == "" && !emailRegex.test(email.value)) {
    alert("Enter a vaild email address.");
    return false;
  }
  //save valid email
  validEmail = email.value.trim();

  ////////////////Validate password
  if (password.value == "") {
    alert("Enter a password.");
    return false;
  }
  if (!password.value == "" && !passwordRegex.test(password.value)) {
    alert(
      "Password must be between 8 and 15 characters long, contain at least one uppercase letter, one lowercase letter, one number and one special character.",
    );
    return false;
  }

  //save valid password
  // validPassword = password.value.trim();

  loginForm.submit();
});
