<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('refugees', function (Blueprint $table) {

            $table->id();

            $table->foreignId('shelter_id')
                ->constrained('shelters')
                ->onDelete('cascade');

            $table->string('full_name', 100);

            $table->integer('age');

            $table->enum('gender', [
                'male',
                'female'
            ]);

            $table->string('family_group')
                ->nullable();

            $table->string('medical_condition')
                ->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('refugees');
    }
};