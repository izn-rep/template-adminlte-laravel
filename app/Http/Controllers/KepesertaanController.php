<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Helpers\BaseHelper;
use App\Http\Repository\KepesertaanRepository;

    /*
    |--------------------------------------------------------------------------
    | Kepesertaan Controller
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 03/01/2021
    |
    */

class KepesertaanController extends Controller {

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

	public function peserta(Request $request) {
		

		$peserta = new KepesertaanRepository();
		$change_password = Session::get(SESS_USER_NAME)['user']['change_password'];

		if($request->session()->has(SESS_USER_NAME)){
        		if($change_password == 1){
        			Session::flash('message', 'Attention. Please change your password now to avoid user abuse.');
                	return Redirect::to('/change_password');
        		}else{

        			$data_list = $peserta->Peserta();
        			$data['peserta'] = $data_list;
        			// BaseHelper::DebugArray($data);
        			// die();
        			return view('kepesertaan.peserta',$data);
        		}
            }else{
                Session::flash('error_message', 'Sorry. Please sign in to start your session.');
                return Redirect::to('/');
            }
	}

	public function peserta_list(Request $request) {

		$peserta_repo = new KepesertaanRepository();

		$param = array(
			'is_deleted' => 0
			);

		$data_list = $peserta_repo->PesertaList($param);

		echo json_encode($data_list);

	}

	public function getpeserta(Request $request) {

		$peserta = new KepesertaanRepository();

		$data = $peserta->GetPeserta($request->input('id'));
		return response()->json($data);
	}

}
