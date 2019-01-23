<?php
session_start();
require ('mysqli_connect.php');

if (isset($_POST['komentar-submit']))
  {

    $uporabnik = $_SESSION['id_uporabnika'];
    $vsebina =$_POST['komentar'];
    $clanek = $_SESSION['id_clanka'];

	// preverjanje veljavnosti upor. imena in gesla
    $sql = "SELECT * FROM komentar;";
    $stmt = mysqli_stmt_init($dbc);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
      echo "SQL statement failed!";
    }
    else
    {
      mysqli_stmt_execute($stmt);

      $sql = "INSERT INTO komentar (vsebina, tk_komentar_uporabnik, tk_komentar_clanek) VALUES (?,?,?);";
      if (!mysqli_stmt_prepare($stmt, $sql))
      {
        echo "SQL statement2 failed!";
      }
      else
      {
          mysqli_stmt_bind_param($stmt, "sii", $vsebina, $uporabnik, $clanek);
          mysqli_stmt_execute($stmt);
          header("Location: ../domov.php");
      }
    }
}
?>
