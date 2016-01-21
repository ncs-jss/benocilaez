<?php 
namespace app\Http\Controllers;
use Views;
use Illuminate\Routing\Controller as BaseController;

class PagesController extends BaseController{

	public function login(){
		return \View::make('bologin');
	}
	public function registration(){
		return \View::make('addsociety');
	}
}
?>