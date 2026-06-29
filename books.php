<?php
require 'src/session.php';
require 'src/db_connect.php';

// var_dump($_SESSION['logged_in']);
if( !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true ) {
  header('Location: login.php');
  exit();
}


$result = $conn->query("SELECT * FROM book");
$books = $result->fetch_all(MYSQLI_ASSOC);

$result = $conn->query("SELECT * FROM book_copy");
$book_copies = $result->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="js/bootstrap.bundle.js" defer></script>
    <script src="js/book_status.js" defer></script>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Books</title>
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="Index.php"
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
              <a class="nav-link" href="src/process_logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <h1 class="visually-hidden">Books</h1>
    <p class="display-user-type"><?= $_SESSION['user_type'] ?></p>
    <ul class="container-books ">

      <?php foreach($books as $book): ?>

        <li class="container-book bg-white rounded shadow-sm ">
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

          <?php
          
            $result = $conn->query("SELECT book_copy.status, book_copy.copy_id
            FROM book_copy 
            LEFT JOIN book ON book.book_id = book_copy.book_id WHERE book_copy.book_id = {$book['book_id']}");

            $book_copy = $result->fetch_assoc();    
            // print_r($book_copy);     
          ?>
          
<!-- ADD THE USER ID TO THE FORM THAT UPDATES THE STATUS -->
            <div class="container-book-btns">
              <form
                action="src/process_bookstatus.php"
                method="POST">
               <!-- hidden book id -->
                <input
                  type="hidden"
                  name="bookcopy-id"
                  id="bookcopy-id"
                  value="<?= $book_copy['copy_id'] ?>">
                <!-- book status / borrow book button -->
                <button
                  id="book-status"
                  type="submit"
                  class="book-status <?= $book_copy['status'] ?>"
                  name="book-status"
                  value=""><?= $book_copy['status'] ?></button>
              </form>
    


              <!-- ADMIN ONLY -->

              <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin"): ?>
                
             
                <div class='container-admin'>
                
                <!-- DELETE BOOK -->
                <?php if ($book_copy['status'] == 'available') : ?>
                  <form
                    method = "POST"
                    action="deletebook.php"
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
                  <?php endif ?>

                <!--  RETURN BOOK -->
                <?php if ($book_copy['status'] == 'onloan') : ?>
                  <form
                    method = "POST"
                    action="src/process_returnbook.php"
                    name="form-returnbook">
                  
                    <!-- hidden book id -->
                    <input
                      type="hidden"
                      name="copy-id"
                      id="copy-id"
                      value="<?= $book_copy['copy_id'] ?>">
                    <button
                      id="return-book"
                      class="return-book"
                      name="return-book"
                      >Return book</button>
                  </form>
                  <?php endif ?>

                  <!-- EDIT BOOK -->
                  <form
                    method="POST"
                    action="editbook.php"
                    name="form-editbook"
                    id="form-editbook"
                  >
                    <!-- hidden book id -->
                    <input
                      type="hidden"
                      name="book-id"
                      id="book-id"
                      value="<?= $book['book_id'] ?>">
                    <button
                      id="edit-book"
                      class="edit-book"
                      name="edit-book"
                      >Edit book</button>
                  </form>
                 
                </div>

              <?php endif ?>
            </div>
            
        </li>
      
      <?php endforeach; ?>
    </ul>
  </body>
</html>
