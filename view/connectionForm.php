<form class="" action="../commandInvoker/authentificate.php?connect" method="post">
  <input type="text" name="login" placeholder="Identifiant">
  <input type="password" name="mdp" placeholder="Mot de passe">
  <button type="submit" class="btn btn-default" name="Connect">Se connecter</button>
</form>

<?php
session_start();
if (session_id() && isset($_SESSION['connected']) && $_SESSION['connected']===true) {
  print("Salut, je suis connecté");
}
else {
  print("Je suis pas connecté");
}
?>