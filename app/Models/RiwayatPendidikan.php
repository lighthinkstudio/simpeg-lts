<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RiwayatPendidikan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pendidikan';

    public function listing($nip_baru='')
    {
        $query = DB::table('riwayat_pendidikan')
                    ->where('nip_baru', $nip_baru)
                    ->select('riwayat_pendidikan.*')
                    ->orderBy('riwayat_pendidikan.tahun_lulus', 'DESC')
                    ->get();
        return $query;
    }

    public function pendidikan_terakhir($nip_baru='')
    {
        $query = DB::table('riwayat_pendidikan')
                    ->where('nip_baru', $nip_baru)
                    ->select('riwayat_pendidikan.*')
                    ->orderBy('tahun_lulus', 'DESC')
                    ->first();
        return $query;
    }
}
