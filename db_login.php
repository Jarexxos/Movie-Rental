<?php
require_once "head.php";

$conn = @new mysqli('localhost','root','','movierental'); 

if($conn->connect_errno!=0)
{
    echo "Error: ".$conn->connect_errno;
}

?>