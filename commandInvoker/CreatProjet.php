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
            $data2=array(
                "cheminFichier_Media"=>$path.$name_file,
                "type_Media"=>$type_file,
                "id_Proj_Media"=>$result['id_Proj']
                );
            $connect->insert('media',$data2);
         }
    }


?>
