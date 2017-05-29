<?php

class Utilisateur{

  private $id_Util;
  private $nom_Util;
  private $prenom_Util;
  private $login_Util;
  private $mdp_Util;
  private $droit_Admin;

  public function __construct($_id_Util, $_nom_Util, $_prenom_Util, $_login_Util, $_mdp_Util, $_droit_Admin){
    $id_Util = $_id_Util;
    $nom_Util = $_nom_Util;
    $prenom_Util = $_prenom_Util;
    $login_Util = $_login_Util;
    $mdp_Util = $_mdp_Util;
    $droit_Admin = $_droit_Admin;
  }


    public function getIdUtil(){
      return $id_Util;
    }

    public function getNomUtil(){
      return $nom_Util;
    }

    public function getPrenomUtil(){
      return $prenom_Util;
    }

    public function getLoginUtil(){
      return $login_Util;
    }

    public function getMdpUtil(){
      return $mdp_Util;
    }

    public function getDroitAdmin(){
      return $droit_Admin;
    }


    public function setNomUtil($_nom_Util){
      $nom_Util = $_nom_Util;
    }

    public function setPrenomUtil($_prenom_Util){
      $prenom_Util = $_prenom_Util;
    }

    public function setLoginUtil($_login_Util){
      $login_Util = $_login_Util;
    }

    public function setMdpUtil($_mdp_Util){
      $mdp_Util = $_mdp_Util;
    }

    public function setDroitAdmin($_droit_Admin){
      $droit_Admin = $_droit_Admin;
    }

}

 ?>
