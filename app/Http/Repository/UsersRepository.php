<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Urlgenerator;
use App\Http\Helpers\BaseHelper;
use App\Http\Models\UsersModel;

    /*
    |--------------------------------------------------------------------------
    | Users Repository
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 28/11/2020
    |
    */


Class UsersRepository {

    public function GetUserData($username)  {
        
        $users = UsersModel::select('*')
        ->leftjoin('m_role as b','b.id','=','role_id')
        ->where(array('username' => $username))
        ->first();

        return $users;
    }

    public function GetUserModul($username) {

        $modul = DB::connection('mysql')
        ->table('t_users')
        ->select('m_role.id','m_role.role_name','m_modul.id','m_modul.label','m_modul.icon','m_modul.url','m_modul.is_status','m_modul.is_parent','m_modul.parent_id','m_modul.sort','m_modul.is_menu')
        ->join('m_role','m_role.id','=','t_users.role_id')
        ->join('t_role_mapping','t_role_mapping.role_id','=','m_role.id')
        ->join('m_modul','m_modul.id','=','t_role_mapping.modul_id')
        ->where(array('t_users.username' => $username,'t_users.is_status' => 1, 'm_modul.is_status' => 1))
        ->orderBy('sort')
        ->get();

        return $modul;
    }

    public function UpdatePassword($data, $username) {

        // echo "oi";
        // die();;
        $status = array('status' => 0, 'message' => 'Failed');

        $update = UsersModel::where('username', $username)
        ->update(array(
            'password' => $data['password'],
            'change_password' => 0,
            'updated_by' => $username,
            'updated_on' => date('Y-m-d H:i:s')));

        if ($update) {
            $status = array('status' => 1, 'message' => 'Password successfuly changed. Please sign in again.');
        } else {
            $status = array('status' => 0, 'message' => 'Password change failed.' );
        }

        return $status;
    }

    public function GetUserList() {

        $users = DB::connection('mysql')
        ->table('t_users as a')
        ->select('a.*','b.role_name')
        ->leftjoin('m_role as b','b.id','=','a.role_id')
        ->get();

        return $users;
    }

    public function GetUser($data) {

        $users = DB::connection('mysql')
        ->table('t_users as a')
        ->select('a.*','b.role_name')
        ->leftjoin('m_role as b','b.id','=','a.role_id')
        ->where(array('a.id' => $data))
        ->first();

        return $users;
    }

}