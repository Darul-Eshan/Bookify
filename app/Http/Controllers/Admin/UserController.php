<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            ['id' => 1, 'name' => 'Rahim Chowdhury', 'email' => 'rahim@eventsbd.com', 'category' => 'Organizer', 'status' => 'Active', 'date' => '15 Feb, 2026'],
            ['id' => 2, 'name' => 'Karim Mia', 'email' => 'karim.customer@gmail.com', 'category' => 'Customer', 'status' => 'Active', 'date' => '20 Feb, 2026'],
        ];

        return view('backend.users.index', compact('users'));
    }

    public function updateSettings(Request $request)
    {
        return redirect()->back()->with('success', 'Global user settings updated successfully.');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.users')->with('success', 'User status changed successfully.');
    }
}