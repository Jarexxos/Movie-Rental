<?php
session_start();
include_once("db_login.php");

$login = md5($_POST["login"]);
$haslo = md5($_POST["password"]);
$imie = $_POST["imie"];
$nazwisko = $_POST["nazwisko"];
$email = $_POST['email'];

    if(isset($_POST['login']))
    {
        
        $wszystko_ok=true;
        
        $login=$_POST['login'];
        $haslo1=$_POST['password'];
        $haslo2=$_POST['password'];
          
        if(ctype_alnum($login)==false)
        {
            $wszystko_ok=false;
            $_SESSION['e_login']="Login może składać się tylko z liter i cyfr (bez polskich znaków)!";
        }
        
        if(strlen($haslo1)<4 || strlen($haslo2)>20)
        {
            $wszystko_ok=false;
            $_SESSION['e_haslo']="Hasło musi posiadać od 4 do 20 znaków!";
        }
        
        if($haslo1!=$haslo2)
        {
            $wszystko_ok=false;
            $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
        }
        
        $haslo_hash = password_hash($haslo1,PASSWORD_DEFAULT);
        
        /*require_once "db_login.php";*/
        mysqli_report(MYSQLI_REPORT_STRICT);
        
        try 
        {
            $conn = new mysqli('localhost','root','','movierental');
            if($conn->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                $result=$conn->query("SELECT id from users WHERE login='$login'");
                
                if(!$result) throw new Exception($conn->error);
                
                if($result->num_rows>0)
                {
                   
                    $wszystko_ok=false;
                    $_SESSION['e_login']="Już jest taki użytkownik!";
                     
                }
                
                if($wszystko_ok==true)
                {
                    if($conn->query("INSERT INTO users VALUES ('',
'$login',
'$haslo_hash',
'$imie',
'$nazwisko',
'$email')"))
                    {
                        $_SESSION['udanarejestracja']=true;
                        header('Location: index.php');
                    }
                    else
                    {
                        throw new Exception($conn->error);
                    }
                }
                
                $conn->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera!</span>';
            //echo '<br>Informacja developerska: '.$e;
        }
    }
/*
include_once("db_login.php");

$login = md5($_POST["login"]);
$haslo = md5($_POST["password"]);
$imie = $_POST["imie"];
$nazwisko = $_POST["nazwisko"];
$email = $_POST['email'];

$sql = mysqli_query($conn,"INSERT INTO users 
(id, 
login, 
password,
imie,
nazwisko,
email) 
values 
('',
'$login',
'$haslo',
'$imie',
'$nazwisko',
'$email')
")
or die(mysqli_error($conn));

$conn->close();

header("Location: index.php");*/

?>