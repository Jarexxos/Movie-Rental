<?php	
	// if save change happen
	if(!isset($_POST['save_change'])){
		echo "Coś poszło nie tak!";
		exit;
	}

	$id = trim($_POST['id']);
	$tytul = trim($_POST['tytul']);
	$rezyser = trim($_POST['rezyser']);
	$opis = trim($_POST['opis']);
	$cena = floatval(trim($_POST['cena']));
	$premiera = trim($_POST['premiera']);

	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../img/movies/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}

	require_once("../db_login.php");

	$query = "UPDATE movies SET  
	tytul = '$tytul', 
	rezyser = '$rezyser', 
	opis = '$opis', 
	cena = '$cena'";
	if(isset($image)){
		$query .= ", img='$image' WHERE id = '$id'";
	} else {
		$query .= " WHERE id = '$id'";
	}

	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Nie udało się edytować dnaych " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_edit_movies.php?id=$id");
	}
?>