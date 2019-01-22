<?php include 'header.php';
session_start();?>

<br>
<h3> Domača stran</h3>
<ul class="stranskiUl">

<?php

  require ('mysqli_connect.php');


     $q = "SELECT * FROM Kategorije";
  $r = mysqli_query ($dbc, $q);
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {

  ?>

      <?php $naziv= $row['naziv'] ?>
<?php $_SESSION['naziv']=$naziv;?>
  <li class="stranskiLi"><a href="prikazClankov.php?<?php echo $_SESSION['naziv'] ?>"> <?php echo $row['naziv']?></a></li>



  <?php
  }

  mysqli_close($dbc);
?>

  </ul>


</body>
</html>
<?php include 'footer.php' ; ?>
