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
        Schema::create('kecamatanss', function (Blueprint $table) {
            $table->id(); // Ini akan membuat kolom 'id' dengan tipe INT AUTO_INCREMENT PRIMARY KEY
            $table->string('nama_kecamatan', 255)->notNull();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatanss');
    }
};

