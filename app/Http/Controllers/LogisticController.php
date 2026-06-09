<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use App\Models\Logistic;
use App\Models\LogisticsCategory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\LowStockNotif;
use App\Notifications\LogisticExpiringSoonNotification;
use Carbon\Carbon;

class LogisticController extends Controller
{
    public function index(Request $request)
    {
        $logistics = Logistic::with('category')

            ->when($request->search, function ($query) use ($request) {

                $query->where(
                    'item_name',
                    'like',
                    '%' . $request->search . '%'
                );

            })

            ->get();

        $totalItems = Logistic::count();

        $lowStock = Logistic::whereColumn(
            'stock',
            '<=',
            'minimum_stock'
        )->count();

        $expiringSoon = Logistic::whereDate(
            'expired_date',
            '<=',
            now()->addDays(7)
        )->count();

        return view('volunteer.logistics.index', compact(
            'logistics',
            'totalItems',
            'lowStock',
            'expiringSoon'
        ));
    }

    public function citizenInfo()
    {
    $logistics = Logistic::with([
        'category',
        'shelter'
    ])->get();

    $totalItems = Logistic::count();

    $totalShelters = Shelter::count();

    $totalCategories = LogisticsCategory::count();

    return view(
        'Citizen.logistics',
        compact(
            'logistics',
            'totalItems',
            'totalShelters',
            'totalCategories'
        )
    );
    }

    public function create(Request $request)
    {
    $categories = LogisticsCategory::all();

    $shelters = Shelter::all();

    $selectedShelter = $request->shelter;

    return view(
        'volunteer.logistics.create',
        compact(
            'categories',
            'shelters',
            'selectedShelter'
        )
    );
    }

    public function store(Request $request)
    {
        $logistic = Logistic::create([
            'category_id' => $request->category_id,
            'shelter_id' => $request->shelter_id,
            'item_name' => $request->item_name,
            'stock' => $request->stock,
            'minimum_stock' => $request->minimum_stock,
            'expired_date' => $request->expired_date,
            'description' => $request->description

        ]);

        if ($logistic->stock <= $logistic->minimum_stock) {

            $volunteers = User::whereHas('role', function ($query) {

                $query->where('role_name', 'volunteer');

            })->get();

            if (
                    $logistic->expired_date &&
                    Carbon::parse($logistic->expired_date)->diffInDays(now()) <= 7
                ) {

                    $volunteers = User::whereHas('role', function ($query) {

                        $query->where('role_name', 'volunteer');

                    })->get();

                    foreach ($volunteers as $volunteer) {

                        $volunteer->notify(
                            new LogisticExpiringSoonNotification($logistic)
                        );

                    }
                }

            foreach ($volunteers as $volunteer) {

                $volunteer->notify(
                    new LowStockNotif($logistic)
                );

            }
        }

        return redirect()
            ->route('logistics.index')
            ->with('success', 'Logistics added successfully');
    }

    public function edit(Logistic $logistic)
    {
    $categories = LogisticsCategory::all();

    $shelters = Shelter::all();

    return view(
        'volunteer.logistics.edit',
        compact(
            'logistic',
            'categories',
            'shelters'
        )
    );
}

    public function update(Request $request, Logistic $logistic)
{
    $logistic->update([

        'category_id' => $request->category_id,

        'shelter_id' => $request->shelter_id,

        'item_name' => $request->item_name,

        'stock' => $request->stock,

        'minimum_stock' => $request->minimum_stock,

        'expired_date' => $request->expired_date,

        'description' => $request->description

    ]);

    if ($logistic->stock <= $logistic->minimum_stock) {

        $volunteers = User::whereHas('role', function ($query) {

            $query->where('role_name', 'volunteer');

        })->get();

        foreach ($volunteers as $volunteer) {

            $volunteer->notify(
                new LowStockNotif($logistic)
            );

        }
    }

    if (
            $logistic->expired_date &&
            Carbon::parse($logistic->expired_date)->diffInDays(now()) <= 7
        ) {

            $volunteers = User::whereHas('role', function ($query) {

                $query->where('role_name', 'volunteer');

            })->get();

            foreach ($volunteers as $volunteer) {

                $volunteer->notify(
                    new LogisticExpiringSoonNotification($logistic)
                );

            }
        }

    return redirect()
        ->route('logistics.index')
        ->with('success', 'Logistics updated successfully');
}

    public function destroy(Logistic $logistic)
    {
        $logistic->delete();

        return redirect()
            ->route('logistics.index')
            ->with('success', 'Logistics deleted successfully');
    }
}