<!-- <form class="" action="../commandInvoker/authentificate.php?connect" method="post">
  <input type="text" name="login" placeholder="Identifiant">
  <input type="password" name="mdp" placeholder="Mot de passe">
  <button type="submit" class="btn btn-default" name="Connect">Se connecter</button>
</form> -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Connexion</title>
        <link href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body >

		<div class="container">
            <div class="row" style="margin:100px; margin-left:30%">
                <div class="col-md-4" >
                    <h2 class="text-center">Connexion</h2>
                    <form action="../commandInvoker/authentificate.php?connect" method="post">
                        <div class='form-group'>
                            <label class='sr-only'>L'identifiant</label>
                            <input id="login" type='text' class='form-control' placeholder="Identifiant" name='login' tabindex='1'>
                        </div>
                        <div class='form-group'>
                            <label class='sr-only'>Mot de passe</label>
                            <input id="mdp" type='password' class='form-control' placeholder='Mot de passe' name='mdp' tabindex='2'>
                        </div>
                        <input class='btn btn-primary' id="Connect" name="Connect" type="submit" tabindex='3' value="Connect">
                        <?php
                        	if (!session_id() || !isset($_SESSION['connected']) || $_SESSION['connected']===true) {
                        	?>
                        		<a href="inscription.php" data-patreon-widget-type="become-patron-button">s'inscrire</a>
                        	<?php
                        	}
                        ?>
                    </form>
                </div>
            </div>
        </div>
 
<?php
session_start();
if (session_id() && isset($_SESSION['connected']) && $_SESSION['connected']===true) {
  print("Salut, je suis connecté");
}
else {
  print("<p style='text-align:center;'>Je suis pas connecté</p>");
  /*
?> 
<a href="inscription.php" data-patreon-widget-type="become-patron-button">s'inscrire</a>
<?php 
*/
}
?>

   </body>
</html>