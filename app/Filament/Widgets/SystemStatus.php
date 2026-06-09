<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class SystemStatus extends Widget
{
    protected string $view = 'filament.widgets.system-status';

    protected int|string|array $columnSpan = 1;

    protected static ?int $sort = 2;
}