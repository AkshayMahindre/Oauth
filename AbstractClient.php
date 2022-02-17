<?php 

abstract class AbstractClient
{
	abstract public function getClientCredentials();
	abstract public function createRedirectUrl();
}

?>