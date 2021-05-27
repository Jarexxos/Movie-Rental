<?php	
	if(!isset($_POST['save_change'])){
		echo "Coś poszło nie tak!";
		exit;
	}

	$id = trim($_POST['id']);
	$tytul = trim($_POST['tytul']);
	$tworca = trim($_POST['tworca']);
	$opis = trim($_POST['opis']);
	$cena = floatval(trim($_POST['cena']));
	$premiera = trim($_POST['premiera']);

	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../img/series/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}

	require_once("../db_login.php");

	$query = "UPDATE series SET  
	tytul = '$tytul', 
	tworca = '$tworca', 
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
		header("Location: admin_edit_series.php?id=$id");
	}
?>