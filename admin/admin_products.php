<?php
	session_start();
	require_once "admin_functions.php";
    require_once "head.php";
	$title = "Lista filmów";
	require_once "../db_login.php";
    
    
	function getAll($conn){
		$query = "SELECT * from movies ORDER BY id DESC";
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
            <div class="jumbotron">
            
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
<br><br><br><br>      
<a button type="button" class="btn btn-secondary btn-lg btn-block" href="admin_movies.php">Filmy</a><br>
<a button type="button" class="btn btn-secondary btn-lg btn-block" href="admin_series.php">Seriale</a><br>
<a button type="button" class="btn btn-secondary btn-lg btn-block" href="admin_tvs.php">Programy TV</a><br>


            </div></div></div>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>
  <footer class="py-2 bg-dark fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Wypożyczalnia wideo - Jarosław Urbaniak</p>
    </div>
    
  </footer>