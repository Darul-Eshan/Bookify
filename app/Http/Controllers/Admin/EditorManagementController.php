<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Editor;
use Illuminate\Support\Facades\Hash;

class EditorManagementController extends Controller {
  
   public function index() {
    $editors = Editor::latest()->get();
    return view('backend.admins.editor', compact('editors'));
    }

  
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:editors,email',
            'password' => 'required|min:6',
        ]);

        Editor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'access_level' => 'Content Editor',
            'assigned_section' => 'General Content',
            'status' => 'active'
        ]);

        return redirect()->back()->with('success', 'Editor created successfully!');
    }

    public function destroy($id) {
        $editor = Editor::findOrFail($id);
        $editor->delete();

        return response()->json(['success' => true, 'message' => 'Editor revoked successfully!']);
    }
}