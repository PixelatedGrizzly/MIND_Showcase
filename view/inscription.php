 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../media/styles.css">
   <link href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
   <script src='https://www.google.com/recaptcha/api.js'></script><!DOCTYPE html>
   <script language ='javascript' type="text/javascript" src="../lib/valide_inscription.js"></script>
  </head>
  <body>       
         

<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 main-content">
<div class="row" id='field'>
    <div class="col-md-10 col-md-offset-1">
        <form method="post" action="../commandInvoker/inscription.php" class="form-horizontal">  
            <fieldset>
                <legend>Inscription</legend>

                <div class="form-group">
                            <label class="col-md-2" style="font-size:12px">Nom* </label>
                            <div class="col-md-5">
                                <input class="form-control" type="text" id="nom" name="nom"/>
                            </div>
                            <div class="col-md-5" style="left:-20px"><span id='error_nom' class="error"></span></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2" style="font-size:12px">Prenom* </label>
                            <div class="col-md-5">
                                <input class="form-control" type="text" id="prenom" name="prenom" />
                            </div>
                            <div class="col-md-5" style="left:-20px"><span id='error_prenom' class="error"></span></div>
                        </div>

                        <div class="form-group">
                            <label style="font-size:12px" class="col-md-2">Identifiant*</label>
                            <div class="col-md-5">
                                <input type="text" id="login" class="form-control" name="login" />
                            </div>   
                            <div class="col-md-5" style="left:-20px"><span id='error_login' class="error"></span></div>
                        </div>

                        <div class="form-group">
                            <label style="font-size:12px" class="col-md-2">Mot de passe* </label>
                            <div class="col-md-5">
                                <input type="password" id="password" class="form-control" placeholder="Au moins 6 caracteres" name="mdp"/>
                            </div>
                            <div class="col-md-5" style="left:-20px"><span id='error_password' class="error"></span></div>
                        </div>

                        <div class="form-group">
                            <label style="font-size:12px" class="col-md-2">Email* </label>
                            <div class="col-md-5">
                                <input type="text" id="email" class="form-control" name="email" />
                            </div>                                        
                            <div class="col-md-5" style="left:-20px"><span id='error_email' class="error"></span></div>
                        </div>
                <fieldset>
                    <div class="g-recaptcha" data-sitekey="6Lf6RiUUAAAAAJ2W78ith5RhYcbU5E0GFP8PnXAd"></div>
                </fieldset>
                <div class="row" style='left:-14px'>
                    <div class="col-md-2"><input type='submit' value='SEND' class='btn btn-primary' id="ok" name="ok"  style="margin-top:5px;height:48px"/></div>
                    
                </div>
            </fieldset>
        </form>
    </div> 
</div>  
</div>
</body>
</html>