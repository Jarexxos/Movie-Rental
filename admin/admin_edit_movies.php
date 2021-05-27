<?php
	session_start();
	require_once "admin_functions.php";
	$title = "Edytuj filmy";
	require_once "../db_login.php";
    require_once "head.php";

	if(isset($_GET['id'])){
		$movie_id = $_GET['id'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($movie_id)){
		echo "Empty id! check again!";
		exit;
	}

	// get book data
	$query = "SELECT * FROM movies WHERE id = '$movie_id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Nie znaleziono danych " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
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
      
	<form method="post" action="edit_movies.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ID</th>
				<td><input type="text" name="id" value="<?php echo $row['id'];?>" readOnly="true"></td>
			</tr>
			<tr>
				<th>Tytul</th>
				<td><input type="text" name="tytul" value="<?php echo $row['tytul'];?>" required></td>
			</tr>
			<tr>
				<th>Reżyser</th>
				<td><input type="text" name="rezyser" value="<?php echo $row['rezyser'];?>" required></td>
			</tr>
			<tr>
				<th>Miniatruka</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Opis</th>
				<td><textarea name="opis" cols="40" rows="5"><?php echo $row['opis'];?></textarea>
			</tr>
			<tr>
				<th>Cena</th>
				<td><input type="text" name="cena" value="<?php echo $row['cena'];?>" required></td>
			</tr>
			<tr>
				<th>Premiera</th>
				<td><input type="text" name="premiera" value="<?php echo $row['premiera']; ?>" required></td>
			</tr>
		</table>
		<input type="submit" name="save_change" value="Zapisz" class="btn btn-success">
    
		<input type="reset" value="Cofnij zmiany" class="btn btn-danger">
	</form>
	<br/>
	<a href="admin_movies.php" class="btn btn-primary"><i class="fas fa-backward"></i> Powrót</a>
    </div></div>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>
  <footer class="py-2 bg-dark fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Wypożyczalnia wideo - Jarosław Urbaniak</p>
    </div>
    
  </footer>