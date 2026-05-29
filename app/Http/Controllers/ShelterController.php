<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use Illuminate\Http\Request;
use App\Notifications\NewShelterCreated;
use App\Models\User;
use App\Notifications\ShelterCapacityNotif;
use App\Notifications\ShelterNearlyFullNotif;

class ShelterController extends Controller
{
    public function index()
    {
        $shelters = Shelter::with(
            'logistics.category'
        )->get();

        return view(
            'shelters.index',
            compact('shelters')
        );
    }

    public function create()
    {
        return view('shelters.create');
    }

    public function store(Request $request)
    {
        $shelter = Shelter::create([

            'shelter_name' => $request->shelter_name,

            'address' => $request->address,

            'capacity' => $request->capacity,

            'current_refugees'
                => $request->current_refugees,

            'status' => $request->status

        ]);

        $citizens = User::whereHas('role', function ($query) {

            $query->where('role_name', 'citizen');

        })->get();

        foreach ($citizens as $citizen) {

            $citizen->notify(
                new NewShelterCreated($shelter)
            );

        }

        return redirect()
            ->route('shelters.index');
    }

    public function edit(Shelter $shelter)
    {
        return view(
            'shelters.edit',
            compact('shelter')
        );
    }

    public function update(
        Request $request,
        Shelter $shelter
    )
    {
        $shelter->update([

            'shelter_name' => $request->shelter_name,

            'address' => $request->address,

            'capacity' => $request->capacity,

            'current_refugees'
                => $request->current_refugees,

            'status' => $request->status

        ]);

        $volunteers = User::whereHas('role', function ($query) {

    $query->where('role_name', 'volunteer');

})->get();

if ($shelter->current_refugees >= $shelter->capacity) {

    foreach ($volunteers as $volunteer) {

        $volunteer->notify(
            new ShelterCapacityNotif($shelter)
        );

    }

}
elseif ($shelter->current_refugees >= 35) {

    foreach ($volunteers as $volunteer) {

        $volunteer->notify(
            new ShelterNearlyFullNotif($shelter)
        );

    }

}

        return redirect()
            ->route('shelters.index');
    }

    public function destroy(Shelter $shelter)
    {
        $shelter->delete();

        return redirect()
            ->route('shelters.index');
    }
}