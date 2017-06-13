<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once '../datasource/connect.php';
     $connect= new ConnectionInstance();
 if((isset($_POST['ok']))){
    $secret = "6Lf6RiUUAAAAAMdnINSQtIqamI02YOGPf4FlatpJ";
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
     $result = json_decode($url,true);
    if($result['success']== 1){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $pass = $_POST['mdp'];
    $email = $_POST['email'];
         $data=array(
            'nom_Util'=>$nom,
            'prenom_Util'=>$prenom,
            'login_Util'=>$login,
            'email'=>$email,
            'mdp_Util'=>$pass
            );

        $connect->insert('utilisateur',$data);
        }
?>
 <fieldset>
            <div style="margin-left:50px; width:600px">
                <table class="table-bordered">
                    <thead >
                        <tr style="height:40px;background-color: darkred; color:white">    
                            <th  style="text-align-last: center">
                                Message
                            </th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr>    
                            <td class="active" style="height:100px; font-weight: bold; word-wrap: break-word">
                                Bienvenue! Merci à inscrire au site. <?php echo $prenom . ' ' . $nom ?> est desormais un utilisateur du site et peut publier des articles!
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div><a href=""></a></div>
        </fieldset>
        <?php } else { include_once('../view/inscription.php');?>
        
                <div class="col-md-10 alert alert-danger" style="font-size:12px;left:-12px;margin-top:5px"><strong>WARNING!</strong> Les informations saisies ne sont pas valides.Veuillez les verifier</div>
                <?php } ?>