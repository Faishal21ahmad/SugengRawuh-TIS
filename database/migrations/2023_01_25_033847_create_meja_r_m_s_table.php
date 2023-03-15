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
        Schema::create('meja_r_m_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adminrm_id');
            $table->string('no');
            $table->string('pesan');
            $table->string('link');
            $table->string('qr')->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('meja_r_m_s');
    }
};
