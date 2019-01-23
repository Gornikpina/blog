<?php
require ('mysqli_connect.php');
if (isset($_POST["submit"]))
{
  if (!empty($_POST["ime"]) && !empty($_POST["email"]) && !empty($_POST["geslo1"]) && !empty($_POST["geslo2"]))
  {
    if($_POST['geslo1']==$_POST['geslo2'])
    {
      $ime = mysqli_real_escape_string($dbc, $_POST['ime']);
      $email = mysqli_real_escape_string($dbc, $_POST['email']);
      $geslo1 = md5($_POST['geslo1']);

      $qu = "SELECT * FROM Uporabnik WHERE email='$email' ";
      $rz = mysqli_query ($dbc, $qu) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
      if (mysqli_num_rows($rz) == 0)
      { // e-mail je na voljo
        $q = "INSERT into Uporabnik (geslo, email)
        VALUES ('$geslo1', '$email')";
        $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

        $sid=$_SESSION['id_uporabnika']=$email;
        //    header('Location: domov.php');
        header("Location: ../vpis.php?signup=success");
        exit();
      }
      else
      {
        echo "Uporabnik obstaja";
      }
    }
    else
    {
      echo "Gesli se ne ujemata";
    }
  }
  else
  {
  echo "Izpolnite vsa polja";
  }
}
