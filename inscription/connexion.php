<?php
session_start();

$bdd = new PDO('mysql:host=localhost:8889;dbname=youcef','root','root');

	if(isset($_POST['formconnexion']))
	{
		$mailconnect = htmlspecialchars($_POST['mailconnect']); //html..pour la sécurité
		$mdpconnect = sha1($_POST['mdpconnect']);
		if(!empty($mailconnect) AND !empty($mdpconnect))
		{
			$requser = $bdd->prepare('SELECT * FROM client where email = ? AND mdp = ?');
			$requser->execute(array($mailconnect, $mdpconnect));
			$userexist = $requser->rowCount(); //permet de ranger des données
			if($userexist == 1)
			{
				$userinfo = $requser->fetch();
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['nom'] = $userinfo['nom'];
				$_SESSION['prenom'] = $userinfo['prenom'];
				$_SESSION['email'] = $userinfo['email'];
				header("Location: profil.php?id=".$_SESSION['id']); //diriger vers la personne
			}
			else
			{
				$erreur = "Mauvais mail ou mot de passe !";
			}
		}
		else
		{
			$erreur = "Tous les champs doivent être complétés !";
		}
	}

?>
<html>
<head>
	<title>connexion</title>
	<link rel="stylesheet" type="text/css" href="connexion.css"/>
</head>
<body>
	<div class="header">
		<h2>Connexion</h2>
		</div><!--end header-->
		<form method="POST" action="connexion.php">
			<label>Email</label>
			<input type="email" name="mailconnect" placeholder="Mail"/>
			<label>Mot de passe</label>
			<input type="password" name="mdpconnect" placeholder="Mot de passe"/>
			<button type="submit" name="formconnexion" class="btn" value="Se connecter !" />Login</button>

		<p>
			Pas encore un member ? <a href="inscription.php">Inscription</a>
		</p>

		</form>

		<?php

			if(isset($erreur))
			{
				echo '<font color ="red">'.$erreur."</font>";
			}
		?>

</body>
</html>