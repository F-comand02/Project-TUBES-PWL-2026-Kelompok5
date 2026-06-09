<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('shelter_id')
                ->nullable()
                ->constrained('shelters')
                ->nullOnDelete();

            $table->foreignId('handled_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('title', 150);

            $table->text('description');

            $table->enum('category', [
                'food',
                'water',
                'medical',
                'shelter',
                'emergency',
                'other'
            ]);

            $table->enum('urgency_level', [
                'low',
                'medium',
                'high'
            ])->default('medium');

            $table->enum('status', [
                'pending',
                'processing',
                'completed'
            ])->default('pending');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};