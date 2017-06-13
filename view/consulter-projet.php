	    <?php
	    require_once('header.php');
	    require_once '../datasource/connect.php';
      require_once('../commandInvoker/apiCommands.php');
	     $connect= new ConnectionInstance();
	     if($_GET['id'] !== null){
	       $id_Proj = $_GET['id'];
	     }else {
	       $id_Proj = 1;
	     }
	     $sql="select * from projet where id_Proj='".$id_Proj."'";
	                $result=$connect->get_row($sql);
	    $sqlactualite = "select * from actualites where id_Proj_Act='".$id_Proj."'";
	                $actualite=$connect->get_row($sqlactualite);
	                $medias = $connect->selectMediasFromProject($id_Proj);
	     ?>

	    	<div class="container">
	    		<div class="row">
	    			<div class="col-md-8">
	                <div class="titreProj"><?php echo $result['titre_Proj'] ?></div>
	                <div class="desProj"><?php echo $result['desc_Proj'] ?></div>
	                <div class="pull-right"> Nombre participant : <?php echo $result['nb_part'] ?></div><br>
	                <?php foreach ($medias as $key2 => $value2){ ?>
	        <img class="imgProj" src="../media/<?php echo($value2["type_Media"]."/".$value2["cheminFichier_Media"]); ?>" alt="projet<?php echo($value2["id_Proj_Media"]); ?>"></img>
	      <?php } ?>
	                <div class="contenuProj"><?php echo $actualite['contenu'] ?> </div>


	                <div id="player" ></div>
	                <div style="padding-top: 20px;">

	                <div class="btn_social">
	                <div class="btn_share">
	    <a href="https://twitter.com/share" class="twitter-share-button" data-text="MINF Showcase" data-via="MIND_Showcase" data-size="large">Tweet</a>
	    </div>
	    <div id="fb-root" class="btn_share"></div>


	            <!-- Your share button code -->
	            <div class="fb-share-button" data-href="https://www.kickstarter.com/" data-layout="button" data-size="large" data-mobile-iframe="true">
	                <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Partager</a>
	            </div>
	    </div>
	    </div>
	    <div class="fb-comments" data-href="http://localhost/projet/MIND_Showcase/view/consulterProjet.php" data-numposts="10"></div>
	                </div>

									<div class="last-twitter-mentions col-md-4 panel panel-default" style="min-height:500px;overflow-y:scroll">
									<h2>Mentions twitter</h2>
									<?php
								  $twitterMentions = ApiCommands::getTwitterMentions();
									if(is_array($twitterMentions)){
									foreach ($twitterMentions as $key => $value) {
									echo '<div class="" style="width:100%";height:30px;margin-top:5px;>';
									echo '<i>'.$value["user"]["name"].':</i><span style="float:right;font-size: 9px;margin-top:5px;">'.date('l jS \of F Y h:i:s A',strtotime($value['created_at'])).'</span><br />';
									echo $value["text"];
									echo '</div>';
									}
								}
									?>
									</div>



	<div class="col-md-4">

	<?php
	$projets = $connect->selectSevralProjects(4);
	foreach ($projets as $key => $value) {
	  $medias = $connect->selectMediasFromProject($value["id_Proj"]);
	   ?>
	<div>
	      <h3><?php echo($value["titre_Proj"]); ?></h3>
	      <p><?php echo($value["desc_Proj"]); ?></p>
	      <?php foreach ($medias as $key2 => $value2){ ?>
	        <img class="gridPic" src="../media/<?php echo($value2["type_Media"]."/".$value2["cheminFichier_Media"]); ?>" alt="projet<?php echo($value["id_Proj"]); ?>"></img>
	      <?php } ?>

	      <a href='consulter-projet.php?id=<?php echo ($value["id_Proj"])?>'><button type="button" name="button" class="btn btn-default">Voir plus</button></a>
	    </div>
	 <?php  }
	 ?>
	</div>






	    		</div>

	        </div>




	        <!-- 1.script btn twitter -->
	        <script>!function(d,s,id){
	        var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
	        if(!d.getElementById(id)){
	            js=d.createElement(s);js.id=id;
	            js.src=p+'://platform.twitter.com/widgets.js';
	            fjs.parentNode.insertBefore(js,fjs);
	        }}(document, 'script', 'twitter-wjs');
	     </script>
	     <!-- 1.script btn facebook -->
	    <script>(function (d, s, id) {
	                    var js, fjs = d.getElementsByTagName(s)[0];
	                    if (d.getElementById(id))
	                        return;
	                    js = d.createElement(s);
	                    js.id = id;
	                    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.9&appId=111052052831514";
	                    fjs.parentNode.insertBefore(js, fjs);
	                }(document, 'script', 'facebook-jssdk'));
	            </script>
	        <script>
	          // 2. This code loads the IFrame Player API code asynchronously.
	          var tag = document.createElement('script');

	          tag.src = "https://www.youtube.com/iframe_api";
	          var firstScriptTag = document.getElementsByTagName('script')[0];
	          firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	          // 3. This function creates an <iframe> (and YouTube player)
	          //    after the API code downloads.
	          var player;
	          function onYouTubeIframeAPIReady() {
	            player = new YT.Player('player', {
	              height: '390',
	              width: '640',
	              videoId: 'M7lc1UVf-VE',
	              events: {
	                'onReady': onPlayerReady,
	                'onStateChange': onPlayerStateChange
	              }
	            });
	          }

	          // 4. The API will call this function when the video player is ready.
	          function onPlayerReady(event) {
	            event.target.playVideo();
	          }

	          // 5. The API calls this function when the player's state changes.
	          //    The function indicates that when playing a video (state=1),
	          //    the player should play for six seconds and then stop.
	          var done = false;
	          function onPlayerStateChange(event) {
	            if (event.data == YT.PlayerState.PLAYING && !done) {
	              setTimeout(stopVideo, 6000);
	              done = true;
	            }
	          }
	          function stopVideo() {
	            player.stopVideo();
	          }
	        </script>

	    </body>
	    </html>
