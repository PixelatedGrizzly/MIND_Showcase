<?php
  if (isset($_GET['connect']))
  {
    if (isset($_POST['login']) && isset($_POST['mdp']))
    {
      include_once('../datasource/connect.php');
      $db = new ConnectionInstance();
      $usersList = $db->selectAllUsers();

      foreach ($usersList as $user)
      {
        if ($_POST['login']==$user['login_Util'] && $_POST['mdp']==$user['mdp_Util']) {
          //print('Match !');
        }
      }
    }
    else
    {
      print("no try");
    }
  }
  else
  {
    print("pas test");
  }
  header('Location: ../index.php');
?>
