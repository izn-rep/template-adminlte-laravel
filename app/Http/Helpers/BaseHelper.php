<?php namespace App\Http\Helpers;

    /*
    |--------------------------------------------------------------------------
    | Base Helper
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 28/11/2020
    |
    */

Class BaseHelper
{
	// to make a hash logic encryption for password
	public static function Hash($value) {
		return sha1(md5($value));
	}

	// to make an easy debug
	public static function DebugArray($arr = array()) {
		print '<pre>';
		print_r($arr);
		print '</pre>';
		exit;
	}

	// to parsing URL
	public static function ParseMenuURL($str) {		
		if(substr($str, 0, 7) == 'http://' || substr($str, 0, 3) == 'www'){
            $url = $str;
        }else{
            $url = URL($str);
        }

        return $url;
	}
}