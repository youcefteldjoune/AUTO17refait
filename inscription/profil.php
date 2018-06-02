<?php
session_start();

$bdd = new PDO('mysql:host=localhost:8889;dbname=youcef','root','root');

if(isset($_GET['id']) AND $_GET['id'] >0) //permet de sécuriser la variable de hoc ko vao dc site bang cach go cac so thu tu vao trang web

{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM client where id = ? ');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();


?>
<html>
<head>
	<title>PHP</title>
	<meta charset="utf-8">
</head>
<body>
	<div align="center">
		<h2>Profil de <?php echo $userinfo['Nom']; ?></h2>
		<br/><br/><br/>
		 = <?php echo $userinfo['Prenom']; ?>
		<br/>
		Mail = <?php echo $userinfo['email']; ?>

		<br/>
		<?php
		if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
		{
		?>
		<a href="deconnexion.php">Se déconnecter</a>
		<?php
		}
		?>
	</div>
</body>
</html>
<?php
}
?>