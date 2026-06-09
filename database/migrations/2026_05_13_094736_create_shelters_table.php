<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shelters', function (Blueprint $table) {

            $table->id();

            $table->string('shelter_name', 100);

            $table->text('address');

            $table->integer('capacity');

            $table->integer('current_refugees')->default(0);

            $table->enum('status', [
                'active',
                'full',
                'closed'
            ])->default('active');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shelters');
    }
};