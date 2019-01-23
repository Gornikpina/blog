<?php
include 'header.php';
?>
<main>
  <div class="container sredina-strani">
    <div class="container pt-3">
      <div class="row justify-content-sm-center">
        <div class="col-sm-6 col-md-4">
          <div class="card border-info text-center">
            <div class="card-header">
              Vpišite se za nadaljevanje ...
            </div>
            <div class="card-body">
              <form class="form-signin" method="post" name="vpis" action="includes/login.php">
                <label for="InputEmail">E-pošta</label>
                <input type="email" class="form-control" name="user" placeholder="Vnesite e-pošto">
                <label for="InputGeslo">Geslo</label>
                <input type="password" class="form-control" name ="pass"placeholder="Geslo">
                <br>
                <button class="btn btn-lg btn-primary btn-block mb-1" type="submit" name="login-submit">Prijava</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br>
</main>
<?php
include 'footer.php';
?>
