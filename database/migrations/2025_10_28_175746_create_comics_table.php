<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('plot');
            $table->integer('number');
            $table->integer('year');
            $table->string('cover')->nullable();

            // Collega ogni fumetto a una categoria (può essere anche nullo)
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
