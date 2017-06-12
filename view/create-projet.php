<?php require_once('header.php') ?>
<html>
    <head>
        <title>Créer un projet</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
    <script type="text/javascript">

    </script>
	<div class="row">
        <div class="col-md-12">
                <h3 class="text-center" style="border-bottom: solid"> Ajouter d'une nouvelle projet</h3>
                <form method="POST" action="../commandInvoker/CreateProjet.php"  enctype="multipart/form-data" >
                    <div class="form-group">
                        <label>Le titre du projet</label>
                        <input type="text" class="form-control" name="titre" >
                    </div>
                    <div class="form-group">
                        <label>Desciption du projet</label>
                         <textarea name="desc" class="form-control" rows="3" style="margin-bottom: 10px"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Le nombre des participants</label>
                        <input type="text" class="form-control" name="nb_part" >
                    </div>
                    <div class="form-group">
                        <label>Actualité du projet</label>
                         <textarea name="actualite" class="form-control" rows="8" style="margin-bottom: 10px"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Choisiez un file</label>
                        <input class="form" type="file" name="file" id="photo" >
                    </div>
                    <p/>
                    <p style="display:none; font-style: italic; color: red"  id="erreur"></p>
                    <input class="btn btn-primary" type="submit" value="Submit" name="submit" id='submit_article'>
                    <input class="btn btn-danger" type="reset" value="Reset">
                </form>
            </div>
        </div>
</body>
</html>
