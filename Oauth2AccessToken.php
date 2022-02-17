<?php 
require 'autoload.php';
class Oauth2AccessToken
{
    public static function init()
    {
      try{
        // inject dependancy.
        $oauth = new Authorization(new Google());
        if(isset($_GET['code'])){
          $oauth->getAccessToken($_GET['code']);
        }else{
          $oauth->redirectUrl();
        }
      
      }catch(\Exception $e){
        echo $e->getMessage(), "\n";
      }
    }
}

Oauth2AccessToken::init();



?>
