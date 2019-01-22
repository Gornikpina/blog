<?php
require ('mysqli_connect.php');


  /* $q = "SELECT * FROM Kategorije";
$r = mysqli_query ($dbc, $q);
while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {

?>

    <?php $naziv= $row['naziv']; ?>



<?php */

if(isset($_GET["Zdravje"])){
$naziv="Zdravje";
  $qa = "SELECT Clanek_idClanek FROM Kategorije WHERE naziv=$naziv";
 $ra = mysqli_query ($dbc, $qa);
 while ($row = mysqli_fetch_array ($ra, MYSQLI_ASSOC)) {
   ?>

   <h4> <?php echo $row['Clanek_idClanek'] ?></h4>

   <?php
echo $naziv;
//}
}
}

mysqli_close($dbc);




 ?>
