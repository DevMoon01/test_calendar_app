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
        Schema::create('activities', function (Blueprint $table) {
            $table->id(); // ID univoco 
            $table->unsignedBigInteger('user_id'); // Collegamento all'utente che ha creato l'attività 
            $table->string('type'); // Tipo di attività 
            $table->integer('amount')->nullable(); // Valore numerico (litri, minuti, calorie)
            $table->text('note')->nullable(); // Note opzionali
            $table->date('date'); // Giorno in cui è stata fatta
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
