<?php
	
class GoogleAuthController{
	proctected $client;

	public function __construct (Google_client $googleclient = null){
		this->client = $googleclient;
		if(this->client){
			this->client->setClientId('911724778979-eulj868cugcjcikpbeislco41ua7o0sn.apps.googleusercontent.com');
			this->client->setClientSecret('2alL0OC4rigt8clqSKmebEzo');
			this->client->setRedirctUri('http://localhost/elastic-heart/public/user');
			this->client->setScopes('email');

		}
	}

	public function isLoggedIn(){
		return isset($_SESSION['access_token']);
	}
}

?>