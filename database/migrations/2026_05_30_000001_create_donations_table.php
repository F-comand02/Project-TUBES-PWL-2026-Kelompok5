<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('shelter_id')
                ->constrained('shelters')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('donor_name', 100);

            $table->string('item_name', 150);

            $table->integer('quantity');

            $table->enum('status', [
                'pending',
                'confirmed',
                'received'
            ])->default('pending');

            $table->text('notes')->nullable();

            $table->date('donation_date');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
