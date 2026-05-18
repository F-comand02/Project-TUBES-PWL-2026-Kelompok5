<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('logistics', function (Blueprint $table) {

            $table->id();

            $table->foreignId('category_id')
                ->constrained('logistics_categories')
                ->onDelete('cascade');

            $table->foreignId('shelter_id')
                ->constrained('shelters')
                ->onDelete('cascade');

            $table->string('item_name', 100);

            $table->integer('stock');

            $table->integer('minimum_stock')
                ->default(10);

            $table->date('expired_date')
                ->nullable();

            $table->text('description')
                ->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logistics');
    }
};