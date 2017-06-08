<?php 
require_once '../datasource/connect.php';
 $connect= new ConnectionInstance();
 $id_Proj = 1;// test
 $sql="select * from projet where id_Proj='".$id_Proj."'";
            $result=$connect->get_row($sql);
 ?>
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
		<div class="titreProj"><?php echo $result['titre_Proj'] ?></div><br>
		<div class="row">
			<div class="col-md-6"><img class="imgProj" src="../media/image/3.jpg" alt="projet3"></img></div>
			<div class="col-md-6">
				<div class="desProj"><?php echo $result['desc_Proj'] ?></div>
			</div>
		</div>
		<div class="pull-right"> Nombre participant : <?php echo $result['nb_part'] ?></div>
    </div>


</body>
</html>
