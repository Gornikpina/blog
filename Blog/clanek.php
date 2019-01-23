<?php
include 'header.php';
?>
<main>
  <section class="gallery-block cards-gallery">
	    <div class="container">
	      <div class="row">
          <?php
          require ('includes/mysqli_connect.php');
          $idClanka = urldecode($_GET['id']);
          $_SESSION['id_clanka'] = $idClanka;
          $sql = "SELECT * FROM clanek WHERE idClanek = '$idClanka'";
          $stmt = mysqli_stmt_init($dbc);
          if (!mysqli_stmt_prepare($stmt, $sql))
          {
            echo "SQL statement failed.";
          }
          else
          {
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          while ($row = mysqli_fetch_assoc($result))
            {
              echo '
            <div class="wrapper">
              <div class="content-wrapper">
              <h1>'.$row["naziv"].'</h1>
                <br>
                <p><b>'.$row["kategorija"].'</b></p>
                <img class="velikost-slike" src="slike/slike_clankov/'.$row["nazivSlike"].'" alt="Card Image"><br>
                <br>
                <p>'.$row["vsebina"] .'</p>
              </div>
            </div><br><br><br>';
            }
          }
          ?>

	      </div>

        <div class="container">
  	      <div class="row">
            <div class="col-sm-5" >
            <table class="table">
              <tbody>
                <?php
                $sql = "SELECT * FROM komentar WHERE tk_komentar_clanek = '$idClanka'";
                $stmt = mysqli_stmt_init($dbc);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                  echo "SQL statement failed.";
                }
                else
                {
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                  while ($row = mysqli_fetch_assoc($result))
                  {
                      echo '
                      <tr>
                      <td>'.$row["vsebina"] .'</td>
                      </tr>';
                    }
                  }


                ?>
              </tbody>
            </table>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3"><br><br>
            <form class="form-signin" method="post" name="dodajKomentar" action="includes/dodajKomentar.php">
              <input type="text" class="form-control mb-2" placeholder="Komentar" name="komentar" required autofocus>
              <button class="btn btn-lg btn-primary btn-block mb-1" type="submit" name="komentar-submit">Dodaj komentar</button>
            </form>
          </div>
        </div><br><br><br>
	    </div>
    </section>
</main>
<?php
include 'footer.php';
?>
