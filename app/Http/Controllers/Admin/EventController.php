<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        $events = Event::latest()->get();
        return view('backend.events.index', compact('events'));
    }

    public function organizers() {
        return view('backend.events.organizers');
    }

    public function schedules() {
        return view('backend.events.schedule');
    }

    public function venues() {
        return view('backend.events.venues');
    }
}