<?php
	session_start();
    require_once "../head.php";
	if(!isset($_POST['submit'])){
		echo "Coś poszło nie tak, spróbuj ponownie!";
		exit;
	}
	require_once "../db_login.php";

	$name = $_POST['name'];
	$pass = $_POST['pass'];

	if($name == "" || $pass == ""){
		echo "Nazwa lub hasło są puste!";
		exit;
	}

	$name = mysqli_real_escape_string($conn, $name);
	$pass = mysqli_real_escape_string($conn, $pass);
	$pass = sha1($pass);

	$query = "SELECT admin, haslo FROM admin";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Error " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);

	if($name != $row['admin'] && $pass != $row['haslo']){
		echo "Nazwa lub hasło są niepoprawne";
		$_SESSION['admin'] = false;
		exit;
	}

	if(isset($conn)) {mysqli_close($conn);}
	$_SESSION['admin'] = true;
	header("Location: admin_products.php");
?>