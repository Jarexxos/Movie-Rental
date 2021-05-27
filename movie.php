<?php
  session_start();
  $id = $_GET['id'];

include_once("db_login.php");

  $query = "SELECT tytul, rezyser, cena, opis, img, premiera FROM movies WHERE id = '$id'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Nie znaleziono danych! " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Brak filmu!";
    exit;
  }

  $title = $row['tytul'];
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
     
     
     <div class="container">
        <div class="wrapper">
      <!-- Example row of columns -->
      <p class="lead" style="margin: 25px 0"><a href="movies.php">Filmy</a> > <?php echo $row['tytul']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="img/movies/<?php echo $row['img']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Opis filmu</h4>
          <p><?php echo $row['opis']; ?></p>
          <h4>Szczegóły</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "opis" || $key == "img" || $key == "tytul"){
                continue;
              }
              switch($key){
                case "premiera":
                  $key = "Premiera";
                  break;
                case "tytul":
                  $key = "Tytuł";
                  break;
                case "rezyser":
                  $key = "Reżyser";
                  break;
                case "cena":
                  $key = "Cena";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <form method="post" action="loginn.php">
            <input type="hidden" name="id" value="<?php echo $movie_id;?>">
            <input type="submit" value="Wykup dostęp" name="checkout" class="btn btn-primary">
          </form>
       	</div>
            </div></div></div><br><br>
      
      <footer class="py-2 bg-dark fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Wypożyczalnia wideo - Jarosław Urbaniak</p>
    </div>
    </footer>  
    </body>
</html>
