<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class WelcomeAdmin extends Widget
{
    protected string $view = 'filament.widgets.welcome-admin';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 1;
}