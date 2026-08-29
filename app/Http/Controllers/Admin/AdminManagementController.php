<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Editor;


class AdminManagementController extends Controller
{
    public function index()
    {
        $editors = Editor::latest()->get();
        return view('backend.admins.editor', compact('editors')); 
    }

    public function superAdmins()
    {
        return view('backend.admins.super-admin'); 
    }
}