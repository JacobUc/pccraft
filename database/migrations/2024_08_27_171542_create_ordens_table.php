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
        Schema::create('ordens', function (Blueprint $table) {
        $table->char('ID_Orden', 50)->primary();
        $table->unsignedBigInteger('ID_Usuario');  
        $table->date('fecha');
        $table->decimal('total', 10, 2);
        $table->string('estado');
        $table->timestamps();

        $table->foreign('ID_Usuario')->references('id')->on('users')->onDelete('cascade');  


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
