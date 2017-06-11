/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function ajax_valide_login(objet, str) {
    var xmlHTTP;
    if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            document.getElementById('error_' + objet).innerHTML = xmlHttp.responseText;
        }
    }
   
     if(objet === 'passConfirmC') {
        var passConfirm = document.getElementById('passwordC').value;
        xmlHttp.open('GET', '../lib/error_message.php?e=' + str + '&o=' + objet + '&pa=' + passConfirm, true);
        xmlHttp.send(null);
    }
     else if(objet === 'passwordC') {
        var passConfirm = document.getElementById('password').value;
        xmlHttp.open('GET', '../lib/error_message.php?e=' + str + '&o=' + objet + '&pa=' + passConfirm, true);
        xmlHttp.send(null);
    }  else if(objet === 'passConfirm') {
        var passConfirm = document.getElementById('password').value;
        xmlHttp.open('GET', '../lib/error_message.php?e=' + str + '&o=' + objet + '&pa=' + passConfirm, true);
        xmlHttp.send(null);
    }
    else {
        xmlHttp.open('GET', '../lib/error_message.php?e=' + str + '&o=' + objet, true);
        xmlHttp.send(null);
    }
   

}

function valideInsctiption() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var login = document.getElementById('login').value;
    var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;
    if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            document.getElementById('field').innerHTML = xmlHttp.responseText;
        }
    }
    xmlHttp.open('GET', '../commandInvoker/inscription.php?n=' + nom + '&pr=' + prenom + '&l=' + login + '&pass=' + password + '&em=' + email, true);
    xmlHttp.send(null);
}

function reload_captcha() {
    document.getElementById("captcha_img").src = "../captcha/captcha.php";
}