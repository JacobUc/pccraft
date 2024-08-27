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
        Schema::create('producto__ordens', function (Blueprint $table) {
            $table->id('ID_Producto_Orden');
            $table->unsignedBigInteger('ID_Producto');
            $table->char('ID_Orden', 50);
            $table->integer('cantidad');
            $table->integer('calificacion')->nullable()->default(null)->unsigned()->check('calificacion >= 1 AND calificacion <= 5');
            $table->text('reseña')->nullable();
            $table->timestamp('fecha_agregada')->useCurrent();

            $table->foreign('ID_Producto')->references('ID_Producto')->on('products')->onDelete('cascade');
            $table->foreign('ID_Orden')->references('ID_Orden')->on('ordens')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto__ordens');
    }
};
