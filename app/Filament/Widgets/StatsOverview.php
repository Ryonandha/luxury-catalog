<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Kategori', Category::count())
                ->description('Kategori produk yang terdaftar')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('primary'),
                
            Stat::make('Total Produk', Product::count())
                ->description('Seluruh koleksi di katalog')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('success'),
                
            Stat::make('Produk Ready Stock', Product::where('is_available', true)->count())
                ->description('Produk siap jual')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('warning'),
        ];
    }
}