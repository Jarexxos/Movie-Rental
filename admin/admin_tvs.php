<?php
	session_start();
	require_once "admin_functions.php";
    require_once "head.php";
	$title = "Lista programów TV";
	require_once "../db_login.php";
    
    
	function getAll($conn){
		$query = "SELECT * from tvs ORDER BY id DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Nie znaleziono danych " . mysqli_error($conn);
			exit;
		}
		return $result;
	}
	$result = getAll($conn);
?>
      <div class="container">
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
      
	<p class="lead"><br><a href="admin_add_tvs.php" class="btn btn-success"><i class="fas fa-plus-circle"></i> Dodaj nowy program TV</a></p>
	
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>ID</th>
			<th>Tytył</th>
			<th>Studio</th>
			<th>Miniaturka</th>
			<th>Opis</th>
			<th>Cena</th>
			<th>Premiera</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['tytul']; ?></td>
			<td><?php echo $row['studio']; ?></td>
			<td><?php echo $row['img']; ?></td>
			<td class="tekst"><?php echo $row['opis']; ?></td>
			<td><?php echo $row['cena']; ?></td>
			<td><?php echo $row['premiera']; ?></td>
			<td><a href="admin_edit_tvs.php?id=<?php echo $row['id']; ?>">
			<i class="fas fa-edit" style="color: orange";></i></a></td>
			<td><a href="admin_delete_tvs.php?id=<?php echo $row['id']; ?>">
			<i class="fas fa-trash-alt" style="color:green";></a></td>
		</tr>
		<?php } ?>
	</table>
    <a href="admin_logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Wyloguj!</a><br><br>
    <a href="admin_products.php" class="btn btn-primary"><i class="fas fa-backward"></i> Powrót</a><br><br><br>
          </div></div>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>
  <footer class="py-2 bg-dark fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Wypożyczalnia wideo - Jarosław Urbaniak</p>
    </div>
    
  </footer>