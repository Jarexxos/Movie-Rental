<?php
session_start();
include_once("db_login.php");

$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$message = $_POST["message"];

$sql = mysqli_query($conn,"INSERT INTO contact
(id, 
imie,
nazwisko,
email,
message) 
values 
('',
'$name',
'$surname',
'$email',
'$message')
")
or die(mysqli_error($conn));

$conn->close();

header("Location: index.php");

?>