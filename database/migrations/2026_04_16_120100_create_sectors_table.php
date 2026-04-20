<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sectors', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('stadium_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sectors');
    }
};
