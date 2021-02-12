<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Urlgenerator;
use App\Http\Helpers\BaseHelper;

    /*
    |--------------------------------------------------------------------------
    | Reference Repository
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 27/12/2020
    |
    */


Class ReferenceRepository {

	public function DOSP() {

		$dosp = DB::connection('mysql')
        ->table('m_formularium_2020')
        ->select('*')
        ->get();

        return $dosp;
	}

    public function GetDOSP($data) {

        $dosp = DB::connection('mysql')
        ->table('m_formularium_2020')
        ->select('*')
        ->where(array('id' => $data))
        ->first();

        return $dosp;
    }

    public function FAQ() {

        $faq = DB::connection('mysql')
        ->table('m_benefit')
        ->select('*')
        ->get();

        return $faq;
    }

    public function getFAQ($data) {

        $faq = DB::connection('mysql')
        ->table('m_benefit')
        ->select('*')
        ->where(array('id' => $data))
        ->first();

    }

}