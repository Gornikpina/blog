<?php
include 'header.php';
?>
<main>
  <section class="gallery-block cards-gallery">
	    <div class="container">
	        <div class="row">
                <?php
                include_once 'includes/mysqli_connect.php';
                $kategorija = "Humor";
                $sql = "SELECT * FROM clanek where kategorija = '$kategorija'";
                $stmt = mysqli_stmt_init($dbc);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                  echo "SQL statement failed.";
                }
                else
                {
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                  //echo '<td>' . '<a href="movie.php?id='. urlencode($id) . '" target="_blank">'.$title.'</a>' . '</td>';
                  while ($row = mysqli_fetch_assoc($result))
                  {
                    $idClanka = $row["idClanek"];
                    echo
                    '<div class="col-md-6 col-lg-4">
                      <div class="card border-0 transform-on-hover">
                        <a class="lightbox" href=""><img src="slike/slike_clankov/'.$row["nazivSlike"].'" alt="Card Image" class="card-img-top"></a>
    	                  <div class="card-body">
    	                   <h6><a href="clanek.php?id='.urlencode($idClanka).'" target="_blank">'.$row["naziv"].'</a></h6>
                         <br>
    	                  </div>
    	                </div>
                    </div>';
                  }
                }
               ?>
	        </div>
	    </div>
    </section>
</main>
<?php
include 'footer.php';
?>
