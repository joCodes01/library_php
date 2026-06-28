<?php
require 'session.php';
require 'db_connect.php';
require 'regex.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book-id'] ?? null;
    $user_title = $_POST['title'] ?? null;
    $user_author = $_POST['author'] ?? null;
    $user_publisher = $_POST['publisher'] ?? null;
    $user_language = $_POST['language'] ?? null;
    $user_category = $_POST['category'] ?? null;
    $user_status = $_POST['status'] ?? null;

    $error_message = "";
    
    
    // ///// Validate user input

    //     ///// Validate title user input
    //     if ( $user_title == "" || strlen($user_title) > 50) {
    //         header('Location: ../editbook.php');
    //         exit();
    //     }
    //     if (!preg_match($word_regex, $user_title)){
    //         header('Location: ../editbook.php');
    //         exit();
    //     }

    //      ///// Validate last name
    //     if ( $user_author == "" || strlen($user_author) > 30) {
    //         header('Location: ../editbook.php?error=invalid_title');
    //         exit();
    //     }
    //      if (!preg_match($word_regex, $user_author)){
    //         header('Location: ../editbook.php?error=invalid_author');
    //         exit();
    //     }
    //     ///// Validate publisher
    //     if ( $user_publisher == "" || strlen($user_publisher) > 30) {
    //         header('Location: ../editbook.php?error=invalid_publisher');
    //         exit();
    //     }
    //       if (!preg_match($word_regex, $user_publisher)){
    //         header('Location: ../editbook.php?error=invalid_publisher');
    //         exit();
    //     }

    //     /////// Validate language
    //     if( $user_language != "english" &&
    //         $user_language != "french" &&
    //         $user_language != "german" &&
    //         $user_language != "mandarin" &&
    //         $user_language != "japanese" &&
    //         $user_language != "russian" &&
    //         $user_language != "other"
    //     ) {
    //         header('Location: ../editbook.php');
    //         exit();
    //     }

    //     ////// Validate category
    //     if( $user_category != "fiction" &&
    //         $user_category != "nonfiction" &&
    //         $user_category != "reference"
    //     ) {
    //         header('Location: ../editbook.php');
    //         exit();
    //     } 
    //     // ////// Validate status
    //     // if( $user_status != "available" &&
    //     //     $user_status != "onloan" &&
    //     //     $user_status!= "deleted"
    //     // ) {
    //     //     header('Location: ../editbook.php');
    //     //     exit();
    //     // } 




        $title = htmlspecialchars(trim($user_title));
        $author = htmlspecialchars(trim($user_author));
        $publisher = htmlspecialchars(trim($user_publisher));
        $language = htmlspecialchars(trim($user_language));
        $category = htmlspecialchars(trim($user_category));


    $stmt = $conn->prepare("UPDATE book 
                            SET 
                                title = ?, 
                                author = ?, 
                                publisher = ?, 
                                language = ?, 
                                category = ?
                            WHERE book_id = ?");
    $stmt->bind_param('ssssss', $title, $author, $publisher, $language, $category, $book_id);
    $stmt->execute();
    header('Location: ../books.php');
   

    }

