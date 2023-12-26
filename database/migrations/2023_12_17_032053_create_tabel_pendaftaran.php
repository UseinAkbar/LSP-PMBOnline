<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('alamat_ktp');
            $table->string('alamat_sekarang');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->integer('noTelp')->nullable();
            $table->integer('noHp');
            $table->string('email')->unique();
            $table->string('kewarganegaraan');
            $table->date('tgl_lahir');
            $table->string('kabupaten_lahir');
            $table->string('provinsi_lahir');
            $table->string('negara_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->string('status_menikah');
            $table->string('agama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran');
    }
};
