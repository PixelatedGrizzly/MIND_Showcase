class ApiCommands{

  
  getTwitterMentions(){
    var authorizationTwitterHeader = "OAuth ";
    $.getJSON("../api/twitter_credentials.json", function(dataTwitter) {
         $.getJSON("../api/random-org_credentials.json", function(fileRandom) {

             //Connexion à l'API de random.org afin de générer une chaine de caractère aléatoire nécessaire pour l'authentification au service de Twitter
             var dataRandom = {
             "jsonrpc": "2.0",
             "method": "generateStrings",
             "params": {
                 "apiKey": fileRandom['api-key'],
                 "n": 2,
                 "length" : 16,
                 "characters":"AZERTYUIOPQSDFGHJKLMWXCVBN123456789azertyuiopqsdfghjklmwxcvbn"
             },
             "id": 18197
            };
             var connectorRandom = new ServiceConnector("https://api.random.org/json-rpc/1/invoke", "POST", dataRandom);
             var oauth_nonce ="";
             connectorRandom.sendRequestRPC(function(result){
                 oauth_nonce = result["result"]["random"]["data"][0]+result["result"]["random"]["data"][1];
                 var oauth_timestamp = Math.floor(Date.now() / 1000);

                 //Construction de la chaine de caractere rassemblant tous les parametres pour effectuer une signature
                 var hashedValue="GET&"+encodeURIComponent("https://api.twitter.com/1.1/statuses/mentions_timeline.json")+"&"+encodeURIComponent("oauth_consumer_key="+dataTwitter[0]+"&oauth_nonce="+oauth_nonce+"&oauth_signature_method=HMAC-SHA1&oauth_timestamp="+oauth_timestamp+"&oauth_token="+dataTwitter[1]+"&oauth_version=1.0");
                 var hashedKey=encodeURIComponent("bJ3raPF4XnWchA4lnned6dqP6YFPVeLnAJdhYpuYrhItmgHrvH")+"&"+encodeURIComponent("hvKg4bb0eGHWY50jo7jyX4FS1y45FiJ3U036xTE954rXo");
                 var oauth_signature = b64_hmac_sha1(hashedKey, hashedValue);
                 var oauth_signature_method= "HMAC-SHA1";

                 $.each( dataTwitter, function( key, val ) {
                    authorizationTwitterHeader += key+'="'+val+'", ';
                 });

                 authorizationTwitterHeader += 'oauth_nonce="'+oauth_nonce+'", oauth_signature="'+oauth_signature+'", oauth_signature_method="'+oauth_signature_method+'", oauth_timestamp="'+oauth_timestamp;
                 authorizationTwitterHeader = authorizationTwitterHeader.replace(/(^,)|(,\s*$)/g, "");
                 var connectorTwitter = new ServiceConnector("https://api.twitter.com/1.1/statuses/mentions_timeline.json", "GET", undefined, authorizationTwitterHeader);
                 connectorTwitter.sendRequest();
             });
         });
    });
  }
}
