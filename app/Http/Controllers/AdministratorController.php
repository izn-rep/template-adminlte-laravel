<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Helpers\BaseHelper;
use App\Http\Repository\UsersRepository;
use App\Http\Repository\MenusRepository;
use App\Http\Repository\RolesRepository;

    /*
    |--------------------------------------------------------------------------
    | Administrator Controller
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 07/12/2020
    |
    */

class AdministratorController extends Controller {

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

	public function users(Request $request) {

		$users = new UsersRepository();
		$change_password = Session::get(SESS_USER_NAME)['user']['change_password'];

		if($request->session()->has(SESS_USER_NAME)){
        		if($change_password == 1){
        			Session::flash('message', 'Attention. Please change your password now to avoid user abuse.');
                	return Redirect::to('/change_password');
        		}else{

        			$data_list = $users->GetUserList();
        			$data['users'] = $data_list;

        			return view('administrator.users',$data);
        		}
            }else{
                Session::flash('error_message', 'Sorry. Please sign in to start your session.');
                return Redirect::to('/');
            }
	}

	public function getuser(Request $request) {

		$users = new UsersRepository();

		$data = $users->GetUser($request->input('id'));
		return response()->json($data);
	}

	public function menus(Request $request) {
		
		$menus = new MenusRepository();
		$change_password = Session::get(SESS_USER_NAME)['user']['change_password'];

		if($request->session()->has(SESS_USER_NAME)){
        		if($change_password == 1){
        			Session::flash('message', 'Attention. Please change your password now to avoid user abuse.');
                	return Redirect::to('/change_password');
        		}else{

        			$data_list = $menus->GetMenuList();
        			$data['menus'] = $data_list;

        			return view('administrator.menus',$data);
        		}
            }else{
                Session::flash('error_message', 'Sorry. Please sign in to start your session.');
                return Redirect::to('/');
            }
	}

	public function getmenu(Request $request) {

		$menus = new MenusRepository();

		$data = $menus->GetMenu($request->input('id'));
		return response()->json($data);
	}

	public function roles(Request $request) {
		
		$roles = new RolesRepository();
		$change_password = Session::get(SESS_USER_NAME)['user']['change_password'];

		if($request->session()->has(SESS_USER_NAME)){
        		if($change_password == 1){
        			Session::flash('message', 'Attention. Please change your password now to avoid user abuse.');
                	return Redirect::to('/change_password');
        		}else{

        			$data_list = $roles->GetRoleList();
        			$data['roles'] = $data_list;
        			return view('administrator.roles',$data);
        		}
            }else{
                Session::flash('error_message', 'Sorry. Please sign in to start your session.');
                return Redirect::to('/');
            }
	}

	public function getrole(Request $request) {

		$roles = new RolesRepository();

		$data = $roles->GetRole($request->input('id'));
		return response()->json($data);
	}


}
