<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function events()
    {
        return view('frontend.events');
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
        $event = $events[1]; // অথবা abort(404);
    } else {
        $event = $events[$id];
    }

    return view('frontend.event-details', compact('event'));
}
}