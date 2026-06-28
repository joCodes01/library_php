<?php
require 'session.php';
require 'db_connect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['copy-id'])) {

        $copy_id = $_POST['copy-id'];
        var_dump($copy_id);

        $status = 'available';

        $stmt = $conn->prepare("UPDATE book_copy 
        SET status = ?
        WHERE  copy_id = $copy_id ");
        $stmt->bind_param('s', $status );
        $stmt->execute();

        header('Location: ../books.php');
        }
}