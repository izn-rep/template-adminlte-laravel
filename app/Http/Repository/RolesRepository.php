<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Urlgenerator;
use App\Http\Helpers\BaseHelper;

    /*
    |--------------------------------------------------------------------------
    | Roles Repository
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 26/12/2020
    |
    */


Class RolesRepository {

	public function GetRoleList() {

		$role = DB::connection('mysql')
        ->table('m_role')
        ->select('*')
        ->get();

        return $role;
	}

	public function GetRole($data) {

		$role = DB::connection('mysql')
        ->table('m_role')
        ->select('*')
        ->where(array('id' => $data))
        ->first();

        return $role;
	}
}