<?php 
session_start(); 
 
if (isset($_SESSION['connected'])){
    $_SESSION['connected'] = false;
}
header('Location: ../index.php');
?>
