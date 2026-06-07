<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Shelter;
use App\Models\Donation;
use App\Models\Complaint;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Logistic;

class AdminStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Semua pengguna')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
            Stat::make('Total Complaints', Complaint::count())
                ->description('Laporan masuk')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('warning'),
           Stat::make('Total Donations', Donation::count())
                ->description('Donasi tercatat')
                ->descriptionIcon('heroicon-m-gift')
                ->color('success'),
          Stat::make('Total Shelters', Shelter::count())
                ->description('Posko tersedia')
                ->descriptionIcon('heroicon-m-home')
                ->color('info'),
            Stat::make(
                'Pending Complaints',
                Complaint::where('status', 'pending')->count()
            )
                ->color('warning'),

            Stat::make(
                'Completed Complaints',
                Complaint::where('status', 'completed')->count()
                
            )
                ->color('success'),
            Stat::make(
                'Pending Donations',
                Donation::where('status', 'pending')->count()
            )
            
            ->color('warning'),
            Stat::make(
                'Completed Donations',
                Donation::where('status', 'completed')->count()
            )
            ->color('success'),
            Stat::make(
                'Total Logistics',
                Logistic::count()
            )
            ->description('Item logistik')
            ->descriptionIcon('heroicon-m-cube')
            ->color('info'),
            Stat::make(
                'Low Stock Items',
                Logistic::whereColumn(
                    'stock',
                    '<=',
                    'minimum_stock'
                )->count()
            )
            ->description('Perlu restock')
            ->descriptionIcon('heroicon-m-exclamation-triangle')
            ->color('danger'),
            Stat::make(
                        'Expired Items',
                        Logistic::whereDate(
                            'expired_date',
                            '<',
                            now()
                        )->count()
                    )
                    ->description('Barang kedaluwarsa')
                    ->descriptionIcon('heroicon-m-clock')
                    ->color('warning'),
                    Stat::make(
                'Volunteers',
                User::whereHas('role',
                    fn($q) => $q->where('role_name', 'volunteer')
                )->count()
            )
            ->description('Relawan aktif')
            ->descriptionIcon('heroicon-m-user-group')
            ->color('success')
        ];
    }
}