<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Moderator;
use Illuminate\Support\Facades\Hash;

class ModeratorManagementController extends Controller
{
    public function index()
    {
        $moderators = Moderator::latest()->get();
        return view('backend.admins.moderator', compact('moderators'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:moderators,email',
            'password' => 'required|min:6',
            'access_level' => 'required|string',
            'assigned_section' => 'required|string',
            'status' => 'required|string',
        ]);

        Moderator::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'access_level' => $request->access_level,
            'assigned_section' => $request->assigned_section,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Moderator registered successfully!');
    }

    public function update(Request $request, $id)
    {
        $moderator = Moderator::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:moderators,email,' . $moderator->id,
            'password' => 'nullable|min:6',
            'access_level' => 'required|string',
            'assigned_section' => 'required|string',
            'status' => 'required|string',
        ]);

        $moderator->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $moderator->password,
            'access_level' => $request->access_level,
            'assigned_section' => $request->assigned_section,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Moderator account updated successfully!');
    }

    public function destroy($id)
    {
        $moderator = Moderator::findOrFail($id);
        $moderator->delete();

        return response()->json(['success' => true]);
    }
}