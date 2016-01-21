<?

namespace App\Http\Controllers;

class SocietyController extends BaseController{

public function slogin()
    {
      if(\Auth::check())
      {
        return \Veiw::make('society_dashboard');
      }
      else
      {
      return \Veiw::make('society_login');
      }
    }
}


public function societylogin(){
	
}
?>