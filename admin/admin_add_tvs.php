<?php
	session_start();
	require_once "admin_functions.php";
	$title = "Dodaj nowy program TV";
	require "../db_login.php";
    require_once "head.php";

	if(isset($_POST['add'])){
		$id = trim($_POST['id']);
		$id = mysqli_real_escape_string($conn, $id);
		
		$tytul = trim($_POST['tytul']);
		$tytul = mysqli_real_escape_string($conn, $tytul);

		$studio = trim($_POST['studio']);
		$studio = mysqli_real_escape_string($conn, $studio);
		
		$opis = trim($_POST['opis']);
		$opis = mysqli_real_escape_string($conn, $opis);
		
		$cena = floatval(trim($_POST['cena']));
		$cena = mysqli_real_escape_string($conn, $cena);
		
		$premiera = trim($_POST['premiera']);
		$premiera = mysqli_real_escape_string($conn, $premiera);

		// add image
		if(isset($_FILES['img']) && $_FILES['img']['name'] != ""){
			$image = $_FILES['img']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../img/tvs/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['img']['tmp_name'], $uploadDirectory);
		}


		$query = "INSERT INTO tvs VALUES ('" . $id . "', '" . $tytul . "', '" . $studio . "', '" . $image . "', '" . $opis . "', '" . $cena . "', '" . $premiera . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Nie można dodać danych do bazy " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_products.php");
		}
	}
?><div class="container">
        <div class="wrapper">
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="../index.php">Wypożyczalnia</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../admin/admin.php">Admin</a>
              </li>
              <li class="nav-item">
               <a class="nav-link" href="../contact.php">Kontakt</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../registering.php">Rejestracja</a>
              </li>
              <li class="nav-item">
            <a class="nav-link" href="admin_logout.php">Wyloguj</a>
          </li>
            </ul>
          </div>
        </div>
      </nav>
      
	<form method="post" action="admin_add_tvs.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ID </th>
				<td><input type="text" name="id"></td>
			</tr>
			<tr>
				<th>Tytuł</th>
				<td><input type="text" name="tytul" required></td>
			</tr>
			<tr>
				<th>Studio</th>
				<td><input type="text" name="studio" required></td>
			</tr>
			<tr><th>Miniaturka (../img/tvs)</th>
				<td><input type="file" name="img"></td>
			</tr>
			<tr>
				<th>Opis</th>
				<td><textarea name="opis" cols="40" rows="5"></textarea></td>
			</tr>
			<tr>
				<th>Cena</th>
				<td><input type="text" name="cena" required></td>
			</tr>
			<tr>
				<th>Premiera</th>
				<td><input type="text" name="premiera" required></td>
			</tr>
		</table>
		<input type="submit" name="add" value="Dodaj program TV" class="btn btn-success">
		<input type="reset" value="Wyczyść" class="btn btn-danger"><br><br>
		<a href="admin_tvs.php" class="btn btn-primary"><i class="fas fa-backward"></i> Powrót</a>
	</form>
            <br/></div></div>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>
  <footer class="py-2 bg-dark fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Wypożyczalnia wideo - Jarosław Urbaniak</p>
    </div>
    
  </footer>