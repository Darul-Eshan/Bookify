<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    
    public function index(Request $request)
    {
  
        $bookings = [
            [
                'id' => '#TCK-98231',
                'event_name' => 'Tech Startup Summit 2026',
                'customer_name' => 'Tanvir Ahmed',
                'email' => 'tanvir@gmail.com',
                'ticket_type' => 'VIP Pass',
                'qty' => 2,
                'amount' => 'BDT 3,000',
                'status' => 'Paid'
            ],
            [
                'id' => '#TCK-98232',
                'event_name' => 'Dhaka Rock Fest 2026',
                'customer_name' => 'Rahim Chowdhury',
                'email' => 'rahim@yahoo.com',
                'ticket_type' => 'General',
                'qty' => 1,
                'amount' => 'BDT 1,200',
                'status' => 'Pending'
            ]
        ];

        return view('backend.bookings.index', compact('bookings'));
    }

  
    public function destroy($id)
    {
        irect()->route('admin.bookings')->with('success', 'Booking deleted successfully.');
    }
}