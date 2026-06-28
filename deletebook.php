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

    <div class="container-book bg-white rounded">
        <h2 class="title display-10"><?=  $book['title'] ?></strong></h2>

        <div class="book-item">
            <p class="author "><strong>Author</strong></p>
            <p><?=  $book['author'] ?></p>
        </div>

        <div class="book-item">
            <p class="publisher "><strong>Publisher</strong></p>
            <p><?=  $book['publisher'] ?></p>
        </div>

        <div class="book-item">
            <p class="language book-item-title"><strong>Language</strong></p>
            <p><?=  $book['language'] ?></p>
        </div>

        <div class="book-item">
            <p class="category "><strong>Category</strong></p>
            <p><?=  $book['category'] ?></p>
        </div>



        <!-- DELETE BOOK -->
        <form
            method = "POST"
            action="src/process_deletebook.php"
            name="form-deletebook">
        
            <!-- hidden book id -->
            <input
                type="hidden"
                name="book-id"
                id="book-id"
                value="<?= $book['book_id'] ?>">
            <button
                id="delete-book"
                class="delete-book"
                name="delete-book"
                >Delete book</button>
        </form>
    </div>

  </body>
</html>
