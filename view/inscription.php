 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../media/styles.css">
   <link href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>       
         <script language ='javascript' type="text/javascript" src="../lib/valide_inscription.js"></script>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 main-content">
<div class="row" id='field'>
    <div class="col-md-10 col-md-offset-1">
        <form method="post" action="" class="form-horizontal">  
            <fieldset>
                <legend>Inscription</legend>

                <div class="form-group">
                            <label class="col-md-2" style="font-size:12px">Nom* </label>
                            <div class="col-md-5">
                                <input class="form-control" type="text" id="nom" onkeyup="ajax_valide_login('nom', this.value)"/>
                            </div>
                            <div class="col-md-5" style="left:-20px"><span id='error_nom' class="error"></span></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2" style="font-size:12px">Prenom* </label>
                            <div class="col-md-5">
                                <input class="form-control" type="text" id="prenom" onkeyup="ajax_valide_login('prenom', this.value)"/>
                            </div>
                            <div class="col-md-5" style="left:-20px"><span id='error_prenom' class="error"></span></div>
                        </div>

                        <div class="form-group">
                            <label style="font-size:12px" class="col-md-2">Identifiant*</label>
                            <div class="col-md-5">
                                <input type="text" id="login" class="form-control" onkeyup='ajax_valide_login("login", this.value)'/>
                            </div>   
                            <div class="col-md-5" style="left:-20px"><span id='error_login' class="error"></span></div>
                        </div>

                        <div class="form-group">
                            <label style="font-size:12px" class="col-md-2">Mot de passe* </label>
                            <div class="col-md-5">
                                <input type="password" id="password" class="form-control" placeholder="Au moins 6 caracteres" onkeyup="ajax_valide_login('password', this.value)"/>
                            </div>
                            <div class="col-md-5" style="left:-20px"><span id='error_password' class="error"></span></div>
                        </div>

                        <div class="form-group">
                            <label style="font-size:12px" class="col-md-2">Verifier le mot de passe* </label>
                            <div class="col-md-5">
                                <input type="password" id="passConfirm" class="form-control" onkeyup="ajax_valide_login('passConfirm', this.value)"/>
                            </div>                                        
                            <div class="col-md-5" style="left:-20px"><span id='error_passConfirm' class="error"></span></div>
                        </div>

                        <div class="form-group">
                            <label style="font-size:12px" class="col-md-2">Email* </label>
                            <div class="col-md-5">
                                <input type="text" id="email" class="form-control" onkeyup="ajax_valide_login('email', this.value)"/>
                            </div>                                        
                            <div class="col-md-5" style="left:-20px"><span id='error_email' class="error"></span></div>
                        </div>
                <fieldset>
                    <legend style="font-size: 12px;font-style: italic">Montrez que vous n"etes pas un robot</legend>
                    <div class = "row">
                        <img id = "captcha_img" src = "../captcha/captcha.php" alt = "captcha" style = "margin-left:15px" />
                    </div>
                    <div class = "row" style = "margin-top: 5px">
                        <div class = "col-md-4">
                            <input type = "text" id = "captcha_input" class = "form-control" onkeyup="ajax_valide_login('captcha_input', this.value)"/>
                        </div>
                        <div class = "col-md-5" style='left:-55px; margin-top:5px'>
                            <img src="../captcha/image/refresh.png" style='cursor:pointer' onclick='reload_captcha()' /><span id='error_captcha_input' class='error' style='margin-left:10px'></span> 
                        </div>                                     
                    </div>
                </fieldset>
                <div class="row" style='left:-14px'>
                    <div class="col-md-2"><input type='button' value='SEND' class='btn btn-primary' onclick='valideInsctiption();' style="margin-top:5px;height:48px"/></div>
                    <?php if (isset($_SESSION['valide']) && $_SESSION['valide']== false) {?>
                <div class="col-md-10 alert alert-danger" style="font-size:12px;left:-12px;margin-top:5px"><strong>WARNING!</strong> Les informations saisies ne sont pas valides.Veuillez les verifier</div>
                <?php } ?>
                </div>
            </fieldset>
        </form>
    </div> 
</div>  
</div>
</body>
</html>