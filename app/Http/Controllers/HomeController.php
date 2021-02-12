<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Helpers\BaseHelper;

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 28/11/2020
    |
    */

class HomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	public function index(Request $request) {
		
		// BaseHelper::DebugArray(session());
		// die();;
		$change_password = Session::get(SESS_USER_NAME)['user']['change_password'];

		if($request->session()->has(SESS_USER_NAME)){
        		if($change_password == 1){
        			Session::flash('message', 'Attention. Please change your password now to avoid user abuse.');
                	return Redirect::to('/change_password');
        		}else{
        			return view('home');
        		}
            }else{
                Session::flash('error_message', 'Sorry. Please sign in to start your session.');
                return Redirect::to('/');
            }

		return view('home');
	}

}
