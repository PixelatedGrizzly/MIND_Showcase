<?php
/**
 * Classe abstraite permettant de générer une nouvelle connection à la base de données mind_showcase
 */
class ConnectionInstance
{

  private $pdo;

  function __construct()
  {
    $this->pdo = new PDO (
      'mysql:host=localhost;dbname=mind_showcase',
      'root','root'
    );
  }

  public function selectAllUsers(){
    return $this->pdo->query('SELECT * from utilisateur');
  }

  //Faire des require sur les fichiers de ce dossier pour inclure l'ensemble des fonctions possibles par table
}

?>
