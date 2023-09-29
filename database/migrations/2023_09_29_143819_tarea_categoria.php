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
        Schema::create('TareaCategoria', function (Blueprint $table) {
            $table->id();
            $table->string('Categoria');
            $table->unsignedBigInteger('tarea_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tarea_id')->references('id')->on('tarea')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
