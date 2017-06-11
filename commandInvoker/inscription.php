<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once '../datasource/connect.php';
     $connect= new ConnectionInstance();
if ($_SESSION['valide']==true) {
    $nom = filter_var($_GET['n'],FILTER_SANITIZE_SPECIAL_CHARS);
    $prenom = filter_var($_GET['pr'],FILTER_SANITIZE_SPECIAL_CHARS);
    $login = filter_var($_GET['l'],FILTER_SANITIZE_SPECIAL_CHARS);
    $pass = filter_var($_GET['pass'],FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_GET['em'],FILTER_SANITIZE_SPECIAL_CHARS);
         $data=array(
            'nom_Util'=>$nom,
            'prenom_Util'=>$prenom,
            'login_Util'=>$login,
            'email'=>$email,
            'mdp_Util'=>$pass
            );

        $connect->insert('utilisateur',$data);
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
        <<?php } else include_once('../view/inscription.php');?>