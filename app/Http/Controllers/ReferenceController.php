<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Helpers\BaseHelper;
use App\Http\Repository\ReferenceRepository;

    /*
    |--------------------------------------------------------------------------
    | Reference Controller
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 27/12/2020
    |
    */

class ReferenceController extends Controller {

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

	public function index(Request $request)	{
		
		
	}

	public function dosp(Request $request) {

		$dosp = new ReferenceRepository();
		$change_password = Session::get(SESS_USER_NAME)['user']['change_password'];

		if($request->session()->has(SESS_USER_NAME)){
        		if($change_password == 1){
        			Session::flash('message', 'Attention. Please change your password now to avoid user abuse.');
                	return Redirect::to('/change_password');
        		}else{

        			$data_list = $dosp->DOSP();
        			$data['dosp'] = $data_list;

        			return view('reference.dosp',$data);
        		}
            }else{
                Session::flash('error_message', 'Sorry. Please sign in to start your session.');
                return Redirect::to('/');
            }
	}

	public function getdosp(Request $request) {

		$dosp = new ReferenceRepository();

		$data = $dosp->GetDOSP($request->input('id'));
		return response()->json($data);
	}

	public function FAQ(Request $request) {

		$faq = new ReferenceRepository();
		$change_password = Session::get(SESS_USER_NAME)['user']['change_password'];

		if($request->session()->has(SESS_USER_NAME)){
        		if($change_password == 1){
        			Session::flash('message', 'Attention. Please change your password now to avoid user abuse.');
                	return Redirect::to('/change_password');
        		}else{

        			$data_list = $faq->FAQ();
        			$data['faq'] = $data_list;

        			return view('reference.faq',$data);
        		}
            }else{
                Session::flash('error_message', 'Sorry. Please sign in to start your session.');
                return Redirect::to('/');
            }
	}

	public function getFAQ(Request $request) {

		$faq = new ReferenceRepository();

		$data = $faq->GetFAQ($request->input('id'));
		return response()->json($data);
	}

}
