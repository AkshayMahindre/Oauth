<?php 
require_once 'AbstractClient.php';

class Google extends AbstractClient{

	public function getClientCredentials()
	{
		return [
			'client_id' => getenv('GOOGLE_CLIENT_ID'),
	        'client_secret' => getenv('GOOGLE_CLIENT_SECRET'),
	        'redirect_uri' => getenv('GOOGLE_REDIRECT_URI'),
	        'base_uri'	=> getenv('GOOGLE_BASE_URI'),
	        'access_token_uri' => getenv('GOOGLE_ACCESS_TOKEN_URI'),
	        'grant_type' => 'authorization_code'
		];
	}

	public function createRedirectUrl()
	{
		$params = $this->getClientCredentials();
		$authUrl = $params['base_uri'].http_build_query([
	        'client_id' => $params['client_id'],
	        'redirect_uri' => $params['redirect_uri'],
	        'response_type' => 'code',
	        'scope' => implode(' ', [
	            'email','profile'
	        ])
    	]);
    	return $authUrl;
	}

}


 ?>