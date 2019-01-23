<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
  <title>Blog</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- konec bootstrapa -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="css/stili.css">
</head>
<body>
<div class="container">
  <br>
  <div class="text-center">
    <h2 class="logotip">Blog</h2><br>
  </div>
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

      <?php
        if (isset($_SESSION['id_uporabnika']))
        {
          echo '<li class="nav-item active">
            <a class="nav-link" href="domov.php">Domov<span class="sr-only">(current)</span></a>
            </li>';
          echo '<li class="nav-item">
            <a class="nav-link" href="Humor.php">Humor</a>
            </li>';
          echo '<li class="nav-item">
            <a class="nav-link" href="Novice.php">Novice</a>
            </li>';
          echo '<li class="nav-item">
            <a class="nav-link" href="Umetnost.php">Umetnost</a>
            </li>';
          echo '<li class="nav-item">
            <a class="nav-link" href="Zdravje.php">Zdravje</a>
            </li>';
          echo '<li class="nav-item">
            <a class="nav-link" href="nalozi_clanek.php">Naloži</a>
            </li>';
        }
        else
        {
          echo '<li class="nav-item active">
            <a class="nav-link" href="domov.php">Domov<span class="sr-only">(current)</span></a>
            </li>';
            echo '<li class="nav-item">
              <a class="nav-link" href="humor.php">Humor</a>
              </li>';
            echo '<li class="nav-item">
              <a class="nav-link" href="novice.php">Novice</a>
              </li>';
            echo '<li class="nav-item">
              <a class="nav-link" href="umetnost.php">Umetnost</a>
              </li>';
            echo '<li class="nav-item">
              <a class="nav-link" href="zdravje.php">Zdravje</a>
              </li>';
      }
      ?>


    </ul>
    <?php
      if (isset($_SESSION['id_uporabnika']))
      {
        echo '<form class="my-2 my-lg-0" action="includes/logout.php">&nbsp
          <button class="btn btn-sm btn-outline-secondary" type="submit">Izpis</button>
        </form>';
        echo '<form class="my-2 my-lg-0" action="profil.php">&nbsp
          <button class="btn btn-sm btn-outline-secondary" type="submit">Moj profil</button>
        </form>';
      }
      else
      {
        echo '<form class="my-2 my-lg-0" action="vpis.php">&nbsp
          <button class="btn btn-sm btn-outline-secondary" type="submit">Vpis</button>
        </form>
        <form class="my-2 my-lg-0" action="registracija.php">&nbsp
          <button class="btn btn-sm btn-outline-secondary" type="submit">Registracija</button>
        </form>';
      }
     ?>
  </div>
</nav><br>
</div>
</body>
</html>
