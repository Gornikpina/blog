<?php
session_start();
session_unset(); //izbriše vrednosti v session spremenljivkah
session_destroy();

header("Location: ../domov.php");
?>
