<?php include 'header.php';
    require ('mysqli_connect.php');

if (isset($_POST["submit"])) {



if (!empty($_POST["ime"]) && !empty($_POST["slika"]) && !empty($_POST["email"]) && !empty($_POST["geslo1"]) && !empty($_POST["geslo2"]))

{

if($_POST['geslo1']==$_POST['geslo2']){
  $ime = mysqli_real_escape_string($dbc, $_POST['ime']);
    $slika = mysqli_real_escape_string($dbc, $_POST['slika']);
      $email = mysqli_real_escape_string($dbc, $_POST['email']);
        $geslo1 = md5($_POST['geslo1']);

        $qu = "SELECT * FROM Uporabnik WHERE email='$email' ";
        $rz = mysqli_query ($dbc, $qu) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
        if (mysqli_num_rows($rz) == 0) { // e-mail je na voljo



        $q = "INSERT into Uporabnik (uporabniskoIme, geslo, email, nazivSlike)
        VALUES ('$ime', '$geslo1', '$email', '$slika')";
        $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

        $sid=$_SESSION['m_un']=$email;
    //    header('Location: domov.php');
    echo "prijavljen";
}
else {
  echo "Uporabnik obstaja";
}

}
else {
  echo "Gesli se ne ujemata";
}


}
else {
  echo "Izpolnite vsa polja";
}
}
 ?>


<body>
  <br>
  <form method="post" action="registracija2.php">

<div class="container" align="center">

  <div class="form-group col-md-6" align="left">
    <label for="InputIme">Ime</label>
    <input type="text" class="form-control" name="ime"  placeholder="Ime" required>
</div>


  <div class="form-group col-md-6" align="left">
    <label for="InputEmail">E-posta</label>
    <input type="email" class="form-control" name="email"  placeholder="Vnesite e-pošto" required>
</div>

  <div class="form-group col-md-6" align="left">
    <label for="InputGeslo">Geslo</label>
    <input type="password" class="form-control" name="geslo1" placeholder="Geslo" required>
  </div>

  <div class="form-group col-md-6" align="left">
    <label for="InputGeslo2">Ponovite geslo</label>
    <input type="password" class="form-control" name="geslo2" placeholder="Geslo" required>
  </div>

<div class="form-group col-md-6" align="left">
  <label for="InputPriimek">slika</label>
  <input type="text" class="form-control" name="slika" placeholder="Priimek" required>
</div>
<div class="form-group col-md-6" align="left">
  <button type="submit" name="submit" class="btn btn-primary">Prijava</button>
</div>
</div>
</form>
<br><br><br>
</body>
</html>
