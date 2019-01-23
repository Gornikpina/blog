<?php
    require ('mysqli_connect.php');

if (isset($_POST["user"]) && isset($_POST["pass"]))
  {

    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

	// preverjanje veljavnosti upor. imena in gesla
    $q = "SELECT * FROM Uporabnik WHERE email='$user' AND geslo='$pass';";
    $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

  	if(mysqli_num_rows($r) == 1){
      $row = mysqli_fetch_assoc($r);
      $id = $row['idUporabnik'];

      session_start();
      $_SESSION['id_uporabnika']=$id;
      //$sid=$_SESSION['id_uporabnika']=$user;
      header('Location: ../domov.php');
    }
    else
    {
  echo "prijava ni bila uspešna";
  }
}
?>
