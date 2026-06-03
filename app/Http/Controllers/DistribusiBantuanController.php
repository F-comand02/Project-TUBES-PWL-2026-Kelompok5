<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Hanya volunteer yang mengambil misi ini yang bisa menyelesaikan
        if ($donation->volunteer_id !== Auth::id()) {
            return back()->with('error', 'Anda tidak berwenang menyelesaikan misi ini.');
        }

        if ($donation->status !== 'on_delivery') {
            return back()->with('error', 'Status donasi tidak valid untuk diselesaikan.');
        }

        $donation->update([
            'status' => 'received',
        ]);

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