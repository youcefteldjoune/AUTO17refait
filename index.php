<?php 
	session_start();
	include("modele/modele.php");
?>

<html>
<head>
	<link type="text/css" rel="stylesheet" href="index.css"/>
</head>
<body>
	
	<center>
	<br><br><br><br><br><br><br><br>
	<h1>Connexion à AUTO 17</h1>
	<form method="post" action="index.php">
		<form method="post" action="index.php">
		<table width="30%" align="center">
			<tr><td>Login</td><td><input type="text" name="login" size="25"></td></tr>
			<tr><td>Mot de pass</td><td><input type="password" name="mdp" size="25"></td></tr>
			<tr><td><td><input type="submit" name="seconnecter" value=" Se Connecter" /></td></td></tr>
		</table>
	</form>
	</form>
	

	<?php

		if(isset($_POST['seconnecter'])){
			$login = $_POST['login'];
			$mdp = $_POST['mdp'];
			$mdp = md5($mdp);
			$unModele = new Modele(); //instanciation de la classe Modele
			$resultat = $unModele->verifConnexion($login,$mdp);


			if (isset ($resultat['login']) && !empty($resultat['login']))
			{
				echo " <br/> Vous êtes connectés en tant que".$resultat['nom']. " ".$resultat['prenom'];
				
				//sauvegarde de la session de cet utilisateur
				session_start();
				$_SESSION['login'] = $resultat['login'];
				$_SESSION['nom'] = $resultat['nom'];
				$_SESSION['prenom'] = $resultat['prenom'];
				//redirection vers la page accueil
				header('Location:accueil.php');
			}
			else {
				echo "Veuillez vérifier vos identifiants!";
				}
		}


?>	

</body>
</html>