<?php
include 'header.php';
?>
<main>
  <div class="container sredina-strani">
    <div class="container pt-3">
      <div class="row justify-content-sm-center">
        <div class="col-sm-6 col-md-4">
          <div class="card border-info text-center">
            <div class="card-body">
              <form class="form-signin" action="includes/registracija.php" method="post">
                <label for="InputIme">Ime</label>
                <input type="text" class="form-control" name="ime"  placeholder="Ime" required>
                <label for="InputEmail">E-pošta</label>
                <input type="email" class="form-control" name="email"  placeholder="Vnesite e-pošto" required>
                <label for="InputGeslo">Geslo</label>
                <input type="password" class="form-control" name="geslo1" placeholder="Geslo" required>
                <label for="InputGeslo2">Ponovite geslo</label>
                <input type="password" class="form-control" name="geslo2" placeholder="Geslo" required>
                <br>
                <button type="submit" name="submit" class="btn btn-primary">Registriraj se!</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
include 'footer.php';
?>
