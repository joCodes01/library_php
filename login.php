<?php 
require 'src/session.php';
if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== false) {
  header('Location: books.php');
  exit();
} 

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="js/bootstrap.bundle.js" defer></script>
    <script type="module" src="js/validation_login.js" defer></script>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Document</title>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"
          ><img src="images/logo.svg" alt="" width="80px" />
        </a>
      </div>
    </nav>

    <div class="container-signup">
      <form
        action="src/process_login.php"
        method="POST"
        id="form-login"
        name="form-login"
        class="form-signup bg-white p-5 rounded"
        novalidate
      >
        <div class="d-flex align-items-center justify-content-between">
          <h1>Login</h1>
          <a href="signup.php">Sign up</a>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" id="email" name="email" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            class="form-control"
          />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </body>
</html>
