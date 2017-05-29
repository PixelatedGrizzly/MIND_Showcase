<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>MIND Showcase</title>
    <link rel="stylesheet" href="./media/styles.css">
  </head>
  <body>

<?php if (strpos($_SERVER['SCRIPT_NAME'], 'index.php') !== false){ ?>
    <div class="splasher">
    <img class="logo_splasher" src="./media/image/logo.jpg" alt="LOGO MindLab">
    </div>
    <div class="container">
<?php } ?>


<?php
include_once('datasource/connect.php');
$db = new ConnectionInstance();
$usersList = $db->selectAllUsers();

foreach ($usersList as $user) {
  print(
    "<p>Nom = ".$user['nom_Util']." ; Prénom = ".$user['prenom_Util']." ; Login = ".$user['login_Util']."</p>"
  );
}
?>

<div class="project_list">

</div>

</div>
