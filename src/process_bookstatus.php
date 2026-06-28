<?php
require 'session.php';
require 'db_connect.php';

if (isset($_POST['book-status']) ){

//if this button is pressed - set the status to onloan and save this in the database.
$bookcopy_id = $_POST['bookcopy-id'];
var_dump($bookcopy_id);

$sql = "UPDATE book_copy SET status = ?, status_date = UTC_TIMESTAMP WHERE copy_id = $bookcopy_id";

$status = 'onloan';

$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $status);
$stmt->execute();

header('Location: ../books.php');


};


