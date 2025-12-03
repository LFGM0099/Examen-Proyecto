<?php

// database/migrations/xxxx_xx_xx_create_autos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('autos', function (Blueprint $table) {
            // Utilizamos bigIncrements para el ID primario autoincremental
            $table->id('id_auto'); 
            $table->string('marca', 100);
            $table->string('modelo', 100);
            $table->year('anio');
            $table->string('motor', 50);
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};