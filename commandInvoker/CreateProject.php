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
                <form method="POST"  enctype="multipart/form-data" >
                    <div class="form-group">
                        <label>Le titre du projet</label>
                        <input type="text" class="form-control" name="titre" >
                    </div>
                    <div class="form-group">
                        <label>Desciption du projet</label>
                         <textarea name="desc" class="form-control" rows="5" style="margin-bottom: 10px"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Le nombre des participants</label>
                        <input type="text" class="form-control" name="nb_part" >
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
<?php
    require_once '../datasource/connect.php';
    $connect= new ConnectionInstance();

    if(isset($_POST['submit'])){
        $titre=addslashes(trim($_POST['titre']));
        $desc=addslashes(trim($_POST['desc']));
        $nb_part=addslashes(trim($_POST['nb_part']));

        $id_Util_Proj=1; //test, on va changer apès par session['utilisateur']

        $data=array(
            'titre_Proj'=>$titre,
            'desc_Proj'=>$desc,
            'nb_part'=>$nb_part,
            'id_Util_Proj'=>$id_Util_Proj
            );
        $connect->insert('projet',$data);

        if(isset($_FILES['file']['name'])){
            $type_file=$_FILES['file']['type'];
            $name_file=$_FILES['file']['name'];
            $tmp_name=$_FILES['file']['tmp_name'];
            $path="../media/image_projet/";
            move_uploaded_file($tmp_name, $path.$name_file);

            $sql="select * from projet where titre_Proj='".$titre."' and desc_Proj='".$desc."'";
            $result=$connect->get_row($sql);
            echo "<pre>";
            print_r($result);
            $data2=array(
                "cheminFichier_Media"=>$path.$name_file,
                "type_Media"=>$type_file,
                "id_Proj_Media"=>$result['id_Proj']
                );
            print_r($data2);
            $connect->insert('media',$data2);
         }
    }


?>
