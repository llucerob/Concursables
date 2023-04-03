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
        Schema::create('presentaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombreproyecto');
            $table->string('organizacionsolicitante');
            $table->string('tipo');
            $table->text('descripcion');
            $table->text('necesidad');
            $table->string('direccion');
            $table->string('unidadvecinal');
            $table->string('propiedadterreno');
            $table->integer('poblacionbeneficiada');
            $table->string('topologia');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentaciones');
    }
};
