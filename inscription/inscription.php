<?php
	$bdd = new PDO('mysql:host=localhost:8889;dbname=youcef','root','root');
	if(isset($_POST['forminscription']))
	{
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$email = htmlspecialchars($_POST['mail']);
		$email2 = htmlspecialchars($_POST['mail2']);
		$mdp = sha1($_POST['mdp']);
		$mdp2 = sha1($_POST['mdp2']);

		if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
		{
			$nomlength = strlen($nom);
			if($nomlength <= 255)
			{
				if($email == $email2)
				{
					if(filter_var($email,FILTER_VALIDATE_EMAIL))
					{
					$reqmail = $bdd->prepare("SELECT * FROM client where email=?");
					$reqmail ->execute(array($email));
					$mailexist = $reqmail->rowCount();
					if($mailexist == 0)
						{
						if($mdp == $mdp2)
						{
							$insertmbr = $bdd->prepare("INSERT INTO client(nom,prenom,email,mdp) VALUES(?,?,?,?)");
							$insertmbr->execute(array($nom,$prenom,$email,$mdp));
							$erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
							// de tao cho trang web chinh thuc thi lam nhu the nay
							//$_SESSION['comptecree'] = "Votre compte a bien été créé !";

							//header('Location: accueil.php');
						}
						else
						{
							$erreur = "Vos mot de passes ne correspondent pas !";
						}
					}
					else
					{
						$erreur ="Adresse mail déjà utilisée !";
					}
					}
					else
					{
						$erreur = "Votre adresse mail n'est pas valide !";
					}
				}
				else
				{
					$erreur = "Vos adresses mail ne correspondent pas ! ";
				}
			}
			else
			{
				$erreur = "Votre pseudo ne doit pas dépasser 255 caractères!";
			}

		}
		else
		{
			$erreur = "Tous les champs doivent être complétés!";
		}


	}

?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="connexion.css"/>

</head>
<body>
	<div class="header">
		<h2>INSCRIPTION</h2>
	</div><!--end header-->
		<form method="post" action="#">
		<label>Nom</label>
		<input type="text" placeholder="Votre Nom" id="pseudo" name="nom" value="<?php if(isset($nom)){ echo $nom;} ?>" />
		<label>Prenom</label>
		<input type="text" placeholder="Votre Prénom" id="pseudo" name="prenom" value="<?php if(isset($prenom)){ echo $prenom;} ?>" />
		<label>Mail</label>
		<input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)){ echo $mail;} ?>"/>
		<label>Confirmation du mail</label>
		<input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)){ echo $mail2;} ?>"/>
		<label for="mdp">Mot de passe</label>
		<input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp"/>
		<label for="mdp2">Confirmation du mot de passe</label>
		<input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2"/>
		<button type="submit" name="forminscription" class="btn" value="Je m'inscris">Je m'inscris</button>
		<p>
			Déjà un member ? <a href="connexion.php">Connexion</a>
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