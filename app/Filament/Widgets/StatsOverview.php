<?php

namespace App\Filament\Widgets;

use App\Models\Box;
use App\Models\Customer;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Customers', Customer::count())
                ->description('All customers'),
            Card::make('Boxes', Box::count())
                ->description('All boxes'),
        ];
    }
}
