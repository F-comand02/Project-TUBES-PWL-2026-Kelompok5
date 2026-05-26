<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use Illuminate\Http\Request;

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
        Shelter::create([

            'shelter_name' => $request->shelter_name,

            'address' => $request->address,

            'capacity' => $request->capacity,

            'current_refugees'
                => $request->current_refugees,

            'status' => $request->status

        ]);

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