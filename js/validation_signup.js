import { wordRegex, emailRegex, passwordRegex } from "./regex.js";

///////////////SIGN UP FORM VALIDATION
let signUpForm = document.getElementById("form-signup");

let firstName = document.getElementById("firstname");
let lastName = document.getElementById("lastname");
let createEmail = document.getElementById("create-email");
let createPassword = document.getElementById("create-password");
let password2 = document.getElementById("password2");

signUpForm.addEventListener("submit", (event) => {
  event.preventDefault();

  ///////////////validate first name
  if (firstName.value.length < 2) {
    alert("Enter a valid first name.");
    return false;
  }

  if (firstName.value.length > 20) {
    alert("Name can't be longer that 20 characters.");
    return false;
  }
  if (!firstName.value == "" && !wordRegex.test(firstName.value)) {
    alert("No special characters or numbers allowed.");
    return false;
  }

  //////////////Validate last name
  if (lastName.value.length < 2) {
    alert("Enter a valid last name.");
    return false;
  }
  if (lastName.value.length > 20) {
    alert("Last name can't be longer that 20 characters.");
    return false;
  }
  if (!lastName.value == "" && !wordRegex.test(lastName.value)) {
    alert("No special characters or numbers allowed.");
    return false;
  }

  ////////////////Validate email
  if (createEmail.value.length < 5) {
    alert("Enter your email.");
    return false;
  }
  if (createEmail.value.length > 30) {
    alert("email must be less than 30 characters.");
    return false;
  }
  if (!createEmail.value == "" && !emailRegex.test(createEmail.value)) {
    alert("Enter a vaild email address.");
    return false;
  }

  ////////////////Validate password
  if (createPassword.value == "") {
    alert("Enter a password.");
    return false;
  }
  if (
    !createPassword.value == "" &&
    !passwordRegex.test(createPassword.value)
  ) {
    alert(
      "Password must be between 8 and 15 characters long, contain at least one uppercase letter, one lowercase letter, one number and one special character.",
    );
    return false;
  }

  //////////////validate re-typed password
  if (password2.value == "") {
    alert("Re-type your password.");
    return false;
  }
  if (password2.value !== createPassword.value) {
    alert("The passwords do not match.");
    return false;
  }

  if (!createPassword.value == "" && !passwordRegex.test(password2.value)) {
    alert(
      "Password must be between 8 and 15 characters long, contain at least one uppercase letter, one lowercase letter, one number and one special character.",
    );
    return false;
  }
  alert("You may now login with your new credentials.");
  signUpForm.submit();
});
