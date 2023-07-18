<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RiwayatJabatan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_jabatan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bkn_id',
        'nip_baru',
        'nama_pegawai',
        'nama_unor',
        'nama_jenis_jabatan',
        'nama_jabatan',
        'nama_eselon',
        'tmt_jabatan',
        'nomor_sk',
        'tanggal_sk',
        'tmt_pelantikan',
        'sk',
        'np',
        'spp',
        'ba',
        'unor_bkn_id',
        'jenis_jabatan_id',
        'jabatan_id',
        'eselon_id',
        'unor_induk_bkn_id',
    ];

    public function listing($nip_baru='')
    {
        $query = DB::table('riwayat_jabatan')
                    ->select('riwayat_jabatan.*', 'satker.nama as nama_satker')
                    ->leftJoin('master_unor', 'master_unor.bkn_id', 'riwayat_jabatan.unor_bkn_id')
                    ->leftJoin('master_unor as satker', 'satker.bkn_id', 'master_unor.unor_induk_bkn_id')
                    ->where('nip_baru', $nip_baru)
                    ->orderBy('riwayat_jabatan.tmt_jabatan', 'DESC')
                    ->get();
        return $query;
    }

    public function detail($id)
    {
        $query =DB::table('riwayat_jabatan')
                    ->select('riwayat_jabatan.*', 'satker.nama as nama_satker')
                    ->leftJoin('master_unor', 'master_unor.bkn_id', 'riwayat_jabatan.unor_bkn_id')
                    ->leftJoin('master_unor as satker', 'satker.bkn_id', 'master_unor.unor_induk_bkn_id')
                    ->where('riwayat_jabatan.id', $id)
                    ->first();
        return $query;
    }

    public function jabatan_terakhir($nip_baru='')
    {
        $query = DB::table('riwayat_jabatan')
                    ->where('nip_baru', $nip_baru)
                    ->select('riwayat_jabatan.*', 'unor_induk.nama as nama_unor_induk')
                    ->join('master_unor as unor_induk', 'unor_induk.bkn_id', '=', 'riwayat_jabatan.unor_induk_bkn_id', 'left')
                    ->orderBy('riwayat_jabatan.tmt_jabatan', 'DESC')
                    ->first();
        return $query;
    }
}
