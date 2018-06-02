<?php
    class Modele
    {
      private $pdo;
      private $table;

        public function __construct ($serveur, $bdd, $user, $mdp)
        {
          $this->pdo = null;
          try {
            $this->pdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp);
            }
            catch(Exception $exp){
              echo "Erreur de connexion à la BDD";
            }
          }
        public function setTable($table)
        {
          $this->table = $table;
        }

        public function selectAll()
          {
            if($this->pdo != null)
            {
              $requete = "select * from ".$this->table.";";
              $select = $this->pdo->prepare ($requete);
              $select->execute(); // execution de la requete
              $resultats = $select->fetchAll();
              return $resultats;
            }else{
              return null;
            }
          }

          public function selectWhere($champs, $where) // Modele select
                {
                  $chaineChamps = implode (",", $champs); // rassemble les donnees
                  $clause = array();
                  $donnees = array();
                  foreach ($where as $cle => $valeur)
                  {
                    $clause[] = $cle." = :".$cle;
                    $donnees[":".$cle] = $valeur;
                  }
                  $chaineClause = implode(" AND ", $clause);

                  $requete = "SELECT ".$chaineChamps." FROM ".$this->table." WHERE ".$chaineClause.";";
                  $select = $this->pdo->prepare($requete);
                  $select->execute($donnees);
                  $unResultat = $select->fetch();

                  return $unResultat;
                }
          public function insert($tab)
          {
            $champs = array();
            $donnees = array();
            $valeurs =array();
            foreach($tab as $cle=>$valeur)
            {
              $champs[]=$cle;
              $valeurs[]= ":".$cle;
              $donnees[":".$cle] = $valeur;
            }
            $listeChamps = implode (",", $champs);
            $chaineChamps = implode (",", $valeurs);

            $requete = "insert into ".$this->table."(".$listeChamps.") values (".$chaineChamps.");";
            $insert = $this->pdo->prepare ($requete);
            $insert -> execute ($donnees);
          }

          public function update ($tab, $where)
          {
            $champs = array();
            $clause = array();
            $donees =array();

              foreach($tab as $cle => $valeur)
              {
                $champs[] =  $cle." = :".$cle;
                $donnees[":".$cle] = $valeur;
              }
              $chaineChamps = implode (",", $champs);


              foreach ($where as $cle => $valeur)
              {
                $clause[] = $cle." = :".$cle;
                $donnees[":".$cle] = $valeur;
              }
              $chaineClause = implode (" and ", $clause);
            $requete ="update ".$this->table." set ".$chaineChamps." where ".$chaineClause.";";
            $insert = $this->pdo->prepare ($requete);
            $insert->execute($donnees);
          }

          public function delete ($where)
          {
            $clause = array();
            $donnees = array();

            foreach ($where as $cle => $valeur) {
              $clause[] = $cle."= :".$cle;
              $donnees[":".$cle] = $valeur;
            }
            $chaineClause = implode (" and ", $clause);
            $requete = "delete from ".$this->table." where ".$chaineClause.";";
            $delete = $this->pdo->prepare($requete);
            $delete -> execute ($donnees);
          }
      }
?>
