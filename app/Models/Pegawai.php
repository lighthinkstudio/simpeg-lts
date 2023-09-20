<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'master_pegawai';

    protected $fillable = ['pnsId', 'nipBaru', 'nipLama', 'nama', 'gelarDepan', 'gelarBelakang', 'tempatLahir', 'tempatLahirId', 'tglLahir', 'agama', 'agamaId', 'email', 'emailGov', 'nik', 'alamat', 'noHp', 'noTelp', 'jenisPegawaiId', 'mkTahun', 'mkBulan', 'jenisPegawaiNama', 'kedudukanPnsId', 'kedudukanPnsNama', 'statusPegawai', 'jenisKelamin', 'jenisIdDokumenId', 'jenisIdDokumenNama', 'nomorIdDocument', 'noSeriKarpeg', 'tkPendidikanTerakhirId', 'tkPendidikanTerakhir', 'pendidikanTerakhirId', 'pendidikanTerakhirNama', 'tahunLulus', 'tmtPns', 'tmtPensiun', 'bupPensiun', 'tglSkPns', 'tmtCpns', 'tglSkCpns', 'instansiIndukId', 'instansiIndukNama', 'satuanKerjaIndukId', 'satuanKerjaIndukNama', 'kanregId', 'kanregNama', 'instansiKerjaId', 'instansiKerjaNama', 'instansiKerjaKodeCepat', 'satuanKerjaKerjaId', 'satuanKerjaKerjaNama', 'unorId', 'unorNama', 'unorIndukId', 'unorIndukNama', 'jenisJabatanId', 'jenisJabatan', 'jabatanNama', 'jabatanStrukturalId', 'jabatanStrukturalNama', 'jabatanFungsionalId', 'jabatanFungsionalNama', 'jabatanFungsionalUmumId', 'jabatanFungsionalUmumNama', 'tmtJabatan', 'lokasiKerjaId', 'lokasiKerja', 'golRuangAwalId', 'golRuangAwal', 'golRuangAkhirId', 'golRuangAkhir', 'tmtGolAkhir', 'masaKerja', 'eselon', 'eselonId', 'eselonLevel', 'tmtEselon', 'gajiPokok', 'kpknId', 'kpknNama', 'ktuaId', 'ktuaNama', 'taspenId', 'taspenNama', 'jenisKawinId', 'statusPerkawinan', 'statusHidup', 'tglSuratKeteranganDokter', 'noSuratKeteranganDokter', 'jumlahIstriSuami', 'jumlahAnak', 'noSuratKeteranganBebasNarkoba', 'tglSuratKeteranganBebasNarkoba', 'skck', 'tglSkck', 'akteKelahiran', 'akteMeninggal', 'tglMeninggal', 'noNpwp', 'tglNpwp', 'noAskes', 'bpjs', 'kodePos', 'noSpmt', 'noTaspen', 'bahasa', 'kppnId', 'kppnNama', 'pangkatAkhir', 'tglSttpl', 'nomorSttpl', 'nomorSkCpns', 'nomorSkPns', 'jenjang', 'jabatanAsn', 'kartuAsn', 'foto', 'email_verified_at', 'password', 'remember_token', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at', 'status_akun', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listing($request)
    {
        $query = DB::table('master_pegawai')
                    ->when($request->search, function ($query) use ($request){
                        $query->where('master_pegawai.nama', 'ilike', "%{$request->search}%")
                                ->orWhere('master_pegawai.nipBaru', 'ilike', "%{$request->search}%");
                    })
                    ->select('master_pegawai.*')
                    ->orderBy('id', 'DESC')
                    ->paginate($request->limit ?? 10);
        return $query;
    }

    public function detail($id)
    {
        $query = DB::table('master_pegawai')
                    ->select('master_pegawai.*')
                    ->where('pnsId', $id)
                    ->first();
        return $query;
    }

    public function aktif()
    {
        $query = DB::table('master_pegawai')
                    ->where('status','active')
                    ->orderBy('nama', 'ASC')
                    ->get();

        return $query;
    }
}
