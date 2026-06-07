<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {

            $table->foreignId('category_id')
                ->nullable()
                ->after('volunteer_id')
                ->constrained('logistics_categories')
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {

            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');

        });
    }
};