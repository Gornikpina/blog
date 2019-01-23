<?php
include 'header.php';
require ('mysqli_connect.php');

?>
<br>
<div class="container">
<div class="row">
<div class="col-sm-8">
<?php
$q = "SELECT * FROM Kategorije WHERE naziv='Zdravje'";
$r = mysqli_query ($dbc, $q);
while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
$id=$row['idKategorije'];


  $qa = "SELECT * FROM Clanek WHERE Kategorije_idKategorije=$id";
  $ra = mysqli_query ($dbc, $qa);
  while ($rowa = mysqli_fetch_array ($ra, MYSQLI_ASSOC)) {


?>

<h2> <?php echo $rowa['naziv']?></h2>
 <?php echo $rowa['vsebina']?>
<hr>

<?php
}
}

//mysqli_close($dbc);
?>
</div>
<ul class="stranskiUl">
<div class="col-sm-2">
<?php

  //require ('mysqli_connect.php');


     $q = "SELECT * FROM Kategorije";
  $r = mysqli_query ($dbc, $q);
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {

  ?>

      <?php $naziv= $row['naziv'] ?>
<?php $_SESSION['naziv']=$naziv;?>
  <li class="stranskiLi"><a href="<?php echo $_SESSION['naziv'] ?>.php"> <?php echo $row['naziv']?></a></li>



  <?php
  }

  mysqli_close($dbc);
?>
</div> </div> </div></ul>
