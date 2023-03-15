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
        Schema::create('menu_r_m_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adminrm_id');
            $table->foreignId('kategori_id');
            $table->string('menu');
            $table->string('desmenu');
            $table->string('harga');
            $table->string('img')->nullable();
            $table->enum('status', ['tersedia', 'taktersedia']);
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
        Schema::dropIfExists('menu_r_m_s');
    }
};
