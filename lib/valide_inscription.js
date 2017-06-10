/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function valide_pw() {
//    document.getElementById('error_mess_pw').innerHTML = 'Le mot de passe est bon...';
//    var pw = document.getElementByName('password');
    var long = document.form.password.value.length;

    if (long < 7) {
        document.getElementById('error_mess_pw').innerHTML = "Le mot de passe est faible...";
    } else {
        document.getElementById('error_mess_pw').innerHTML = 'Le mot de passe est bon...';
    }
}


function valide_inscription() {
    var nom = document.getElementByName('nom').value;
    var prenom = document.getElementByName('prenom').value;
    var login = document.getElementByName('login').value;
    var email = document.getElementByName('email').value;
    var organisation = document.getElementByName('organisation').value;
    var e = document.getElementByName('groupe');
    var groupe = e.options[e.selectedIndex].value;

    if (valide_detail('nom') && valide_detail('prenom') && valide_detail('login') && valide_detail('pass') && valide_detail('passConfirm') && valide_detail('email') && valide_detail('organisation')) {
        document.write('<?php addUser(' + nom + ',' + prenom + ',' + login + ',' + email + ',' + organisation + ',' + groupe + '?>');
    }


}
function valide_detail(info) {
    var input = document.getElementByName(info).value;
    if (input || info == null) {
        document.getElementById('error_'.info).innerHTML = 'Veillez saisir votre ' + info;
        return false;
    } else {
        if (info == 'passconfirm' && input != document.getElementByName('password')) {
            document.getElementById('error_'.info).innerHTML = 'Les mots de passe ne sont pas identifies ';
            return false
        } else {
            return true;
        }
    }
}


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

function new_admin_annonce(action) {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var login = document.getElementById('login').value;
    var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;
    var organisation = document.getElementById('organisation').value;
    var e = document.getElementById('groupe');
    var groupe = e.options[e.selectedIndex].value;
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
    xmlHttp.open('GET', '../Client_action/new_admin_annonce.php?do=' + action + '&n=' + nom + '&pr=' + prenom + '&l=' + login + '&pass=' + password + '&em=' + email + '&or=' + organisation + '&gr=' + groupe, true);
    xmlHttp.send(null);
}

function reload_captcha() {
    document.getElementById("captcha_img").src = "captcha.php";
}