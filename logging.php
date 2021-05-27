<?php include_once("head.php"); ?>
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
            <div class="jumbotron">
                <h1>Logowanie</h1>
                <form method="post" action="login.php" role="form">
                <input type="text" name="login" placeholder="Login" class="form-control"/>
                <input type="password" name="password" placeholder="Hasło" class="form-control"/>
                <input type="submit" name="submit" class="btn btn-primary" value="Zaloguj" name="loginn" />
                </form>
            </div>
        </div>
  </div>  
  <footer class="py-2 bg-dark fixed-bottom">
    <div class="container">
      <p class="m-0 text-center text-white">Wypożyczalnia wideo - Jarosław Urbaniak</p>
    </div>   
  </footer> 
</body>
</html>