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
        Schema::create('datakec', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('indikator_id');
            $table->decimal('target_2023', 10, 2);
            $table->decimal('pencapaian_2023', 10, 2);
            $table->decimal('target_2024', 10, 2);
            $table->decimal('pencapaian_2024', 10, 2);
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan')->onDelete('cascade');
            $table->foreign('indikator_id')->references('id')->on('indikatorss')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datakec');
    }
};
