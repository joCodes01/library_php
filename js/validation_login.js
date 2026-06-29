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
    //error
    email.classList.remove("input-valid");
    email.classList.add("input-error");
    let message = document.getElementById("email-message");
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    message.textContent = "Enter your email.";
    return false;
  } else {
    //valid
    email.classList.remove("input-error");
  }
  if (email.value.length > 30) {
    //error
    email.classList.remove("input-valid");
    email.classList.add("input-error");
    let message = document.getElementById("email-message");
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    message.textContent = "Email must be less than 30 characters.";
    return false;
  } else {
    //valid
    email.classList.remove("input-error");
  }

  if (!email.value == "" && !emailRegex.test(email.value)) {
    //error
    email.classList.remove("input-valid");
    email.classList.add("input-error");
    let message = document.getElementById("email-message");
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    message.textContent = "Enter a vaild email address.";
    return false;
  } else {
    //valid
    email.classList.remove("input-error");
  }

  //save valid email
  validEmail = email.value.trim();

  ////////////////Validate password
  if (password.value == "") {
    password.classList.remove("input-valid");
    password.classList.add("input-error");
    let message = document.getElementById("password-message");
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    message.textContent = "Enter a password.";
    return false;
  } else {
    //valid
    email.classList.remove("input-error");
  }
  if (!password.value == "" && !passwordRegex.test(password.value)) {
    password.classList.remove("input-valid");
    password.classList.add("input-error");
    let message = document.getElementById("password-message");
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    message.textContent =
      "Password must be between 8 and 15 characters long, contain at least one uppercase letter, one lowercase letter, one number and one special character.";
    return false;
  } else {
    //valid
    email.classList.remove("input-error");
  }

  loginForm.submit();
});
