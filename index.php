

<?php
include_once('view/header.php');
require_once('datasource/connect.php');
require_once('commandInvoker/apiCommands.php');

$coworkingSpaces = ApiCommands::getCoworkingSpaces();
?>
<div class="container">
<h2>Espaces de coworking à proximité</h2>
<hr>
<div id="map"></div>
     <script>
       var markers = <?php echo json_encode($coworkingSpaces); ?>;
       var myLatlng;
       var map;
       function initMap() {
         map = new google.maps.Map(document.getElementById('map'), {
           center: {lat: 48.866, lng: 2.333},
           zoom: 12
         });

        var marker = [];
        var infoWindow = [];


        var i = 0;
         $.each( markers, function( key, val ) {

              infoWindow[i] = new google.maps.InfoWindow({
                content: '<h4>'+markers[i]["name"]+'</h4><br />'+markers[i]["address"]
              });

              marker[i] = new google.maps.Marker({
              position: {lat: parseFloat(markers[i]["lat"]), lng: parseFloat(markers[i]["lng"])},
              map: map,
              title: markers[i]["name"],
              animation: google.maps.Animation.DROP,
              });
              marker[i].index = i;


              google.maps.event.addListener(marker[i], 'click', function() {
                  infoWindow[this.index].open(map,marker[this.index]);
                  map.panTo(marker[this.index].getPosition());
              });
          i++;
         });

       }
     </script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAR5ultGU8Oc1wdTN-voHYPkBV7KSK6N40&callback=initMap" async defer></script>

<h2>Selection de projets</h2>
<hr>
<?php
$connection = new ConnectionInstance();
$projets = $connection->selectAllProjects();
foreach ($projets as $key => $value) {
  $medias = $connection->selectMediasFromProject($value["id_Proj"]);
  if($key % 2 == 0){ ?> <div class="row"> <?php } ?>

    <div class="col-md-6">
      <h3><?php echo($value["titre_Proj"]); ?></h3>
      <p><?php echo($value["desc_Proj"]); ?></p>
      <?php foreach ($medias as $key2 => $value2){ ?>
        <img class="gridPic" src="media/<?php echo($value2["type_Media"]."/".$value2["cheminFichier_Media"]); ?>" alt="projet<?php echo($value["id_Proj"]); ?>"></img>
      <?php } ?>

      <a href='view/consulter-projet.php?id=<?php echo ($value["id_Proj"])?>'><button type="button" name="button" class="btn btn-default">Voir plus</button></a>
    </div>

  <?php if($key % 2 != 0){  ?> </div> <?php  }
} ?>
</div>

<?php
include_once('view/footer.php');
?>
