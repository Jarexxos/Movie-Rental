<?php
	$id = $_GET['id'];

	require_once "../db_login.php";

	$query = "DELETE FROM series WHERE id = '$id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Nie udało się usunąć danych! " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_series.php");
?>