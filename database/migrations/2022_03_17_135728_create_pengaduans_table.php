<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('pengaduans')) {
            //
        }else{
            Schema::create('pengaduans', function (Blueprint $table) {
                $table->id();
                $table->string('nama_pelapor');
                $table->text('alamat');
                $table->string('kontak_telp');
                $table->string('tanggal');
                $table->longText('pengaduan');
                $table->string('foto_kegiatan');
                $table->string('jenis_pengaduan');
                $table->string('jenis_pekerjaan');
                $table->timestamps();
            });   
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
}
