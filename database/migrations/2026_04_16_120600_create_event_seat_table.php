<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_seat', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('seat_id')->constrained()->cascadeOnDelete();
            $table->decimal('price', 10, 2);
            $table->enum('status', ['available', 'reserved', 'sold'])->default('available');
            $table->timestamps();

            $table->unique(['event_id', 'seat_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_seat');
    }
};
