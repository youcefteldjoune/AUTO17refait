<?php
	require("modele/modele.php");
	class Controleur
	{
		private $unModele;
		
		public function __construct ($serveur, $bdd, $user, $mdp)
		{
			$this->unModele = new Modele ($serveur, $bdd, $user, $mdp);
		}
		public function setTable($table)
        {
          $this->unModele->setTable($table);
        }
		

		 public function selectAll()
		 {
		 	return $this->unModele->selectAll();
		 }
		 public function selectWhere($champs, $where)
		 {
			 return $this->unModele->selectWhere($champs, $where);
		 }
		  public function insert($tab)
          {
			  $this->unModele->insert($tab);
		  }
		  
		   public function update ($tab, $where)
          {
			  $this->unModele->update ($tab, $where);
		  }
		  
		   public function delete ($where)
          {
			   $this->unModele->delete ($where);
		  }	 
	}

	 
?>