<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\ComplaintImage;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ComplaintStatusUpdated;
use App\Notifications\NewComplaintSubmitted;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = Complaint::latest()->get();

        return view('Citizen.index', compact('complaints'));
    }

    public function volunteerIndex()
    {
        $complaints = Complaint::latest()->get();

        return view(
            'volunteer.complaints.index',
            compact('complaints')
        );
    }

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $complaint->status = $request->status;

        $complaint->user->notify(
            new ComplaintStatusUpdated($complaint)
        );

        $complaint->save();

        return back()->with(
            'success',
            'Complaint status updated successfully'
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('citizen.createComplaint');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string',
        'urgency_level' => 'required|string',
        'description' => 'required|string',
        'image' => 'nullable|mimes:jpg,jpeg,png,webp,jfif|max:10000',
    ]);

    $complaint = Complaint::create([
        'user_id' => Auth::id(),
        'title' => $request->title,
        'category' => $request->category,
        'urgency_level' => $request->urgency_level,
        'description' => $request->description,
        'status' => 'pending',
    ]);

    $volunteers = User::whereHas('role', function ($query) {

    $query->where('role_name', 'Volunteer');

    })->get();

    foreach ($volunteers as $volunteer) {

        $volunteer->notify(
            new NewComplaintSubmitted($complaint)
        );

    }

    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('complaints', $imageName, 'public');

        ComplaintImage::create([
            'complaint_id' => $complaint->id,
            'image_path' => $imageName,
        ]);
    }

    return redirect()
        ->route('complaints.index')
        ->with('success', 'Complaint submitted successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        foreach ($complaint->images as $image) {

            $imagePath = public_path('storage/complaints/' . $image->image_path);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $image->delete();
        }

        // delete complaint
        $complaint->delete();

        return redirect()
            ->route('complaints.index')
            ->with('success', 'Complaint deleted successfully');
    }

    public function destroyVolunteer(Complaint $complaint)
    {
        // delete images
        foreach ($complaint->images as $image) {

            $imagePath = public_path(
                'storage/complaints/' . $image->image_path
            );

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $image->delete();
        }

        // delete complaint
        $complaint->delete();

        return back()->with(
            'success',
            'Complaint deleted successfully'
        );
    }
}

