<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('pnsId')->unique()->nullable();
            $table->string('nipBaru', 20)->unique();
            $table->string('nipLama', 20)->nullable();
            $table->string('nama')->nullable();
            $table->string('gelarDepan')->nullable();
            $table->string('gelarBelakang')->nullable();
            $table->string('tempatLahirId', 38)->nullable();
            $table->string('tempatLahir')->nullable();
            $table->string('tglLahir', 16)->nullable();
            $table->string('agama', 20)->nullable();
            $table->string('agamaId', 38)->nullable();
            $table->string('email')->nullable();
            $table->string('emailGov')->nullable();
            $table->string('nik', 20)->nullable();
            $table->text('alamat', 300)->nullable();
            $table->string('noHp', 50)->nullable();
            $table->string('noTelp', 50)->nullable();
            $table->string('mkTahun', 2)->nullable();
            $table->string('mkBulan', 2)->nullable();
            $table->string('jenisPegawaiId', 38)->nullable();
            $table->string('jenisPegawaiNama')->nullable();
            $table->string('kedudukanPnsId', 38)->nullable();
            $table->string('kedudukanPnsNama')->nullable();
            $table->string('statusPegawai')->nullable();
            $table->string('jenisKelamin')->nullable();
            $table->string('jenisIdDokumenId', 38)->nullable();
            $table->string('jenisIdDokumenNama')->nullable();
            $table->string('nomorIdDocument')->nullable();
            $table->string('noSeriKarpeg', 20)->nullable();
            $table->string('tkPendidikanTerakhirId', 38)->nullable();
            $table->string('tkPendidikanTerakhir')->nullable();
            $table->string('pendidikanTerakhirId', 38)->nullable();
            $table->string('pendidikanTerakhirNama')->nullable();
            $table->string('tahunLulus', 16)->nullable();
            $table->string('tmtPns', 16)->nullable();
            $table->string('tmtPensiun', 16)->nullable();
            $table->string('bupPensiun')->nullable();
            $table->string('tglSkPns', 16)->nullable();
            $table->string('tmtCpns', 16)->nullable();
            $table->string('tglSkCpns', 16)->nullable();
            $table->string('kanregId', 38)->nullable();
            $table->string('kanregNama')->nullable();
            $table->string('instansiKerjaId', 38)->nullable();
            $table->string('instansiKerjaNama')->nullable();
            $table->string('instansiKerjaKodeCepat')->nullable();
            $table->string('instansiIndukId', 38)->nullable();
            $table->string('instansiIndukNama')->nullable();
            $table->string('satuanKerjaId', 38)->nullable();
            $table->string('satuanKerjaNama')->nullable();
            $table->string('satuanKerjaIndukId', 38)->nullable();
            $table->string('satuanKerjaIndukNama')->nullable();
            $table->string('unorId', 38)->nullable();
            $table->string('unorNama')->nullable();
            $table->string('unorIndukId', 38)->nullable();
            $table->string('unorIndukNama')->nullable();
            $table->string('lokasiKerjaId', 38)->nullable();
            $table->string('lokasiKerja')->nullable();
            $table->string('jenisJabatanId', 38)->nullable();
            $table->string('jenisJabatan')->nullable();
            $table->string('jabatanNama')->nullable();
            $table->string('jabatanStrukturalId', 38)->nullable();
            $table->string('jabatanStrukturalNama')->nullable();
            $table->string('jabatanFungsionalTertentuId', 38)->nullable();
            $table->string('jabatanFungsionalTertentuNama')->nullable();
            $table->string('jabatanFungsionalUmumId', 38)->nullable();
            $table->string('jabatanFungsionalUmumNama')->nullable();
            $table->string('tmtJabatan', 16)->nullable();
            $table->string('golRuangAwalId', 38)->nullable();
            $table->string('golRuangAwal')->nullable();
            $table->string('golRuangAkhirId', 38)->nullable();
            $table->string('golRuangAkhir')->nullable();
            $table->string('tmtGolAkhir', 16)->nullable();
            $table->string('masaKerja')->nullable();
            $table->string('eselonId', 38)->nullable();
            $table->string('eselon', 20)->nullable();
            $table->string('eselonLevel', 20)->nullable();
            $table->string('tmtEselon', 16)->nullable();
            $table->string('gajiPokok')->nullable();
            $table->string('kpknId', 38)->nullable();
            $table->string('kpknNama')->nullable();
            $table->string('ktuaId', 38)->nullable();
            $table->string('ktuaNama')->nullable();
            $table->string('taspenId', 38)->nullable();
            $table->string('taspenNama')->nullable();
            $table->string('jenisKawinId', 38)->nullable();
            $table->string('statusPerkawinan', 20)->nullable();
            $table->string('statusHidup', 20)->nullable();
            $table->string('noSuratKeteranganDokter')->nullable();
            $table->string('tglSuratKeteranganDokter', 16)->nullable();
            $table->string('jumlahPasangan', 3)->nullable();
            $table->string('jumlahAnak', 3)->nullable();
            $table->string('noSuratKeteranganBebasNarkoba')->nullable();
            $table->string('tglSuratKeteranganBebasNarkoba', 16)->nullable();
            $table->string('skck')->nullable();
            $table->string('tglSkck', 16)->nullable();
            $table->string('akteKelahiran')->nullable();
            $table->string('akteMeninggal')->nullable();
            $table->string('tglMeninggal', 16)->nullable();
            $table->string('noNpwp', 20)->nullable();
            $table->string('tglNpwp', 16)->nullable();
            $table->string('noAskes')->nullable();
            $table->string('bpjs', 20)->nullable();
            $table->string('kodePos', 5)->nullable();
            $table->string('noSpmt')->nullable();
            $table->string('noTaspen')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('kppnId', 38)->nullable();
            $table->string('kppnNama')->nullable();
            $table->string('pangkatAkhir')->nullable();
            $table->string('tglSttpl', 16)->nullable();
            $table->string('nomorSttpl')->nullable();
            $table->string('nomorSkCpns')->nullable();
            $table->string('nomorSkPns')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('jabatanAsn')->nullable();
            $table->string('kartuAsn')->nullable();
            $table->string('foto')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken('remember_token')->nullable();
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->timestamp('two_factor_confirmed_at')->nullable();
            $table->enum('status', ['active', 'inactive', 'blocked'])->default('inactive');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_pegawai');
    }
}
