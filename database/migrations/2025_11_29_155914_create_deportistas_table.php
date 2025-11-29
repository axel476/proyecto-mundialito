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
        Schema::create('deportistas', function (Blueprint $table) {
            $table->id();
            $table->string("NombreDeportista");
            $table->date("FechaNacimiento");
            $table->integer("EstaturaCM");
            $table->integer("PesoKG");
            // Foreign keys
            $table->foreignId('IdPais')->constrained('pais');
            $table->foreignId('IdDisciplina')->constrained('disciplinas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deportistas');
    }
};
