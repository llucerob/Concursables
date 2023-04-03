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
        Schema::create('resumenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presentacion_id')->constrained('presentaciones')->onDelete('cascade');
            $table->integer('aptmunicipal');
            $table->integer('aptorganizacion');
            $table->integer('totalproyecto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumenes');
    }
};
