<?php
	session_start();
	include ("controleur/controleur.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	 
	<div class="wrapper">


		<div class="header">
			<ul>

				<li> <a id="lien" href="inscription/inscription.php"> Créer un compte</a></li> 
				<li>|||</li>
				<li><a id="lien" href="inscription/connexion.php">Me connecter</a></li>

			</ul>

			<img src="imags/blanc.jpg" id="banner"/>

			<img src="imags/logo.png" id="logo"/>




	</div><!--end header-->




	<div class="menu">
		<ul>
	        <li><a href="">Acceuil</a></li>
            <li><a href="">Types de permis</a>
               <ul>
                  <li><a href="">Permis A</a></li>
                  <li><a href="">Permis B</a></li>
                  
               </ul>
            </li>
            <li><a href="">Code</a>
               <!--<ul class="sub_menu">-->
               
            </li>
            <li><a href="">Examen</a>
               <ul>
                  <li><a href="">Examen Moto</a></li>
                  <li><a href="">Examen Voiture</a></li>
                
               </ul>
            </li>

            <li><a href="#Contact">Contact </a></li>

            <li><a href="logout.php">Déconnexion</a></li>



            <form method="get" id="searchform" action="https://www.google.fr">
          <div>
            <input class="searchField" type="text" value="" name="q" placeholder="Recherche" />
            <input class="searchSubmit" type="submit" value="" />
            <input type="hidden" name="sitesearch" value="" />
          </div>
        </form>

	   	</ul>


	</div><!--end menu-->

	<?php
	$page = (isset($_GET['page']))?$page = $_GET['page'] :0;
	$unControleur = new Controleur ("localhost","youcef","root","root");

	switch ($page)
	 {
		case 1:
            $resultats = $unControleur->selectAll();
            include("vue/vue.php");
      break;
		case 2:
			include"Vue/vueinsert.php";
			if(isset($_POST['valider']))
			{
				//inserttion d'un nouvel eleve
				$unEleve = new Eleve();
				$unEleve->renseigner($_POST);
				$unControleur->insert($unEleve);
				echo "<br/> Insertion réussie<br/>";
			}
		break;
      case 3:
      break;
      case 4:
      break;
		case 5: $resultats = $unControleur->selectAll();
            include("PHP/giaiphuongtrinhbac2.php");
		break;
		case 6:
		break;


	}
	 ?>



	<div class="content">

		<div class="left">

			<div class="row" >
						<div class="col">
							<a class="acont" href="">Révisez le code où et quand vous voulez</a><br/><br/>
							<a href=""><img src="imags/cont1.jpg"/></a>
							<p>Entraînez-vous au code intégralement en ligne ou dans nos agences auto-école.net</p><br/>
							<p class="readmore"><a href="">En savoir plus &raquo;</a></p>
						</div>


						<div class="col">
							<a class="acont" href="">Apprenez à conduire ici, là ou même ailleurs</a><br/><br/>
							<a href=""><img src="imags/cont2.jpg" /></a>
							<p>Nos moniteurs passent vous prendre dans l’un des 237 points de RDV, partout en France</p><br/>
							<p class="readmore"><a href="">En savoir plus &raquo;</a></p>
						</div>

						<div class="col">
							<a class="acont" href="">Bénéficiez de solutions flexibles et économiques</a><br/><br/>
							<a href=""><img src="imags/cont3.jpg"/></a>
							<p>Des packs tout compris dès 675€ et la possibilité de payer en deux ou trois fois sans frais</p><br/>
							<p class="readmore"><a href="">En savoir plus &raquo;</a></p>

						</div>
					</div><!--.row-->





        </div><!--end left-->



        <div class="right">

        	<p>Nouveaux Articles</p>
    		<div class="listearticle">
    			<ul>
                   
                    <li><a href="#"> 1€ , un permis , un heureux!!! </a></li>
                    <li><a href="#">Avec auto17 conduire c'est la fête !!!</a></li>
                    <li><a href="#">Passer le code avec la Post pour seulement 30€</a></li>
                    <li><a href="#">Exercices spécifiques pour la conduite accompagnée.</a></li>
                   
     			</ul>
    		</div><!--ketthuc danhsachsanpham-->

            <p>Pubs</p>

    		<div class="pub">
    			<ul>

                    <li><a href="#">SAMSUNG</a></li>
     			</ul>
    		</div><!--ketthuc hieu san pham-->

        </div><!--end right-->



	</div><!--end content-->



	<div class="clear"></div><!--end clear-->



	<div class="footer">

		 <div class="copyright" id="Contact">
        	<b>Auto 17</b><br/>

			<b>11 Avenue Mac-Mahon, 75017 Paris</b><br/>

			<p><b>Gmail</b>:auto-17@gmail.com<br/>
			<b>Téléphone </b>: 01 23 45 67 89



   			 </div>

		</div>


		<img src="imags/footer.png" id="imgfooter">
	</div><!--end footer-->


	</div><!--end wrapper-->


</body>
</html>