<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LogisticsCategory;

class LogisticsCategorySeeder extends Seeder
{
    public function run(): void
    {
        LogisticsCategory::firstOrCreate([
            'category_name' => 'Food'
        ]);

        LogisticsCategory::firstOrCreate([
            'category_name' => 'Water'
        ]);

        LogisticsCategory::firstOrCreate([
            'category_name' => 'Medicine'
        ]);

        LogisticsCategory::firstOrCreate([
            'category_name' => 'Clothes'
        ]);
    }
}