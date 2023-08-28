<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class UsersChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static bool $isLazy = true;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Usuarios Admin',
                    'data' => [5, 10],
                    'backgroundColor' => ['#36A2EB', '#0F0'],
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Admin', 'Não Admin'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
