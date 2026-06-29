<?php 
require 'src/session.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="js/bootstrap.bundle.js"></script>
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
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 bg-light">
            <li class="nav-item">
               <li class="nav-item">
              <a class="nav-link" href="books.php">Browse books</a>
            </li>
              <a class="nav-link" href="login.php">Login</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="src/process_logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-image-welcome">
      <img src="images/library.jpg" alt="Students in a library." width="1280px" height="853px"/>
    </div>
    <div class="container-welcome">
      <h1 class="title-welcome">Welcome to Australia University Library</h1>
      <a href="signup.php">Sign up</a>
      <div class="container-login-home">
        <p>Already a member </p>
        <a href="login.php">login</a>
      </div>
    </div>
    <div class="m-4">
      <div class="container-whatson">
        <h2>What's on</h2>
        <strong>
          <p class="mb-2">We have a variety of social and educational events for students.</p>
        </strong>
        <ul>
          <li>Subject based networking</li>
          <li>Book club</li>
          <li>Evening language classes</li>
          <li>Morning coffee & code </li>
          <li>Creative project group brainstorming</li>
        </ul>
      </div>
    </div>
  </body>

</html>
