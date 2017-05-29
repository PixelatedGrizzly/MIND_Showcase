<?php
class Projet{
  private $id_Proj;
  private $titre_Proj;
  private $desc_Proj;
  private $id_Util_Proj;

  public function __construct($_id_Proj, $_titre_Proj, $_desc_Proj, $_id_Util_Proj){
    $id_Proj = $_id_Proj;
    $titre_Proj = $_titre_Proj;
    $desc_Proj = $_desc_Proj;
    $id_Util_Proj = $_id_Util_Proj;
  }

  public function getIdProd(){
    return $id_Proj;
  }

  public function getTitreProj(){
    return $titre_Proj;
  }

  public function getDescProj(){
    return $desc_Proj;
  }

  public function getIdUtilProjet(){
    return $id_Util_Proj;
  }

  public function setTitreProj($_titre_Proj){
    $titre_Proj = $_titre_Proj;
  }

  public function setDescProj($_desc_Proj){
    $desc_Proj = $_desc_Proj;
  }

  public function setIdUtilProjet($_id_Util_Proj){
    $id_Util_Proj = $_id_Util_Proj;
  }




}

?>
