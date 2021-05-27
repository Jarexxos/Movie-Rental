<?php
session_start();

include_once("db_login.php");
include_once("head.php");

$login = md5($_POST["login"]);
$haslo = md5($_POST['password']);

$sql = mysqli_query($conn,"SELECT login FROM users WHERE login ='$login'");

    if($sql->num_rows >0){
        
      $sql = mysqli_query($conn,"SELECT password FROM users WHERE login ='$login' AND password = '$haslo'");
        
      if($sql->num_rows> 0){
          
          $_SESSION['user'] = true;
          $sql->free_result();
          header('Location: index.php');
        
      }
      else
      {
        echo "błędne hasło";
      }
    
    }
    else{
        
      echo "nie ma takiego loginu";
    }
$conn->close();

?>