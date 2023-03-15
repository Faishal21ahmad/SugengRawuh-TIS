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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adminrm_id');
            $table->foreignId('meja_id');
            $table->foreignId('jenispembayaran_id');
            $table->string('codepesan')->nullable();
            $table->string('namapemesan');
            $table->string('totalharga');
            $table->enum('statuspesanan', ['diterima', 'diproses', 'selesai']);
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
        Schema::dropIfExists('pesanans');
    }
};
