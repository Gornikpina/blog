<!DOCTYPE html>
<html>
<head>
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- konec bootstrapa -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="css/stili.css">
</head>
<body>
  <div class="container footer-stil">
    <div class="row">
      <div class="col text-center"><h6><b>O nas</b></h6>
        <hr class="footer-hr">
        <p class="o_nas">
          Platforma Blog omogoča uporabnikom, da delijo svoje
          zgodbe.
        </p>
      </div>
      <div class="col text-center"><h6><b>Kontakt</b></h6>
        <hr class="footer-hr">
        <p>
          <b>E-naslov:</b> blog@gmail.com<br>
          <b>Tel. št.:</b> 02 800 2314 <br>
        </p>
      </div>
      <div class="col text-center"><h6><b>Lokacija</b></h6>
        <hr class="footer-hr">
        <div class="mapouter">
          <div class="gmap_canvas">
            <iframe width="125" height="125" id="gmap_canvas"
            src="https://maps.google.com/maps?q=FERI%20MARIBOR&t=&z=13&ie=UTF8&iwloc=&output=embed"
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
            </iframe>
            <a href="https://www.embedgooglemap.net"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
