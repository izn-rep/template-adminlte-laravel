<?php namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Urlgenerator;
use App\Http\Helpers\BaseHelper;

    /*
    |--------------------------------------------------------------------------
    | Kepesertaan Repository
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 03/01/2021
    |
    */


Class KepesertaanRepository {

	public function Peserta() {

		$peserta = DB::table('t_peserta')
        ->select('t_peserta.*','m_pembiayaan.pembiayaan','m_tipe_pensiun.tipe_pensiun','m_kelas_rawat.kelas_rawat')
        ->leftjoin('m_tipe_pensiun','m_tipe_pensiun.id','=','t_peserta.tipe_pensiun_id')
        ->leftjoin('m_kelas_rawat','m_kelas_rawat.id','=','t_peserta.kelas_rawat_id')
        ->leftjoin('m_pembiayaan','m_pembiayaan.id','=','t_peserta.pembiayaan_id')
        ->take(50)
        ->get();

        return $peserta;
	}

    public function PesertaList($param) {

        $peserta = DB::table('t_peserta')
        ->select('t_peserta.*','m_pembiayaan.pembiayaan','m_tipe_pensiun.tipe_pensiun','m_kelas_rawat.kelas_rawat')
        ->leftjoin('m_tipe_pensiun','m_tipe_pensiun.id','=','t_peserta.tipe_pensiun_id')
        ->leftjoin('m_kelas_rawat','m_kelas_rawat.id','=','t_peserta.kelas_rawat_id')
        ->leftjoin('m_pembiayaan','m_pembiayaan.id','=','t_peserta.pembiayaan_id')
        ->where('t_peserta.is_deleted','=',$param['is_deleted'])
        ->take(50)
        ->get();

        return $peserta;
    }
 
    public function GetPeserta($data) {

        $peserta = DB::table('t_peserta')
        ->select('t_peserta.*','m_pembiayaan.pembiayaan','m_tipe_pensiun.tipe_pensiun','m_kelas_rawat.kelas_rawat')
        ->leftjoin('m_tipe_pensiun','m_tipe_pensiun.id','=','t_peserta.tipe_pensiun_id')
        ->leftjoin('m_kelas_rawat','m_kelas_rawat.id','=','t_peserta.kelas_rawat_id')
        ->leftjoin('m_pembiayaan','m_pembiayaan.id','=','t_peserta.pembiayaan_id')
        ->where(array('t_peserta.id' => $data))
        ->first();

        return $peserta;
    }

}