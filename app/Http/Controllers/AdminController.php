<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Booking;

class AdminController extends Controller
{
    // Dashboard Overview Page
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalEvents = Event::count();
        $totalBookings = Booking::count();
        $totalRevenue = Booking::sum('amount'); // অথবা আপনার ডেটাবেজের রেভিনিউ কলামের নাম অনুযায়ী
        $recentBookings = Booking::with(['user', 'event'])->latest()->take(5)->get();

        return view('backend.layout.master', compact(
            'totalUsers', 
            'totalEvents', 
            'totalBookings', 
            'totalRevenue', 
            'recentBookings'
        ));
    }

    // Manage Events Page
    public function events()
    {
        $events = Event::latest()->get();
        return view('backend.events.index', compact('events'));
    }

    // Store New Event (Modal Form Submit)
    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'date_time' => 'required|date',
            'venue' => 'required|string',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'image' => 'nullable|string',
        ]);

        Event::create([
            'title' => $request->title,
            'category' => $request->category,
            'date_time' => $request->date_time,
            'venue' => $request->venue,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'image' => $request->image ?? 'https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=600&auto=format&fit=crop&q=80',
        ]);

        return redirect()->back()->with('success', 'Event created successfully!');
    }

    // Delete Event
    public function destroyEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('success', 'Event deleted successfully!');
    }

    // Update Event
    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'date_time' => 'required',
            'venue' => 'required|string',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'image' => 'nullable|string',
        ]);

        $event = Event::findOrFail($id);
        $event->update([
            'title' => $request->title,
            'category' => $request->category,
            'date_time' => $request->date_time,
            'venue' => $request->venue,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'image' => $request->image ?? $event->image,
        ]);

        return redirect()->back()->with('success', 'Event updated successfully!');
    }
}