<?php
require 'session.php';
require 'db_connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_email = $_POST['email'] ?? null;
    $user_password = $_POST['password'] ?? null;

    $email = trim($user_email);
    $password = trim($user_password);

    $stmt = $conn->prepare("SELECT password, user_type FROM user WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $password_hash = $user['password'];
    $user_type = $user['user_type'];

    if(password_verify( $password, $password_hash)) {
        
        $_SESSION['logged_in'] = true;
        $_SESSION['user_type'] = $user_type;
        var_dump($_SESSION['user_type']);
        header('Location: ../books.php');
        exit();
    }
}



