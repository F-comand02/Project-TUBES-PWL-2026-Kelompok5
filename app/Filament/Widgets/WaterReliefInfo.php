<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class WaterReliefInfo extends Widget
{
    protected string $view =
        'filament.widgets.water-relief-info';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 99;
}