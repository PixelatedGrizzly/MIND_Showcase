<?php

class Media{
  private $id_Media;
  private $cheminFichier_Media;
  private $type_Media;
  private $id_Proj_Media;

  public function __construct($_id_Media, $_cheminFichier_Media, $_type_Media, $_id_Proj_Media){
    $id_Media = $_id_Media;
    $cheminFichier_Media = $_cheminFichier_Media;
    $type_Media = $_type_Media;
    $id_Proj_Media = $_id_Proj_Media;
  }

  public function getIdMedia(){
    return $id_Media;
  }

  public function getCheminFichierMedia(){
    return $cheminFichier_Media;
  }

  public function getTypeMedia(){
    return $type_Media;
  }

  public function getProjMedia(){
    return $id_Proj_Media;
  }

  public function setCheminFichierMedia($_cheminFichier_Media){
    $cheminFichier_Media = $_cheminFichier_Media;
  }

  public function setTypeMedia($_type_Media){
    $type_Media = $_type_Media;
  }

  public function setProjMedia($_id_Proj_Media){
    $id_Proj_Media = $_id_Proj_Media;
  }
}

 ?>
