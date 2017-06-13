<?php require_once('header.php') ?>
<html>
    <head>
        <title>Créer un projet</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../media/styles.css" rel="stylesheet">
    </head>
<body>
    <div class="container">
       <div class="row">
            <div class="col-md-12">
                <h3 class="text-center" style="border-bottom: solid; font-weight: bold;"> Ajouter d'une nouvelle projet</h3>
                <form method="POST" action="../commandInvoker/CreateProjet.php"  enctype="multipart/form-data" >
                    <div class="form-group">
                        <label>Le titre du projet</label>
                        <input type="text" class="form-control" name="titre" required="required" >
                    </div>
                    <div class="form-group">
                        <label>Desciption du projet</label>
                         <textarea name="desc" class="form-control" rows="3" style="margin-bottom: 10px" required="required"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Le nombre des participants</label>
                        <input type="text" class="form-control" name="nb_part" required="required">
                    </div>
                    <div class="form-group">
                        <label>Actualité du projet</label>
                         <textarea name="actualite" class="form-control" rows="8" style="margin-bottom: 10px" required="required"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Choisiez un photo</label>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Renseigner les photos à partir de votre ordinateur: </label>
                                    <div id="les_photos">
                                        <input class='form' type='file' name='photos[]' >
                                    </div>
                                    </p>
                                    <input type="button" id="ajouter_upload" value="Ajouter plus">
                                </div>
                                <div class="col-md-6">
                                    <label>Choisiez à partir de instagram: </label>
                                    <div>
                                        <input type="text" placeholder="Entrez le tag du photo:" style="width:50%" id="search">
                                        <input value="Chercher" type="button">
                                    </div>
                                </div>    
                            </div>                           
                        </div>
                    </div>
                    <div id="instagram" style="display:block;">
                        <input type="hidden" name="photo_choisi" id="photo_choisi">
                    </div>
                    <p/>
                    <p style="display:none; font-style: italic; color: red"  id="erreur"></p>
                      <div class="form-group">
                        <label>URL Video</label>
                        <input type="text" class="form-control" name="url_video">
                    </div>
                    <div id="youtube"></div>
                    <input class="btn btn-primary" type="submit" value="Submit" name="submit" id='submit_article'>
                    <input class="btn btn-danger" type="reset" value="Reset">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../instagram/app.js"></script>
    <script type="text/javascript" src="../youtube/js/app.js"></script>
</body>
</html>
