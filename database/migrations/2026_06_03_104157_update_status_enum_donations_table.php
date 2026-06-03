<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Update ENUM status donations agar mendukung 'on_delivery'
        DB::statement("
            ALTER TABLE donations
            MODIFY COLUMN status ENUM('pending', 'on_delivery', 'confirmed', 'received')
            NOT NULL DEFAULT 'pending'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE donations
            MODIFY COLUMN status ENUM('pending', 'confirmed', 'received')
            NOT NULL DEFAULT 'pending'
        ");
    }
};