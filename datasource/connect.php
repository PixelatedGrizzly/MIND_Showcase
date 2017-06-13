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

  public function insert($table,$data){
    $field_list = '';
    $field_param = '';
    foreach ($data as $key => $value) {
        $field_list .= ",$key";
        $field_param .= ",:$key";
    }
    $query='INSERT INTO ' . $table . '(' . trim($field_list, ',') . ') VALUES (' . trim($field_param, ',') . ')';
    $stmt=$this->pdo->prepare($query);
    return $stmt->execute($data);;
  }

  //récuperer le premier ligne dans database
  function get_row($sql) {
      $sth=$this->pdo->prepare($sql);
      $sth->execute();
      return $sth->fetch(PDO::FETCH_ASSOC);
  }

  //Faire des require sur les fichiers de ce dossier pour inclure l'ensemble des fonctions possibles par table

  public function selectAllProjects(){
    $projets = array();
    $result =  $this->pdo->query('SELECT * from projet');
    while($temp = $result->fetch())
    {
      array_push($projets, $temp);
    }
    return $projets;
  }
    public function selectSevralProjects($nombre){
    $projets = array();
    $result =  $this->pdo->query('SELECT * from projet ORDER BY id_Proj DESC LIMIT 0,'.$nombre);
    while($temp = $result->fetch())
    {
      array_push($projets, $temp);
    }
    return $projets;
  }

  public function selectMediasFromProject($idProj){
    $medias = array();
    $result =  $this->pdo->query('SELECT * from media WHERE id_Proj_Media LIKE '.$idProj);
    while($temp = $result->fetch())
    {
      array_push($medias, $temp);
    }
    return $medias;
  }
}

?>
