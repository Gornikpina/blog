<?php
require "header.php";
?>
<main>
  <div class="container sredina-strani">
    <div class="container pt-3">
      <div class="row justify-content-sm-center">
        <div class="col-sm-6 col-md-4">
          <div class="card border-info text-center">
            <div class="card-header">
              Naložite članek ...
            </div>
            <div class="card-body">
              <form class="form-signin" method="post" action="includes/nalaganje_clanka.php" enctype="multipart/form-data">
                <input type="text" class="form-control mb-2" placeholder="Naziv članka" name="filetitle" required autofocus>
                <textarea class="form-control" placeholder="Vsebina" name="filedesc" rows="3"></textarea><br>
                  <?php
                  include_once "includes/mysqli_connect.php";
                  $table_name = "clanek";
                  $column_name = "kategorija";
                  echo '<select class="form-control" name="kategorije">';
                  $sql = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name';";
                  $stmt = mysqli_stmt_init($dbc);
                  if (!mysqli_stmt_prepare($stmt,$sql))
                  {
                    echo "SQL statement failed!";
                  }
                  else
                  {
                    mysqli_stmt_execute($stmt);
                    $rezultat = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($rezultat);

                    $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));
                    foreach($enumList as $value)
                    {
                      echo "<option value=\"$value\">$value</option>";
                    }
                    echo "</select><br>";
                  }
                  ?>

                <input type="file" name="file">
                <br><br>
                <button class="btn btn-lg btn-primary btn-block mb-1" type="submit" name="submit">Dodaj članek</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<?php
require "footer.php";
?>
