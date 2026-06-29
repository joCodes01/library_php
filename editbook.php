<?php 
require 'src/session.php';
if( !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true ) {
  header('Location: login.php');
  exit();
}
if( !isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin' ) {
  header('Location: books.php');
  exit();
}

require 'src/db_connect.php';


// set the variables used in the form incase redirected back without POST request
$title = "";
$author="";
$publisher = "";
$language = "";
$category = "";
$book_id = "";

// if POST request then find the book in the database and display the book details in the edit book form

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$book_id = $_POST['book-id'];

$stmt = $conn->prepare("SELECT title, author, publisher, language, category, book_id FROM book WHERE book_id = ?");
$stmt->bind_param('s', $book_id );
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();

$book_id = $book['book_id'];
$title = (string)$book['title']; 
$author = (string)$book['author']; 
$publisher = (string)$book['publisher']; 
$language =  $book['language']; 
$category = $book['category']; 
}




?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="js/bootstrap.bundle.js" defer></script>
    <script type="module" src="js/validation_editbook.js" defer></script>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Edit book</title>
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
              <a class="nav-link active" aria-current="page" href="books.php"
                >Browse books</a
              >
            </li>

            <li class="nav-item">
              <a class="nav-link" href="src/process_logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-editbook shadow-sm">
      <form
        method="POST"
        action="src/process_editbook.php"
        id="form-editbook"
        class="form-signup bg-white p-5 rounded"
      >
        <h1>Edit book</h1>
        <input 
          type="hidden"
          name="book-id"
          value="<?= $book_id ?>" >
        <div class="mb-3">
          <label for="title" class="form-label">Book title</label>
          <input 
            type="text" 
            id="title" 
            name="title" 
            class="form-control"
            value="<?= $title ?>" />
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input 
          type="text" 
          id="author" 
          name="author" 
          class="form-control" 
          value="<?= $author ?>"/>
        </div>
        <div class="mb-3">
          <label for="publisher" class="form-label">Publisher</label>
          <input
            type="text"
            id="publisher"
            name="publisher"
            class="form-control"
            value="<?= $publisher ?>"
          />
        </div>
        <div>
          <div class="mb-3">
            <label for="language" class="form-label">Language</label>
            <select
              id="language"
              name="language"
              class="form-select"
              aria-label="Default select example"
            >
              <option value="english" <?= ($language == 'english') ? "selected" : "" ?>>English</option>
              <option value="french" <?= ($language == 'french') ? "selected" : "" ?>>French</option>
              <option value="german" <?= ($language == 'german') ? "selected" : "" ?>>German</option>
              <option value="mandarin" <?= ($language == 'mandarin') ? "selected" : "" ?>>Mandarin</option>
              <option value="japanese" <?= ($language == 'japanese') ? "selected" : "" ?>>Japanese</option>
              <option value="russian" <?= ($language == 'russian') ? "selected" : "" ?>>Russian</option>
              <option value="other" <?= ($language == 'other') ? "selected" : "" ?>>Other</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select
              id="category"
              name="category"
              class="form-select"
              aria-label="Default select example"
            >
             <option value="fiction" <?= ($category == 'fiction') ? "selected" : "" ?>>Fiction</option>
              <option value="nonfiction" <?= ($category == 'nonfiction') ? "selected" : "" ?>>Non fiction</option>
              <option value="reference" <?= ($category == 'reference') ? "selected" : "" ?>>Reference</option>
               </select>
          </div>
             <!-- <div class="mb-3">
            <label for="category" class="form-label">Status</label>
            <select
              id="status"
              name="status"
              class="form-select"
              aria-label="Default select example"
            >
              <option value="available" selected>Available</option>
              <option value="onloan">On loan</option>
              <option value="deleted">Deleted</option>
            </select>
          </div> -->
          <button type="submit" id="btn-editbook" class="btn btn-primary ">Submit</button>
        </div>
      </form>
      <!-- <form
      name=""
      method="POST"
      action="src/process_deletebook.php">
        <input 
        type="hidden"
        value=""
        >
      </form> -->
    </div>
  </body>
</html>
