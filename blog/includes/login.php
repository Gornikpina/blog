<?php
include 'header.php';


    require ('mysqli_connect.php');

if (isset($_POST["user"]) && isset($_POST["pass"]))
{

  $user = $_POST['user'];
    $pass = md5($_POST['pass']);

	// preverjanje veljavnosti upor. imena in gesla
  $q = "SELECT * FROM Uporabnik WHERE email='$user' AND geslo='$pass' ";
  $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

    $st_vrstic = mysqli_num_rows($r);
  	if($st_vrstic > 0){

session_start();
$sid=$_SESSION['m_un']=$user;
//header('Location: seznam.php');
//echo"$sid";
echo "prijavljen";

}
else{
  echo "prijava ni bila uspešna";
}



}

?>

<html>
  <head>
    <title>Prijavni obrazec</title>
  </head>



<body>
  <br>
  <form action="login.php" method="post">

<div class="container" align="center">
  <div class="form-group col-md-6" align="left">
    <label for="InputEmail">E-posta</label>
    <input type="email" class="form-control" id="email"  name="user" placeholder="Vnesite e-pošto">

  </div>
  <div class="form-group col-md-6" align="left">
    <label for="InputGeslo">Geslo</label>
    <input type="password" class="form-control" id="geslo" name ="pass"placeholder="Geslo">
  </div>
<div class="form-group col-md-6" align="left">
  <button type="submit" class="btn btn-primary">Prijava</button>
</div>
</div>
</form>
<br><br><br>
</body>
</html>
