<?php

namespace App\Http\Controllers;
use App\Models\User; 
class AdminController extends Controller
{
    // public function dashboard()
    // {
    //     return view('admin.dashboard');
    // }
    public function dashboard()
    {
        // $users = User::all(); // Fetch all users
        // return view('admin.dashboard', compact('users'));
         // Fetch users along with their department details
         $users = User::with('department')->get();
         return view('admin.dashboard', compact('users'));
    }
}

