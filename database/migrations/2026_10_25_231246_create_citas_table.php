<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('paciente'); 
            $table->unsignedBigInteger('medico_id'); 
            $table->string('consultorio');
            $table->dateTime('fecha_hora');
            $table->timestamps();
            $table->foreign('medico_id')->references('id')->on('doctores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
