<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $todos = User::count();
        $admin = User::query()->where('is_admin', true)->count();
        $nadmin = User::query()->where('is_admin', false)->count();
        return [
            'all' => Tab::make('Todos Usuarios')->icon('heroicon-m-user-group')->badge($todos),
            'admin' => Tab::make('administradores')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_admin', true))
                ->icon('heroicon-m-user-group')->badge($admin),
            'nadmin' => Tab::make('Não Administradores')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_admin', false))
                ->icon('heroicon-m-user-group')->badge($nadmin),
        ];
    }
}
