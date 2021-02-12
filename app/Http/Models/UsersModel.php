<?php namespace App\Http\Models;

use App\Http\Models;

    /*
    |--------------------------------------------------------------------------
    | Users Model
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 05/12/2020
    |
    */

Class UsersModel extends BaseModel {

    protected $primaryKey = 'username';
    protected $table = 't_users';
    public $timestamps = false;
}