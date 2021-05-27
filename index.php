<?php 
session_start();

if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
{
    
}
/*===========================================
  $id = $_GET['id'];

include_once("db_login.php");

  $query = "SELECT * FROM movies WHERE id = '$id'";
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
===========================================*/
include("head.php"); ?>
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

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Kategorie</h1>
        <div class="list-group">
          <a href="movies.php" class="list-group-item">Filmy</a>
          <a href="series.php" class="list-group-item">Seriale</a>
          <a href="tvs.php" class="list-group-item">Programy TV</a>
        </div>

      </div>
      

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="img/kinematograf.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/kinematograf2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/kinematograf3.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="movie.php?id=1"><img class="card-img-top" src="img/item1.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="movie.php?id=1">Skywalker. Odrodzenie</a>
                </h4>
                <h5></h5>
                <p class="card-text">Członkowie organizacji Ruchu Oporu ponownie stawiają czoła Najwyższemu Porządkowi.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="serie.php?id=1"><img class="card-img-top" src="img/item2.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="serie.php?id=1">Wojny Klonów</a>
                </h4>
                <h5></h5>
                <p class="card-text">Wielka Armia Republiki, prowadzona przez rycerzy Jedi, stawia czoło siłom zbrojnym separatystów.
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="tv.php?id=1"><img class="card-img-top" src="img/item3.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="tv.php?id=1">The Grand Tour</a>
                </h4>
                <h5></h5>
                <p class="card-text">Jeremy, Richard i James podróżują po wszystkich kontynentach testując nowe pojazdy od producentów z całego świata.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="movie.php?id=2"><img class="card-img-top" src="img/item4.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="movie.php?id=2">Assassin's Creed</a>
                </h4>
                <h5></h5>
                <p class="card-text">Wskocz do świata Asasynów.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="serie.php?id=2"><img class="card-img-top" src="img/item5.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="serie.php?id=2">Lucyfer</a>
                </h4>
                <h5></h5>
                <p class="card-text">Władca Piekieł postanawia zamieszkać w Los Angeles.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="tv.php?id=2"><img class="card-img-top" src="img/item6.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="tv.php?id=2">Top Gear</a>
                </h4>
                <h5></h5>
                <p class="card-text">Prowadzący rozmawiają o wszystkim, co jest związane z samochodami, w swoim własnym, często kontrowersyjnym stylu.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

        </div>
        

      </div>
      

    </div>
    

  </div>

  

  
  <footer class="py-2 bg-dark bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Wypożyczalnia wideo - Jarosław Urbaniak</p>
    </div>
    
  </footer>
</body>
</html>