<?php
require ('mysqli_connect.php');
if (isset($_POST["submit"]))
{
    $naziv = mysqli_real_escape_string($dbc, $_POST['naziv']);
    $vsebina = mysqli_real_escape_string($dbc, $_POST['vsebina']);
    $kategorija = mysqli_real_escape_string($dbc, $_POST['kategorije']);
    $id = $_SESSION['id_uporabnika'];
    $nazivSlike = "keks";

    $qu = "SELECT * FROM Clanek WHERE naziv='$naziv' ";
    $rz = mysqli_query ($dbc, $qu) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
    if (mysqli_num_rows($rz) == 0)
    { // ni se clanka s tem imenom, je na voljo
      $q = "INSERT into Clanek (naziv, vsebina, nazivSlike, kategorija, tk_clanek_uporabnik)
      VALUES ('$naziv', '$vsebina','$nazivSlike','$kategorija','$id')";
      $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

      header("Location: ../domov.php?upload=success");
      exit();
    }
}
?>
