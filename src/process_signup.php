<?php
require 'session.php';
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_firstname = $_POST['firstname'] ?? null;
    $user_lastname = $_POST['lastname'] ?? null;
    $user_email = $_POST['email'] ?? null;
    $user_password = $_POST['password'] ?? null;

    $error_message = "";

    


    ///// Validate user input

        ///// Validate first name user input
        if ( $user_firstname == "" || strlen($user_firstname) > 20) {
            header('Location: ../signup.php');
            exit();
        }
        if (!ctype_alpha($user_firstname)) {
             header('Location: ../signup.php');
            exit();
        }
         ///// Validate last name
        if ( $user_lastname == "" || strlen($user_lastname) > 20) {
            header('Location: ../signup.php');
            exit();
        }
        if (!ctype_alpha($user_lastname)) {
            header('Location: ../signup.php');
            exit();
        }

        ////// Validate email
        if($user_email == "" || strlen($user_email) > 30) {
            header('Location: ../signup.php');
            exit();
        }
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ../signup.php');
            exit();
        }

        /////// Validate password
        if (strlen($user_password) < 8 || strlen($user_password) > 255 ) {
            header('Location: ../signup.php');
            exit();
        }


        ///// sanitise user input
        $firstname = htmlspecialchars(trim($user_firstname));
        $lastname = htmlspecialchars(trim($user_lastname));
        $email = trim($user_email);
        $password = password_hash($user_password, PASSWORD_DEFAULT);

        /////// Check if user email exists in the db
        $stmt = $conn->prepare("SELECT password FROM user WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_row();

        ///////// if the user does not exist then add this new user to the database
        if( $user == 0) {
            $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param('ssss', $firstname, $lastname, $email, $password);
            $stmt->execute();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_type'] = "member";
            header('Location: ../books.php');
            exit();
        } else {
            echo "Sorry there has been an error creating your account.";
            header('Location: ../signup.php');
            exit();
        }
    }

