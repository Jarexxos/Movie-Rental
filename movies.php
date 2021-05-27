<?php
session_start();
$count = 0;
$path = "db_login.php";
include_once "$path";

  $query = "SELECT id, img FROM movies";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Nie znaleziono danych " . mysqli_error($conn);
    exit;
  }

$title = "Katalog filmów";
include_once("head.php");
?>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Wypożyczalnia</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin/admin.php">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Kontakt</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registering.php">Rejestracja</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Wyloguj</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <div class="container">
    <div class="wrapper">
  <p class="lead text-center text-muted">Katalog filmów</p><br>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="col-md-3">
            <a href="movie.php?id=<?php echo $query_row['id']; ?>">
              <img class="img-responsive img-thumbnail" height="360px" width="248px" src="img/movies/<?php echo $query_row['img']; ?>">
            </a>
          </div>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
      </div>
    
      

<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
?>
      </div></div>
  <footer class="py-2 bg-dark fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Wypożyczalnia wideo - Jarosław Urbaniak</p>
    </div>  
  </footer> 
</body>
</html>
