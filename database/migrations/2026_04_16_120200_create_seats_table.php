<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('sector_id')->constrained()->cascadeOnDelete();
            $table->string('row');
            $table->unsignedInteger('number');
            $table->timestamps();

            $table->unique(['sector_id', 'row', 'number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
