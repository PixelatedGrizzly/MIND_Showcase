<?php
    require_once '../datasource/connect.php';
    $connect= new ConnectionInstance();

    if(isset($_POST['submit'])){
        $titre=addslashes(trim($_POST['titre']));
        $desc=addslashes(trim($_POST['desc']));
        $nb_part=addslashes(trim($_POST['nb_part']));
        $actualite=addslashes(trim($_POST['actualite']));
        $photo_choisi=addslashes(trim($_POST['photo_choisi']));


        $id_Util_Proj=1; //test, on va changer apès par session['utilisateur']

        $data=array(
            'titre_Proj'=>$titre,
            'desc_Proj'=>$desc,
            'nb_part'=>$nb_part,
            'id_Util_Proj'=>$id_Util_Proj
            );
        $connect->insert('projet',$data);


        $sql="select * from projet where titre_Proj='".$titre."' and desc_Proj='".$desc."'";
        $result=$connect->get_row($sql);
        $id_Proj=$result['id_Proj'];

         $data=array(
            'contenu'=>$actualite,
            'id_Proj_Act'=>$result['id_Proj']
        );
        $connect->insert('actualites',$data);

        if($_FILES['photos']['name'][0]!=""){
            $path="../media/image/";
            $length=count($_FILES['photos']['name']);
            echo "<pre>";
            print_r($_FILES['photos']);

            for ($i=0;$i<$length;$i++){
                $type_file=$_FILES['photos']['type'][$i];
                $name_file=$_FILES['photos']['name'][$i];
                $tmp_name=$_FILES['photos']['tmp_name'][$i];
                move_uploaded_file($tmp_name, $path.$name_file);

                $data2=array(
                    "cheminFichier_Media"=>$path.$name_file,
                    "type_Media"=>$type_file,
                    "id_Proj_Media"=>$id_Proj
                );
                $connect->insert('media',$data2);    
            }
        }
        if($photo_choisi!=''){
            $data2=array(
                "cheminFichier_Media"=>$photo_choisi,
                "type_Media"=>'image',
                "id_Proj_Media"=>$id_Proj
            );
            $connect->insert('media',$data2); 
        }


    }


?>
