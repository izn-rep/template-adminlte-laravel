<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Urlgenerator;
use App\Http\Helpers\BaseHelper;

    /*
    |--------------------------------------------------------------------------
    | Menus Repository
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 25/12/2020
    |
    */


Class MenusRepository {

	public function GetMenuList() {

		$menu = DB::connection('mysql')
        ->table('m_modul as a')
        ->select('a.*','b.label as parent_name')
        ->leftjoin('m_modul as b','b.id','=','a.parent_id')
        ->orderBy('a.parent_id','asc','a.sort')
        ->get();

        return $menu;
	}

    public function GetMenu($data) {
        
        $menu = DB::connection('mysql')
        ->table('m_modul as a')
        ->select('a.*','b.label as parent_name')
        ->leftjoin('m_modul as b','b.id','=','a.parent_id')
        ->where(array('a.id' => $data))
        ->first();

        return $menu;
    }
}
