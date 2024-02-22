<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * varchar 240 char - za objave
     * likes - int 0
     * created_at - timestamp
     * updated_at - timestamp
     * 
     */
    public function up(): void
    {
        Schema::create('objave', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('objava');
            $table->unsignedInteger('likes')->default(0);
            $table->timestamps(); // ovo je isto kao i created_at i updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objave');
    }
};
