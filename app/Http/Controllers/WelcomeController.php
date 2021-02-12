<?php namespace App\Http\Controllers;
use Validator;
use File;
use Input;
use Storage;
use App\Http\Controllers\Controller;
use App\Http\Helpers\BaseHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Repository\UsersRepository;

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 28/11/2020
    |
    */

class WelcomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	public function __construct()
	{
		// $this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */

	public function index(Request $request)	{

		if ($request->session()->has(SESS_USER_NAME)) return Redirect::to('/home');

		if ($request->isMethod('post')) 
		{
			$rules = array(
                'username' => 'required|min:4|max:20',
                'password' => 'required|min:4|max:20'
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                // get the error messages from the validator
                $messages = $validator->messages();

                // redirect our user back to the form with the errors from the validator
                return Redirect::to('/')->withErrors($validator);
            } else {
            	$username = trim($request->input('username'));
            	$password = trim($request->input('password'));
            	$password = BaseHelper::Hash($password);
            	
				$userModel = new UsersRepository();
            	
            	//--> GET USERS DATA
            	$user = $userModel->GetUserData($username);
                // dd($user);
            	// BaseHelper::DebugArray($user); // dump array

                //--> IF USER EXIST
                if (isset($user) && $user->exists == 1){

                            //--> IF PASSWORD MATCH
                            if (trim($user->password) == trim($password)){

                                //--> GET USERS ROLE MODULE MAPPING LIST
                                $mapping = $userModel->GetUserModul($username);
                                
                                // BaseHelper::DebugArray($mapping); // dump array

                                if (isset($mapping) && count($mapping) > 0 ){

                                    if ($user->change_password == 1) {

                                    	$request->session()->put(SESS_USER_NAME,array('user' => $user, 'user_modul' => $mapping));

                                    	Session::flash('message', 'Attention. Please change your password now to avoid user abuse.');

	                                    return Redirect::to('/change_password');

                                    } else {
                                    	
	                                    $request->session()->put(SESS_USER_NAME,array('user' => $user, 'user_modul' => $mapping));
	                                    // dd($user);
                                        // die();
	                                    return Redirect::to('/home');
                                    }
                                
                                }else{

                                    Session::flash('message', 'Sorry. You don\'t have permission to access this website. Please contact our Administrator.');
                                    return Redirect::to('/');

                                }
                            
                            }else{
                            
                                Session::flash('error_message', 'Sorry. Password you entered didn\'t match. Please check and try again.');
                                return Redirect::to('/');
                            
                            }

                }else{

                    Session::flash('error_message', 'Sorry. Username you entered doesn\'t exist. Please check or contact our Administrator.');
                    return Redirect::to('/');
                
                }
            }
		}

		return view('auth.login');
	}

	public function change_password(Request $request) {

        if (!$request->session()->has(SESS_USER_NAME)) return Redirect::to('/');
        return view('auth.change');
	}

    public function update_password(Request $request) {
        // dd($request);

        if (!$request->session()->has(SESS_USER_NAME)) return Redirect::to('/');

        $username = Session::get(SESS_USER_NAME)['user']['username'];
        $user_password = Session::get(SESS_USER_NAME)['user']['password'];
        $current_password = trim($request->input('current_password'));
        $current_password_encrypt = BaseHelper::Hash($current_password);
        $new_password = trim($request->input('new_password'));
        $confirm_password = trim($request->input('confirm_password'));

        $rules = array(
            'new_password' => 'required|min:6|max:100',
            'confirm_password' => 'required|min:6|max:100');

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return Redirect::to('change_password')->withErrors($validator);
        } elseif ($current_password_encrypt == $user_password) {

            if ($new_password == $confirm_password) {
                
                $data = array(
                    'password' => BaseHelper::Hash($new_password));

                $user_model = new UsersRepository();
                $status = $user_model->UpdatePassword($data,$username);

                if ($status['status'] == 1) {
                    Session::flash('message', $status['message']);
                    $request->session()->forget(SESS_USER_NAME);
                    return Redirect::to('/');
                } else {
                    Session::flash('error_message', $status['message']);
                    return Redirect::to('change_password');
                }

            } else {
                
                $validator = 'New password and confirm password you entered didn\'t match, please check and try again.';
                return Redirect::to('change_password')->withErrors($validator);
            }

        } else {

            $validator = 'Sorry. Your current password is wrong, please check and try again.';
            return Redirect::to('change_password')->withErrors($validator);
        }
    }

	public function signout(Request $request) {

        if ($request->session()->has(SESS_USER_NAME)){

            $request->session()->forget(SESS_USER_NAME);
            Session::flash('message', 'Successfully sign out.');
            return Redirect::to('/');
        
        }else{
        
            return Redirect::to('/');
        
        }
            
    }

}
