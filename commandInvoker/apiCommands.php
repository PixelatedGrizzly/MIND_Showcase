<?php
if (strpos($_SERVER['SCRIPT_NAME'], 'index.php') == false)
 $prefix = "../";
 else {
   $prefix = "";
 }
require_once($prefix.'vendor/tmhOAuth/tmhOAuth.php');
require_once($prefix.'vendor/patreon/patreon/src/patreon.php');




class ApiCommands {
  static function  getTwitterMentions(){
    $tmhOAuth = new tmhOAuth();
    $code = $tmhOAuth->user_request(array(
     'method' => 'GET',
    'url' => $tmhOAuth->url('1.1/statuses/mentions_timeline') ));
    if ($code == 200) {
    $data = json_decode($tmhOAuth->response['response'], true);
    return $data;
  }else {
    return 1;
  }

}

static function getCoworkingSpaces(){
  $coworking =  ApiCommands::sendRequest("GET", "https://api.foursquare.com/v2/venues/explore?query=coworking&near=paris&oauth_token=CXWZI4MZW3ZMQ1WUIDXHCF3CZVHSRBUKG4PXLMDYEN5TJ1TC&v=20170613");
  $result =  json_decode($coworking, true);

  $venues = array();
  $i = 0;
  foreach ($result["response"]["groups"][0]["items"] as $key => $value) {
    if(isset($value["venue"])){
      $venues[$i]["name"] = $value["venue"]["name"];
      $venues[$i]["lat"] = $value["venue"]["location"]["lat"];
      $venues[$i]["lng"] = $value["venue"]["location"]["lng"];
      $venues[$i]["address"] = "";
      if(isset($value["venue"]["location"]["address"]))
        $venues[$i]["address"] = $value["venue"]["location"]["address"];
      $i++;
    }
  }
  return $venues;
}

static function getPatreonData(){



  $access_token = "XY1sMPEYrkuUJYUseY6fB73Ik2sNDm";
  $refresh_token = "ABREDCNryaDrWsXUZN7iSF3vOZ0CvU";
  $api_client = new Patreon\API($access_token);
  return $api_client->__get_json("current_user/campaigns?include=rewards,creator,goals");

}



static function sendRequest($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }


    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
    $result = curl_exec($curl);

    //var_dump(curl_error($curl));
    curl_close($curl);

    return $result;
}

}
?>
