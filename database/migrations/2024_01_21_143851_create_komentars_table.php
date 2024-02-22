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
        Schema::create('komentari', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('objava_id')->constrained()->cascadeOnDelete();
            $table->string('sadrzaj');
            $table->timestamps();
        });
    }
    // constrained znaci da je foreign key, i da je vezan za objave, i da se brise kada se obrise objava, i ne moze napraviti komentar ako ne postoji objava

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentari');
    }
};
