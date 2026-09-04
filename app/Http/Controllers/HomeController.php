<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

   public function events()
    {
    return view('frontend.event.events');
    }

    public function profile()
{
    $user = auth()->user();
    return view('frontend.profile.index', compact('user'));
}


    public function eventDetails($id = null)
    {
        $events = [
            1 => [
                'id' => 1,
                'title' => 'Dhaka Rock Fest 2026',
                'artist' => 'Nagar Baul, Artcell, Warfaze',
                'date' => 'Nov 14, 2026',
                'location' => 'Army Stadium, Dhaka',
                'price' => 'BDT 1,200',
                'rating' => '4.9',
                'category' => 'Music',
                'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?auto=format&fit=crop&w=800&q=80',
                'description' => 'Experience live performances by top Bangladeshi rock bands including Nagar Baul, Artcell, and Warfaze in the biggest rock fest of the year.'
            ],
            2 => [
                'id' => 2,
                'title' => 'Bangladesh Tech Expo & AI Conference',
                'artist' => 'National Tech Leaders',
                'date' => 'Dec 02, 2026',
                'location' => 'BICC, Dhaka',
                'price' => 'FREE',
                'rating' => '4.8',
                'category' => 'Tech',
                'image' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=800&q=80',
                'description' => 'Discover emerging software trends, AI innovations, and IT career avenues presented by national industry pioneers.'
            ],
            3 => [
                'id' => 3,
                'title' => 'International Folk & Heritage Festival',
                'artist' => 'Baul & Folk Artists',
                'date' => 'Nov 28, 2026',
                'location' => 'Shilpakala Academy, Dhaka',
                'price' => 'BDT 500',
                'rating' => '4.9',
                'category' => 'Cultural',
                'image' => 'https://images.unsplash.com/photo-1469488865564-c2de10f69f96?auto=format&fit=crop&w=800&q=80',
                'description' => 'Celebrate authentic Baul songs, traditional dance performances, and artisanal handicrafts from across the country.'
            ],
        ];

        if (!$id || !isset($events[$id])) {
            $event = $events[1]; 
        } else {
            $event = $events[$id];
        }

        return view('frontend.event.event-details', compact('event'));
    }

public function updateProfile(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'phone_number' => 'nullable|string|max:20',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone_number = $request->phone_number;

    // যদি নতুন ছবি আপলোড করা হয়
    if ($request->hasFile('profile_picture')) {
        // আগের ছবি থাকলে সেটি ডিলিট করতে পারেন (옵শনাল)
        if ($user->profile_picture && file_exists(public_path('storage/' . $user->profile_picture))) {
            unlink(public_path('storage/' . $user->profile_picture));
        }

        // লোকাল পাবলিক ফোল্ডারে বা আপনার ড্রপবক্স ডিস্কে সেভ করার কোড
        $file = $request->file('profile_picture');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/profiles'), $filename);
        
        $user->profile_picture = 'uploads/profiles/' . $filename;
    }

    $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully!');
}
    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required|string',
        'password' => 'required|string|min:8|confirmed', 
    ]);

    $user = auth()->user();

  
    if (!Hash::check($request->current_password, $user->password)) {
        throw ValidationException::withMessages([
            'current_password' => ['The provided password does not match your current password.'],
        ]);
    }

   
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->back()->with('success', 'Password updated successfully!');
}
public function myTickets()
{
    $user = auth()->user();
    
    // ডেমো বুকিং ডাটা (আপনার ডেটাবেজ টেবিল থাকলে সেখানে থেকে ফেচ করতে পারেন)
    $tickets = [
        [
            'id' => 101,
            'event_title' => 'Dhaka Rock Fest 2026',
            'date' => 'Nov 14, 2026',
            'time' => '04:00 PM',
            'location' => 'Army Stadium, Dhaka',
            'quantity' => 2,
            'total_price' => 'BDT 2,400',
            'status' => 'Confirmed', // Confirmed, Completed, Cancelled
            'ticket_code' => 'DRF-2026-9841',
            'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'id' => 102,
            'event_title' => 'Bangladesh Tech Expo & AI Conference',
            'date' => 'Dec 02, 2026',
            'time' => '10:00 AM',
            'location' => 'BICC, Dhaka',
            'quantity' => 1,
            'total_price' => 'FREE',
            'status' => 'Confirmed',
            'ticket_code' => 'BTE-2026-3321',
            'image' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=800&q=80',
        ]
    ];

    return view('frontend.profile.tickets', compact('user', 'tickets'));
}


}