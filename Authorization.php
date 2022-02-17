<?php

class Authorization
{
  private AbstractClient $client;
  public function __construct($client)
  {
      $this->client = $client;
  }

  // get created uri.
  public function getRedirectUrl()
  {
    return $this->client->createRedirectUrl();
  }

  // return sign in button with authorization url
  public function redirectUrl()
  {
      $login_button = '<a href="'.$this->getRedirectUrl().'">Sign In</a>';
      echo $login_button;
  }

// curl request to get access token
  public function getAccessToken($code)
  {
      $params = $this->client->getClientCredentials();
      $ch = curl_init();
      curl_setopt($ch, constant("CURLOPT_" . 'URL'), $params['access_token_uri']);
      unset($params['access_token_uri']);
      unset($params['base_uri']);
      $params['code'] = $code;
      curl_setopt($ch, constant("CURLOPT_" . 'POST'), true);
      curl_setopt($ch, constant("CURLOPT_" . 'POSTFIELDS'), $params);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      curl_close($ch);
      if ($info['http_code'] === 200) {
          return $output;
      } else {
          return 'An error happened';
      }
  }
}

?>