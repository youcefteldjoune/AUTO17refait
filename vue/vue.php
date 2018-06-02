


<br/><br/><br/><br/><br/><br/><br/><br/>
<center>
	<h1>Liste des clients d'auto 17</h1></br>
	<table border=1>
	<tr><td>Nom</td>
		<td>Prenom</td>
		<td>Mail</td>
		</tr>
		<?php
			
			foreach ($resultats as $unResultat)
			 	{
				echo "<tr><td> ".$unResultat['nom']."</td>";
				echo "<td>".$unResultat['prenom']."</td>";
				echo "<td> ".$unResultat['email']."</td>";
			
				}
			
		?>
		</table>
	</center>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
	