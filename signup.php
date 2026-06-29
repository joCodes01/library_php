<?php 
require 'src/session.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="js/bootstrap.bundle.js" defer></script>
    <script type="module" src="js/validation_signup.js" defer></script>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Library</title>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"
          ><img src="images/logo.svg" alt="" width="80px"
        /></a>
        </div>
      </div>
    </nav>

    <div class="container-signup">
      <form
        name="form-signup"
        method="POST"
        action="src/process_signup.php"
        id="form-signup"
        class="form-signup bg-white p-5 rounded"
        novalidate
      >
        <h1>Sign up</h1>
        <p class="already-member">Already a member <a href="login.php">Login</a></p>
        <div class="mb-3">
          <label for="firstname" class="form-label">First name</label>
          <input
            type="text"
            id="firstname"
            name="firstname"
            class="form-control "
            maxlength="20"
            required
          />
          <span id="firstname-message" class=""></span>
          
        </div>
        <div class="mb-3">
          <label for="lastname" class="form-label">Last name</label>
          <input
            type="text"
            id="lastname"
            name="lastname"
            class="form-control"
            maxlength="20"
            required
          />
          <span id="lastname-message" class=""></span>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input
            type="text"
            id="create-email"
            name="email"
            class="form-control"
            required
          />
          <span id="email-message" class=""></span>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            id="create-password"
            name="password"
            class="form-control"
            autocomplete="new-password"
            required
          />
          <span id="password-message" class=""></span>
        </div>
        <div class="mb-3">
          <label for="password2" class="form-label">Re-type password</label>
          <input
            type="password"
            id="password2"
            name="password2"
            class="form-control"
            autocomplete="new-password"
            required
          />
          <span id="password2-message" class=""></span>
        </div>
        <span id="message-success" class="valid-text"></span>
        <button type="submit" class="btn btn-primary">Sign up</button>
      </form>
    </div>
  </body>
</html>
