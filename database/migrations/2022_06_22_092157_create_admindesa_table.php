<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmindesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admindesa', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            // $table->string('alamat_desa');
            $table->foreignId('id_desa')->references('id')->on('desa');
            $table->string('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admindesa');
    }
}
