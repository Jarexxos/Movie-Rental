<!-- Dodawanie admina -->
<?php
session_start();
include_once("../db_login.php");

$login = md5($_POST["name"]);
$haslo = md5($_POST["pass"]);

$sql = mysqli_query($conn,"INSERT INTO admin(id, admin, haslo) values ('','$login','$haslo')")
or die(mysqli_error($conn));

$conn->close();

?>
