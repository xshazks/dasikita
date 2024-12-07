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
        Schema::create('pencapaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelurahan_id')->constrained('kelurahan')->onDelete('cascade');
            $table->foreignId('indikator_id')->constrained('indikator')->onDelete('cascade');
            $table->integer('target_2023');
            $table->integer('pencapaian_2023');
            $table->integer('target_2024');
            $table->integer('pencapaian_2024');
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
        Schema::dropIfExists('pencapaian');
    }
};
