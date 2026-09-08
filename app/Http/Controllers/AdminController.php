<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;
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
        // Get all events with their related categories
        $events = Event::with('categoryRelation')
            ->latest()
            ->get();

        // Get all categories created from Admin Category management
        $categories = Category::latest()->get();

        return view('backend.events.index', compact('events', 'categories'));
    }

    // Create Event Page
    public function createEvent()
    {
        $categories = Category::where('status', true)->latest()->get();

        return view('backend.events.create', compact('categories'));
    }

    // Store New Event
    public function storeEvent(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
<<<<<<< HEAD
            'category_id' => 'required|exists:categories,id',
=======
            'category'    => 'required|string',
            'description' => 'nullable|string', 
>>>>>>> cad6cb6 (solved some minor desgin issue)
            'date_time'   => 'required|date',
            'venue'       => 'required|string',
            'price'       => 'required|numeric',
            'capacity'    => 'required|integer',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $imagePath = null;

        // Image Upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        }

        // Get selected category
        $category = Category::findOrFail($request->category_id);

        // Save Event
        Event::create([
            'title'       => $request->title,
<<<<<<< HEAD
            'category'    => $category->name,
            'category_id' => $category->id,
=======
            'category'    => $request->category,
            'description' => $request->description, 
>>>>>>> cad6cb6 (solved some minor desgin issue)
            'date_time'   => $request->date_time,
            'venue'       => $request->venue,
            'price'       => $request->price,
            'capacity'    => $request->capacity,
            'image'       => $imagePath,
        ]);

        return redirect()
            ->route('admin.events')
            ->with('success', 'Event created successfully!');
    }

<<<<<<< HEAD
    // Event Edit Page
=======

    // Separate Event Edit Page
>>>>>>> cad6cb6 (solved some minor desgin issue)
    public function editEvent($id)
    {
        $event = Event::findOrFail($id);

        $categories = Category::where('status', true)->latest()->get();

        return view('backend.events.edit', compact('event', 'categories'));
    }

<<<<<<< HEAD
    // Update Event + Image
=======

    // Update Event + Image + Description
>>>>>>> cad6cb6 (solved some minor desgin issue)
    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
<<<<<<< HEAD
            'category_id' => 'required|exists:categories,id',
=======
            'category'    => 'required|string',
            'description' => 'nullable|string', 
>>>>>>> cad6cb6 (solved some minor desgin issue)
            'date_time'   => 'required|date',
            'venue'       => 'required|string',
            'price'       => 'required|numeric',
            'capacity'    => 'required|integer',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $event = Event::findOrFail($id);

<<<<<<< HEAD
        // Remove Existing Image
=======
        // If user selected "Remove Image"
>>>>>>> cad6cb6 (solved some minor desgin issue)
        if ($request->remove_image == '1') {
            if (
                $event->image &&
                Storage::disk('public')->exists($event->image)
            ) {
                Storage::disk('public')->delete($event->image);
            }

            $event->image = null;
        }

        // Upload New Image
        if ($request->hasFile('image')) {
            if (
                $event->image &&
                Storage::disk('public')->exists($event->image)
            ) {
                Storage::disk('public')->delete($event->image);
            }

            $event->image = $request->file('image')->store('events', 'public');
        }

<<<<<<< HEAD
        // Get selected category
        $category = Category::findOrFail($request->category_id);

        // Update Event Information
        $event->title       = $request->title;
        $event->category    = $category->name;
        $event->category_id = $category->id;
=======
        // Update Event Information
        $event->title       = $request->title;
        $event->category    = $request->category;
        $event->description = $request->description; 
>>>>>>> cad6cb6 (solved some minor desgin issue)
        $event->date_time   = $request->date_time;
        $event->venue       = $request->venue;
        $event->price       = $request->price;
        $event->capacity    = $request->capacity;

        $event->save();

        return redirect()->route('admin.events')->with('success', 'Event updated successfully!');
    }

<<<<<<< HEAD
=======

>>>>>>> cad6cb6 (solved some minor desgin issue)
    // Delete Event + Event Image
    public function destroyEvent($id)
    {
        $event = Event::findOrFail($id);

        // Delete event image from storage
        if (
            $event->image &&
            Storage::disk('public')->exists($event->image)
        ) {
            Storage::disk('public')->delete($event->image);
        }

        // Delete event from database
        $event->delete();

        return redirect()->route('admin.events')->with('success', 'Event deleted successfully!');
    }

    // Event Organizers List Page
    public function organizers()
    {
        $organizers = User::where('role', 'organizer')
            ->with('events')
            ->latest()
            ->get();

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
            'event_name'    => 'required|string|max:255',
            'session_title' => 'required|string|max:255',
            'date_time'     => 'required',
            'speaker'       => 'required|string|max:255',
            'venue'         => 'required|string|max:255',
        ]);

        EventSchedule::create([
            'event_name'    => $request->event_name,
            'session_title' => $request->session_title,
            'date_time'     => $request->date_time,
            'speaker'       => $request->speaker,
            'venue'         => $request->venue,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Schedule added successfully!');
    }

    // Update Schedule
    public function updateSchedule(Request $request, $id)
    {
        $request->validate([
            'event_name'    => 'required|string|max:255',
            'session_title' => 'required|string|max:255',
            'date_time'     => 'required',
            'speaker'       => 'required|string|max:255',
            'venue'         => 'required|string|max:255',
        ]);

        $schedule = EventSchedule::findOrFail($id);

        $schedule->update([
            'event_name'    => $request->event_name,
            'session_title' => $request->session_title,
            'date_time'     => $request->date_time,
            'speaker'       => $request->speaker,
            'venue'         => $request->venue,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Schedule updated successfully!');
    }

    // Delete Schedule
    public function destroySchedule($id)
    {
        $schedule = EventSchedule::findOrFail($id);

        $schedule->delete();

        return redirect()
            ->back()
            ->with('success', 'Schedule deleted successfully!');
    }

    public function profile()
    {
        $admin = auth()->user();
<<<<<<< HEAD

        return view('backend.admins.profile', compact('admin'));
=======
        return view('backend.admins.profile', compact('admin')); 
>>>>>>> cad6cb6 (solved some minor desgin issue)
    }
}