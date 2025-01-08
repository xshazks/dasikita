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
        Schema::create('anggaran', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID  
            $table->string('program'); // Column for Program  
            $table->string('kegiatan'); // Column for Kegiatan  
            $table->string('sub_kegiatan'); // Column for Sub-Kegiatan  
            $table->decimal('anggaran', 15, 2); // Column for Anggaran (with 2 decimal places)  
            $table->string('komponen_belanja_khusus_stunting'); // Column for Komponen belanja khusus stunting  
            $table->timestamps(); // Created at and updated at timestamps  
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggaran');
    }
};
