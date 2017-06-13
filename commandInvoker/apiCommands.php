<?php
require_once('../vendor/tmhOAuth/tmhOAuth.php');

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

}
?>
