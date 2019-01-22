<?php
include 'header.php';


if (!isset($_SESSION['m_un'])) {

	$url ='login.php';
	ob_end_clean();
	header("Location: $url");
	exit();

} else {

	$_SESSION = array(); // izbris sejnih spremenljivk
	session_destroy(); // uničevanje seje
	setcookie (session_name(), '', time()-3600); // izbris piškotkov

}



echo '<h3>Odjava je bila uspešna.</h3>';


?>
<?php include 'footer.php' ; ?>
