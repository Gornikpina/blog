<?php
session_start(); //da lahko dobim id uporabnika, drugače ne morem uporabit pri vnosu
if(isset($_POST['clanek-submit']))
  {
    print_r( $_SESSION['id_uporabnika']);

      $newFileName = "slika";

      $newFileName = strtolower(str_replace(" ", "-", $newFileName));

    $naziv = $_POST['naziv'];
    $vsebina = $_POST['vsebina'];
    $izbrana_kategorija = $_POST['kategorija'];

    $file = $_FILES['file'];
    print_r($file);

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

          include_once "mysqli_connect.php";

          if(empty($naziv) || empty($vsebina))
          {
            header("Location: ../nalozi_clanek.php?upload=emptyfields");
            exit();
          }
          else
          {
            $sql = "SELECT * FROM clanek;";
            $stmt = mysqli_stmt_init($dbc);

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
              echo "SQL statement failed!";
            }
            else
            {
              mysqli_stmt_execute($stmt);

              $sql = "INSERT INTO clanek (naziv, vsebina, nazivSlike, kategorija, tk_clanek_uporabnik) VALUES (?,?,?,?,?);";
              if (!mysqli_stmt_prepare($stmt, $sql))
              {
                echo "SQL statement2 failed!";
              }
              else
              {
                  mysqli_stmt_bind_param($stmt, "ssssi", $naziv, $vsebina, $imageFullName, $izbrana_kategorija, $_SESSION['id_uporabnika']);
                  mysqli_stmt_execute($stmt);
                  move_uploaded_file($fileTempName, $fileDestination);
                  header("Location: ../nalozi_clanek.php?upload=success");
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
      echo "You had an error!";
      exit();
    }
  }
  else
  {
    echo "You need to upload a proper file type!";
    exit();
  }
?>
