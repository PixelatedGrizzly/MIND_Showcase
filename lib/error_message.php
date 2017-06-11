<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
    require_once '../datasource/connect.php';
     $connect= new ConnectionInstance();
     
$value = $_GET['e'];
$objet = $_GET['o'];
if ($value == '') {
    $_SESSION['valide'] = false;
    echo '<span class="alert alert-danger">Il faut remplir information</span> ';
} else {
    switch ($objet) {
        case 'login':
            $request = 'select count(*) from utilisateur where login_Util = "' . $value . '"';
            $resultat =$connect->get_row($request);
            if ($resultat['count(*)']>0){
                echo "<span class='alert alert-danger'>L'identifiant est deja exist...</span>";
                $_SESSION['valide'] = false;
            } else {
                $_SESSION['valide'] = true;
                echo "";
            }
            break;
        case 'password':
            if (strlen($value) < 6) {
                $_SESSION['valide'] = false;
                echo '<span class="alert alert-danger">Le mot de passe est court</span>';
            } else {
                $_SESSION['valide'] = true;
                echo '';
            }
            break;
        case 'passConfirm':
            $passConfirm = $_GET['pa'];
            if ($value === $passConfirm) {
                $_SESSION['valide'] = true;
                echo '<span class="alert alert-success" style="margin-top:10px">Code valide</span>';
            } else {
                $_SESSION['valide'] = false;
                echo '<span class="alert alert-danger">Les mot de passe ne sont identifies</span>';
            }
            break;
        case 'passwordC':
            $passConfirm = $_GET['pa'];
            if (strlen($value) < 6) {
                $_SESSION['valide'] = false;
                echo '<span class="alert alert-danger">Le mot de passe est court</span>';
            } else if ($value != $passConfirm && strlen($value) >= 6) {
                $_SESSION['valide'] = true;
                echo '<span class="alert alert-success" style="margin-top:10px">Code valide</span>';
            } else {
                $_SESSION['valide'] = false;
                echo '<span class="alert alert-danger">Les mot de passe sont identifies</span>';
            }
            break;
        case 'passConfirmC':
            $passConfirm = $_GET['pa'];
            if ($value === $passConfirm) {
                $_SESSION['valide'] = true;
                echo '<span class="alert alert-success" style="margin-top:10px">Code valide</span>';
            } else {
                $_SESSION['valide'] = false;
                echo '<span class="alert alert-danger">Les mot de passe ne sont identifies</span>';
            }
            break;
        case 'email':
            if (filter_var($value, FILTER_VALIDATE_EMAIL) == false) {
                $_SESSION['valide'] = false;
                echo "<span class='alert alert-danger'>Ce n'est pas la forme d'un email</span>";
            } else {
                $request = 'select count(*) from users where email = "' . $value . '"';
                $resultat =$connect->get_row($request);
            if ($resultat['count(*)']>0) {
                    $_SESSION['valide'] = false;
                    echo "<span class='alert alert-danger'>Cet email est deja inscrit</span>";
                } else {
                    $_SESSION['valide'] = true;
                    echo "";
                }
            }
            break;
        case 'captcha_input':
            if ($value == $_SESSION['captcha']) {
                $_SESSION['valide'] = true;
                echo '<span class="alert alert-success">Code valide';
            } else {
                $_SESSION['valide'] = true;
                echo '<span class="alert alert-danger">Code non valide..</span>';
            }
    }
}
