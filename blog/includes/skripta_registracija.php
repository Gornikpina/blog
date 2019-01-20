<?php

  if(isset($_POST['signup-submit']))
  {
    require 'mysqli_connect.php';

  //  $ime=$_POST['ime'];
  //  $priimek=$_POST['priimek'];
    $e_naslov=$_POST['e_naslov'];
  //  $opis=$_POST['opis'];
//    $naslov=$_POST['naslov'];
  //  $postna_stevilka=$_POST['postna_stevilka'];
  //  $drzava=$_POST['drzava'];
    $uporabnisko_ime=$_POST['uporabnisko_ime'];
    $geslo=$_POST['geslo'];
    $ponovljeno_geslo=$_POST['potrditveno_geslo'];
    $slika_ime = null;

    if (empty($e_naslov) ||  empty($uporabnisko_ime) || empty($geslo) || empty($ponovljeno_geslo))
    {
      header("Location: ../registracija.php?error=emptyfields");
      exit(); //da ne izvaja nič druga če to ne uspe
    }
    else if(!filter_var($e_naslov, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $uporabnisko_ime))
    {
      header("Location: ../registracija.php?error=invalidemailusername");
      exit();
    }
    else if (!filter_var($e_naslov, FILTER_VALIDATE_EMAIL))
    {
      header("Location: ../registracija.php?error=invalidemail".$uporabnisko_ime);
      exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $uporabnisko_ime))
    {
      header("Location: ../registracija.php?error=invalidusername&email=".$e_naslov);
      exit();
    }
    else if ($geslo != $ponovljeno_geslo)
    {
      header("Location: ../registracija.php?error=passwordcheckun=".$uporabnisko_ime."&mail=".$e_naslov);
      exit();
    }
    else {
      $sql = "SELECT uporabniskoIme FROM Uporabnik WHERE uporabnisko_ime=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql))
      {
        header("Location: ../registracija.php?error=sqlerror");
        exit();
      }
      else
      {
        mysqli_stmt_bind_param($stmt, "s", $uporabnisko_ime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt); //shrani result v stmt
        $resultCheck = mysqli_stmt_num_rows($stmt); //vrne vrstice v bazi
        if($resultCheck>0)
        {
          header("Location: ../registracija.php?error=usertaken&mail=".$e_naslov);
          exit();
        }
        else
        {
            $sql = "INSERT INTO Uporabnik (email, uporabniskoIme, geslo, slika_ime)
            VALUES (?,?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
              header("Location: ../registracija.php?error=sqlerror2");
              exit();
            }
            else
            {
              $zakodiranoGeslo = md5($geslo);

              mysqli_stmt_bind_param($stmt, "ssssssssss", $e_naslov, $uporabnisko_ime, $zakodiranoGeslo, $slika_ime);
              mysqli_stmt_execute($stmt);
              header("Location: ../vpis.php?signup=success");
              exit();
            }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  else
  {
    header("Location: ../registracija.php");
    exit();
  }
?>
