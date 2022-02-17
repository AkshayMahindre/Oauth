<?php 
require_once 'AbstractClient.php';

class Amazon extends AbstractClient{

	public function getClientCredentials()
	{
		return [
			'client_id' => getenv('AMAZON_CLIENT_ID'),
	        'client_secret' => getenv('AMAZON_CLIENT_SECRET'),
	        'redirect_uri' => getenv('AMAZON_REDIRECT_URI'),
	        'base_uri'	=> getenv('AMAZON_BASE_URI'),
	        'access_token_uri' => getenv('AMAZON_ACCESS_TOKEN_URI'),
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
	        'scope' => 'advertising::campaign_management'
    	]);
    	return $authUrl;
	}

}


 ?>