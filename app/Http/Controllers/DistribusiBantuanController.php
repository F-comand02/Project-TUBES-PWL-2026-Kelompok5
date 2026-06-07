<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Logistic;

class DistribusiBantuanController extends Controller
{
    /**
     * Tampilkan daftar donasi untuk didistribusikan (volunteer)
     */
    public function index(Request $request)
    {
        $query = Donation::with(['shelter', 'user', 'volunteer'])
            ->latest();

        // Filter berdasarkan status jika ada
        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $donations = $query->paginate(10)->withQueryString();

        return view('volunteer.distribusi-bantuan.index', compact('donations'));
    }

    /**
     * Volunteer ambil misi pengiriman donasi
     * Donasi statusnya berubah menjadi 'on_delivery'
     * dan otomatis muncul di Misi Saya
     */
    public function ambilMisi(Donation $donation)
    {
        // Hanya bisa diambil jika masih pending
        if ($donation->status !== 'pending') {
            return back()->with('error', 'Donasi ini sudah diambil atau tidak tersedia.');
        }

        $donation->update([
            'volunteer_id' => Auth::id(),
            'status'       => 'on_delivery',
        ]);

        return back()->with(
            'success',
            'Misi pengiriman berhasil diambil! Silakan cek di menu Misi Saya.'
        );
    }

    /**
     * Volunteer tandai donasi sudah sampai ke posko
     */
   public function selesaikanMisi(Donation $donation)
{
    if ($donation->volunteer_id !== Auth::id()) {
        return back()->with('error', 'Anda tidak berwenang menyelesaikan misi ini.');
    }

    if ($donation->status !== 'on_delivery') {
        return back()->with('error', 'Status donasi tidak valid untuk diselesaikan.');
    }

    $donation->update([
        'status' => 'received',
    ]);

    $logistic = Logistic::where(
        'shelter_id',
        $donation->shelter_id
    )
    ->where(
        'item_name',
        $donation->item_name
    )
    ->first();

    if ($logistic) {

        $logistic->increment(
            'stock',
            $donation->quantity
        );

    } else {

        Logistic::create([
            'category_id' => $donation->category_id,
            'shelter_id' => $donation->shelter_id,
            'item_name' => $donation->item_name,
            'stock' => $donation->quantity,
            'minimum_stock' => 10,
            'description' => 'Otomatis dari donasi',
        ]);

    }

    return back()->with(
        'success',
        'Donasi berhasil diantarkan ke posko! Misi selesai. 🎉'
    );
}

    /**
     * Misi pengiriman yang sedang dijalankan oleh volunteer yang login
     * (untuk ditampilkan di Misi Saya)
     */
    public function misiSaya()
    {
        $donations = Donation::with(['shelter', 'user'])
            ->where('volunteer_id', Auth::id())
            ->whereIn('status', ['on_delivery', 'received'])
            ->latest()
            ->get();

        return view('volunteer.missions.mine', compact('donations'));
    }
}