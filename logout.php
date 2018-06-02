<?php
	session_start();
echo "Vous êtes déconnectés ".$_SESSION['login'];

session_destroy();
echo "<a href='index.php'> Retour</a>";
?>