<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterTingkatPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_tingkat_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 2)->unique();
            $table->string('nama', 30)->nullable();
            $table->string('kode_golongan_awal', 2)->nullable();
            $table->string('kode_golongan_akhir', 2)->nullable();
            $table->integer('urutan')->unsigned()->nullable();
            $table->string('status', 20)->default('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_tingkat_pendidikan');
    }
}
