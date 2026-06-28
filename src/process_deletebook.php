<?php
require 'session.php';
require 'db_connect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// var_dump($_POST);

    if (isset($_POST['book-id'])) {
        // var_dump($_POST['book-id']);
        $book_id = $_POST['book-id'];

    $stmt = $conn->prepare("DELETE FROM book WHERE book_id = ?");
    $stmt->bind_param('s', $book_id );
    $stmt->execute();

    header('Location: ../books.php ');


    }
}