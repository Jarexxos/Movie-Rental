<?php
/*session_start();

include_once("db_login.php");
include_once("head.php");

$login = md5($_POST["login"]);
$haslo = md5($_POST['haslo']);

$sql = mysqli_query($conn,"SELECT login FROM users WHERE login ='$login'");

    if($sql->num_rows >0){
        
      $sql = mysqli_query($conn,"SELECT password FROM users WHERE login ='$login' AND password = '$haslo'");
        
      if($sql->num_rows> 0){
          
          $_SESSION['user'] = true;
          $sql->free_result();
          header('Location: order.php');
        
      }
      else
      {
        echo "błędne hasło";
      }
    
    }
    else{
        
      echo "nie ma takiego loginu";
    }
$conn->close();*/

session_start();

if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
    header('Location: index.php');
    exit();
}

$conn = @new mysqli('localhost','root','','movierental');

if($conn->connect_errno!=0)
{
   echo "Error".$conn->connect_errno;
}
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    
    $login = htmlentities($login,ENT_QUOTES, "UTF-8");
    
    if($result = @$conn->query(sprintf("SELECT * FROM users WHERE login='%s'",
                                       mysqli_real_escape_string($conn,$login))))
    {
        if($result->num_rows==1)
        {
            $tab=$result->fetch_assoc();
            
            if(password_verify($haslo,$tab['password']))
            {
                $_SESSION['zalogowany']=true;
                $_SESSION['idUser'] = $tab['id'];
                $_SESSION['login'] = $tab['login'];
                unset($_SESSION['blad']);
                $result->free_result();
                if($login=='admin')
                {
                    header('Location: ../admin/index.php');
                }
                else
                {
                    /*header('Location: ../zalogowany/index.php');*/
                    header('Location: order.php');
                }
            }else {
                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location: loginn.php');
            }
        } else {
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            header('Location: loginn.php');
        }
    }
    
    $conn->close();
}
?>