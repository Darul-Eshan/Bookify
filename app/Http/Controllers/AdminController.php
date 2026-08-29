<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Booking;
use App\Models\EventSchedule;

class AdminController extends Controller
{
    // Dashboard Overview Page
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalEvents = Event::count();
        $totalBookings = Booking::count();
        $totalRevenue = Booking::sum('amount'); 
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

    // Event Organizers List Page 
    public function organizers()
    {
        $organizers = User::where('role', 'organizer')->with('events')->latest()->get(); 
        return view('backend.events.organizers', compact('organizers'));
    }

    // Event Organizer Profile Details Page
    public function organizerDetails($id)
    {
        $organizer = User::with('events')->findOrFail($id); 
        return view('backend.events.organizer-details', compact('organizer'));
    }

    // Event Schedule List Page
    public function schedules()
    {
        $schedules = EventSchedule::latest()->get();
        return view('backend.events.schedule', compact('schedules'));  
    }

    // Store New Schedule
    public function storeSchedule(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'session_title' => 'required|string|max:255',
            'date_time' => 'required',
            'speaker' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
        ]);

        EventSchedule::create([
            'event_name' => $request->event_name,
            'session_title' => $request->session_title,
            'date_time' => $request->date_time,
            'speaker' => $request->speaker,
            'venue' => $request->venue,
        ]);

        return redirect()->back()->with('success', 'Schedule added successfully!');
    }

    // Update Schedule
    public function updateSchedule(Request $request, $id)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'session_title' => 'required|string|max:255',
            'date_time' => 'required',
            'speaker' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
        ]);

        $schedule = EventSchedule::findOrFail($id);
        $schedule->update([
            'event_name' => $request->event_name,
            'session_title' => $request->session_title,
            'date_time' => $request->date_time,
            'speaker' => $request->speaker,
            'venue' => $request->venue,
        ]);

        return redirect()->back()->with('success', 'Schedule updated successfully!');
    }

    // Delete Schedule
    public function destroySchedule($id)
    {
        $schedule = EventSchedule::findOrFail($id);
        $schedule->delete();

        return redirect()->back()->with('success', 'Schedule deleted successfully!');
    }
}