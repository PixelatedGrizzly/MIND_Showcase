<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>MIND Showcase</title>
    <link rel="stylesheet" href="./media/styles.css">

    <link rel="stylesheet" href="lib/OwlCarousel2-2.2.1/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.2.1/dist/assets/owl.theme.default.min.css">
    <script type="text/javascript" src="lib\jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="lib\bootstrap-3.3.7-dist\js\bootstrap.js"></script>
    <script type="text/javascript" src="lib\OwlCarousel2-2.2.1\dist\owl.carousel.min.js"></script>
  </head>
  <body>

<?php if (strpos($_SERVER['SCRIPT_NAME'], 'index.php') !== false){ ?>
    <div class="splasher">
    <img class="logo_splasher" src="./media/image/logo.jpg" alt="LOGO MindLab">
    </div>
    <div class="container">
<?php } ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">MIND Showcase</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Nouveau Projet</a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Connexion</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<?php
include_once('datasource/connect.php');
$db = new ConnectionInstance();
$usersList = $db->selectAllUsers();

/**foreach ($usersList as $user) {
  print(
    "<p>Nom = ".$user['nom_Util']." ; Prénom = ".$user['prenom_Util']." ; Login = ".$user['login_Util']."</p>"
  );
}**/
?>

<div class="project_list">

</div>

</div>
