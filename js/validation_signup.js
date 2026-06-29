import { wordRegex, emailRegex, passwordRegex } from "./regex.js";

//////REFACTOR THIS CODE - LOTS OF REPEATING CODE

///////////////SIGN UP FORM VALIDATION
let signUpForm = document.getElementById("form-signup");

let firstName = document.getElementById("firstname");
let lastName = document.getElementById("lastname");
let email = document.getElementById("create-email");
let password = document.getElementById("create-password");
let password2 = document.getElementById("password2");

signUpForm.addEventListener("submit", (event) => {
  event.preventDefault();

  ///////////////validate first name
  if (firstName.value.length < 2) {
    //error
    firstName.classList.remove("input-valid");
    firstName.classList.add("input-error");
    let message = document.getElementById("firstname-message");
    console.log(message);
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    message.textContent = "Enter a valid first name.";

    return false;
  } else {
    //valid
    firstName.classList.remove("input-error");
    firstName.classList.add("input-valid");
    let message = document.getElementById("firstname-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }
  if (firstName.value.length > 20) {
    //error
    firstName.classList.remove("input-valid");
    firstName.classList.add("input-error");
    let message = document.getElementById("firstname-message");
    message.textContent = "Name can't be longer that 20 characters.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    firstName.classList.remove("input-error");
    firstName.classList.add("input-valid");
    let message = document.getElementById("firstname-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }
  if (!firstName.value == "" && !wordRegex.test(firstName.value)) {
    //error
    firstName.classList.remove("input-valid");
    firstName.classList.add("input-error");
    let message = document.getElementById("firstname-message");
    message.textContent = "No special characters or numbers allowed.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    firstName.classList.remove("input-error");
    firstName.classList.add("input-valid");
    let message = document.getElementById("firstname-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }

  //////////////Validate last name
  if (lastName.value.length < 2) {
    //error
    lastName.classList.remove("input-valid");
    lastName.classList.add("input-error");
    let message = document.getElementById("lastname-message");
    message.textContent = "Enter a valid last name.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    lastName.classList.remove("input-error");
    lastName.classList.add("input-valid");
    let message = document.getElementById("lastname-message");
    message.classList.remove("error-text");
    message.classList.add("valid-text");

    message.classList.add("valid-text");
  }
  if (lastName.value.length > 20) {
    //error
    lastName.classList.remove("input-valid");
    lastName.classList.add("input-error");
    let message = document.getElementById("lastname-message");
    message.textContent = "Last name can't be longer that 20 characters.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    lastName.classList.remove("input-error");
    lastName.classList.add("input-valid");
    let message = document.getElementById("lastname-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }
  if (!lastName.value == "" && !wordRegex.test(lastName.value)) {
    //error
    lastName.classList.remove("input-valid");
    lastName.classList.add("input-error");
    let message = document.getElementById("lastname-message");
    message.textContent = "No special characters or numbers allowed.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    lastName.classList.remove("input-error");
    lastName.classList.add("input-valid");
    let message = document.getElementById("lastname-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }

  ////////////////Validate email
  if (!email.value == "" && !emailRegex.test(email.value)) {
    email.classList.remove("input-valid");
    email.classList.add("input-error");
    let message = document.getElementById("email-message");
    message.textContent = "Enter a vaild email address.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    email.classList.remove("input-error");
    email.classList.add("input-valid");
    let message = document.getElementById("email-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }
  if (email.value.length < 5) {
    //error
    email.classList.remove("input-valid");
    email.classList.add("input-error");
    let message = document.getElementById("email-message");
    message.textContent = "Enter your email.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    email.classList.remove("input-error");
    email.classList.add("input-valid");
    let message = document.getElementById("email-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }
  if (email.value.length > 30) {
    //error
    email.classList.remove("input-valid");
    email.classList.add("input-error");
    let message = document.getElementById("email-message");
    message.textContent = "Email must be less than 30 characters.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    email.classList.remove("input-error");
    email.classList.add("input-valid");
    let message = document.getElementById("email-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }

  ////////////////Validate password
  if (password.value == "") {
    password.classList.remove("input-valid");
    password.classList.add("input-error");
    let message = document.getElementById("password-message");
    message.textContent = "Enter a password.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    password.classList.remove("input-error");
    password.classList.add("input-valid");
    let message = document.getElementById("password-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }

  if (!password.value == "" && !passwordRegex.test(password.value)) {
    password.classList.remove("input-valid");
    password.classList.add("input-error");
    let message = document.getElementById("password-message");
    message.textContent =
      "Password must be between 8 and 15 characters long, contain at least one uppercase letter, one lowercase letter, one number and one special character.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    password.classList.remove("input-error");
    password.classList.add("input-valid");
    let message = document.getElementById("password-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }

  //////////////validate re-typed password
  if (password2.value == "") {
    password2.classList.remove("input-valid");
    password2.classList.add("input-error");
    let message = document.getElementById("password2-message");
    message.textContent = "Re-type your password.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    password2.classList.remove("input-error");
    password2.classList.add("input-valid");
    let message = document.getElementById("password2-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }
  if (password2.value !== password.value) {
    password2.classList.remove("input-valid");
    password2.classList.add("input-error");
    let message = document.getElementById("password2-message");
    message.textContent = "The passwords do not match.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    password2.classList.remove("input-error");
    password2.classList.add("input-valid");
    let message = document.getElementById("password2-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }

  if (!password.value == "" && !passwordRegex.test(password2.value)) {
    password2.classList.remove("input-valid");
    password2.classList.add("input-error");
    let message = document.getElementById("password2-message");
    message.textContent =
      "Password must be between 8 and 15 characters long, contain at least one uppercase letter, one lowercase letter, one number and one special character.";
    message.classList.remove("valid-text");
    message.classList.add("error-text");
    return false;
  } else {
    //valid
    password2.classList.remove("input-error");
    password2.classList.add("input-valid");
    let message = document.getElementById("password2-message");
    message.textContent = "Good!";
    message.classList.remove("error-text");
    message.classList.add("valid-text");
  }

  let signedUp = document.getElementById("message-success");
  signedUp.textContent = "You may now login with your new credentials.";
  console.log(signedUp);
  signUpForm.submit();
});
