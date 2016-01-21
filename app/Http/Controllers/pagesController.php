<?php 
namespace app\Http\Controllers;
use Views;
use Illuminate\Routing\Controller as BaseController;

class PagesController extends BaseController{

	public function a(){
		$googleClient = new Google_Client;
		$auth = new GoogleAuth;

		return \View::make('welcome',array('login'=> $auth->$isLoggedIn ));
	}
}
?>