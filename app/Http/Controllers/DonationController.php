<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Shelter;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\NewDonationSubmittedNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\LogisticsCategory;

class DonationController extends Controller
{
    /**
     * Halaman Informasi Posko untuk Citizen
     * Menampilkan semua posko yang dibuat volunteer
     */
    public function shelterInfo()
    {
        $shelters = Shelter::with('logistics.category')
            ->where('status', '!=', 'closed')
            ->get();

        return view('Citizen.shelter-info', compact('shelters'));
    }

    /**
     * Halaman donasi untuk posko tertentu
     */
   public function create(Shelter $shelter)
{
    $categories = LogisticsCategory::all();

    return view(
        'Citizen.donations.create',
        compact(
            'shelter',
            'categories'
        )
    );
}
    /**
     * Simpan donasi baru
     */
    public function store(Request $request, Shelter $shelter)
    {
        $request->validate([
            'category_id'   => 'required|exists:logistics_categories,id',
            'item_name'     => 'required|string|max:150',
            'quantity'      => 'required|integer|min:1',
            'notes'         => 'nullable|string',
            'donation_date' => 'required|date',
        ]);

        $donation = Donation::create([
            'shelter_id'    => $shelter->id,
            'user_id'       => Auth::id(),
            'donor_name'    => Auth::user()->name,
            'item_name'     => $request->item_name,
            'quantity'      => $request->quantity,
            'status'        => 'pending',
            'notes'         => $request->notes,
            'donation_date' => $request->donation_date,
            'category_id' => $request->category_id,
            
        ]);

        $volunteers = User::whereHas('role', function ($query) {
            $query->where('role_name', 'volunteer');
        })->get();

        foreach ($volunteers as $volunteer) {
            $volunteer->notify(
                new NewDonationSubmittedNotification($donation)
            );
        }

        return redirect()
            ->route('citizen.shelter-info')
            ->with('success', 'Donasi berhasil dikirim! Terima kasih atas kontribusi Anda.');
    }

    /**
     * Riwayat donasi milik citizen yang login
     */
    public function myDonations()
    {
        $donations = Donation::with('shelter')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('Citizen.donations.index', compact('donations'));
    }
}
