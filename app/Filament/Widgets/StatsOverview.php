<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    
    {
        return [
            Stat::make('Usuários Cadastrados', User::count())
                ->icon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Empresas Cadastradas', Company::count())
                ->color('success')
                ->icon('heroicon-m-arrow-trending-up')
        ];
    }

    public function randomArray(): array
    {
        $numeros = [];
        for ($i=0; $i < 10; $i++) { 
            $numeros[] = random_int(1,500);
        }
        return $numeros;
    }

}
