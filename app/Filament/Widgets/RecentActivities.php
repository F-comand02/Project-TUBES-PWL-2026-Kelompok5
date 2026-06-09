<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class RecentActivities extends Widget
{
    protected string $view = 'filament.widgets.recent-activities';
    protected int|string|array $columnSpan = 1;

    protected static ?int $sort = 99;
}