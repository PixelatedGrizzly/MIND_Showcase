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
          if (! session_id()) {
            session_start();
          }
          $_SESSION['id_Util'] = $user["id_Util"];
          $_SESSION['connected'] = true;
        }
      }
    }
    else
    {
      echo "no try";
    }
  }
  else
  {
    print("pas test");
  }
  header('Location: ../index.php');
?>
