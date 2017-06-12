

<?php
include_once('view/header.php');
require_once('datasource/connect.php');
?>
<div class="container">
<?php
$connection = new ConnectionInstance();
$projets = $connection->selectAllProjects();
foreach ($projets as $key => $value) {
  $medias = $connection->selectMediasFromProject($value["id_Proj"]);
  if($key % 2 == 0){ ?> <div class="row"> <?php } ?>

    <div class="col-md-6">
      <h2><?php echo($value["titre_Proj"]); ?></h2>
      <p><?php echo($value["desc_Proj"]); ?></p>
      <?php foreach ($medias as $key2 => $value2){ ?>
        <img class="gridPic" src="media/<?php echo($value2["type_Media"]."/".$value2["cheminFichier_Media"]); ?>" alt="projet<?php echo($value["id_Proj"]); ?>"></img>
      <?php } ?>

      <a href='view/consulter-projet.php?id="<?php echo ($value["id_Proj"])?>"'><button type="button" name="button" class="btn btn-default">Voir plus</button></a>
    </div>

  <?php if($key % 2 != 0){  ?> </div> <?php  }
} ?>
</div>

<?php
include_once('view/footer.php');
?>
