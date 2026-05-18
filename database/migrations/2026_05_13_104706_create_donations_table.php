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

            $table->foreignId('logistics_id')
                ->constrained('logistics')
                ->onDelete('cascade');

            $table->string('donor_name', 100);

            $table->integer('quantity');

            $table->date('donation_date');

            $table->text('notes')
                ->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};