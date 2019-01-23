<?php
include 'header.php';
?>
<main>
  <section class="gallery-block cards-gallery">
	    <div class="container">
	        <div class="row">
                <?php
                include_once 'includes/mysqli_connect.php';

                $sql = "SELECT * FROM clanek";
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
                    echo
                    '<div class="col-md-6 col-lg-4">
                      <div class="card border-0 transform-on-hover">
                        <a class="lightbox" href=""><img src="slike/slike_clankov/'.$row["nazivSlike"].'" alt="Card Image" class="card-img-top"></a>
    	                  <div class="card-body">
    	                   <h6><a href="#">'.$row["naziv"].'</a></h6>
    	                   '.$row["datum"].'
                         <br>
                         '.$row["vsebina"] .'
                         <br>
                         '.$row["kategorija"].'</p>
    	                  </div>
    	                </div>
                    </div>';
                  }
                }
                $timezone  = date_default_timezone_set("Europe/Ljubljana");
                $datum = date("d-m-Y h:i");
                echo "Datum ". $datum;

                ?>

	        </div>
	    </div>
    </section>
</main>
<?php
include 'footer.php';
?>
