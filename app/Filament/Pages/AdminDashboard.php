<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard;

class AdminDashboard extends Dashboard
{
    protected static ?string $title = 'Tableau de bord admin';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';
}
