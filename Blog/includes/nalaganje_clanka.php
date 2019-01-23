<?php
if (isset($_POST['submit']))
{
  $newFileName = "slika";
  $newFileName = strtolower(str_replace(" ", "-", $newFileName));

  $naziv_clanka = $_POST['filetitle'];
  $opis_clanka = $_POST['filedesc'];
  $izbrana_kategorija = $_POST['kategorije'];

  $file = $_FILES['file'];

  $fileName = $file["name"];
  $file_type = $file["type"];
  $fileTempName = $file["tmp_name"];
  $fileError = $file["error"];
  $fileSize = $file["size"];

  $fileExt = explode(".", $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array("jpg", "jpeg", "png");

  if (in_array($fileActualExt, $allowed))
  {
    if($fileError === 0)
    {
      if ($fileSize < 2000000)
      {
        $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
        $fileDestination = "../slike/slike_clankov/" . $imageFullName;



        if(empty($naziv_clanka) || empty($opis_clanka))
        {
          header("Location: ../nalozi_clanek.php?upload=emptyfields");
          exit();
        }
        else
        {
          include_once "mysqli_connect.php";

          $sql = "SELECT * FROM clanek;";
          $stmt = mysqli_stmt_init($dbc);

          if (!mysqli_stmt_prepare($stmt, $sql))
          {
            echo "SQL statement failed!";
          }
          else
          {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rowCount = mysqli_num_rows($result);

            $sql = "INSERT INTO clanek (naziv, vsebina, nazivSlike, kategorija, tk_clanek_uporabnik) VALUES (?,?,?,?,?);";
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
              echo "SQL statement2 failed!";
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "ssssi", $naziv_clanka, $opis_clanka, $imageFullName, $izbrana_kategorija, $_SESSION['id_uporabnika']);
                mysqli_stmt_execute($stmt);
                move_uploaded_file($fileTempName, $fileDestination);
                header("Location: nalaganje_clanka.php?upload=success");
            }
          }
        }
      }
      else
      {
       echo "File size is too big!";
       exit();
      }
    }
    else
    {
      echo "You had an error!";
      exit();
    }
  }
  else
  {
    echo "You need to upload a proper file type!";
    exit();
  }

}

 ?>
